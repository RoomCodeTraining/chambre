<?php

namespace App\Jobs;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Photo;
use App\Models\Shock;
use App\Models\QrCode;
use App\Models\Status;
use App\Models\Invoice;
use App\Models\Receipt;
use App\Enums\StatusEnum;
use App\Models\OtherCost;
use App\Models\PhotoType;
use App\Enums\ProfileEnum;
use App\Models\Assignment;
use App\Enums\PhotoTypeEnum;
use App\Models\Ascertainment;
use App\Models\ExpertiseType;
use Illuminate\Bus\Queueable;
use App\Models\ArticleRequest;
use App\Models\AssignmentType;
use App\Enums\ExpertiseTypeEnum;
use NumberToWords\NumberToWords;
use App\Enums\AssignmentTypeEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendInvoiceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;

    public $maxExceptions = 1;

    public $backoff = [20, 40, 60];

    public $timeout = 300;

    public $deleteWhenMissingModels = true;

    /**
     * Create a new job instance.
     */
    public function __construct(public Invoice $invoice)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $invoice = Invoice::with('status')
                        ->where('id', $this->invoice->id)
                        ->first();

        $assignment = Assignment::with('expertFirm', 'generalState', 'technicalConclusion', 'documentTransmitted', 'assignmentType', 'expertiseType', 'status', 'vehicle', 'insurer', 'additionalInsurer', 'broker', 'repairer', 'client', 'directedBy')
                        ->where('id', $this->invoice->assignment_id)
                        ->first();

        $receipts = Receipt::with('receiptType')
                    ->where('assignment_id', $assignment->id)
                    ->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                    ->orderBy('id', 'desc')
                    ->get();
        
        // Format receipts for FNE API
        $formattedReceipts = $receipts->map(function ($receipt) {
            return [
                'id' => $receipt->id,
                'amount_excluding_tax' => number_format((float)($receipt->amount_excluding_tax ?? 0), 2, '.', ''),
                'amount_tax' => number_format((float)($receipt->amount_tax ?? 0), 2, '.', ''),
                'amount' => number_format((float)($receipt->amount ?? 0), 2, '.', ''),
                'receipt_type' => $receipt->receiptType ? [
                    'id' => $receipt->receiptType->id,
                    'code' => $receipt->receiptType->code,
                    'label' => $receipt->receiptType->label,
                    'description' => $receipt->receiptType->description,
                    'created_at' => $receipt->receiptType->created_at ? $receipt->receiptType->created_at->format('Y-m-d H:i:s') : null,
                    'updated_at' => $receipt->receiptType->updated_at ? $receipt->receiptType->updated_at->format('Y-m-d H:i:s') : null,
                ] : null,
                'created_at' => $receipt->created_at ? $receipt->created_at->format('Y-m-d H:i:s') : null,
                'updated_at' => $receipt->updated_at ? $receipt->updated_at->format('Y-m-d H:i:s') : null,
            ];
        })->toArray();
        
        // Format client for FNE API
        if (!$assignment->client) {
            throw new \Exception('Assignment client not found for invoice: ' . $invoice->id);
        }

        if ($assignment->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::INSURER)->first()->id) {
            $client = $assignment->insurer;
            if($assignment?->additionalInsurer){
                $name = $client->name . ' (' .$assignment?->additionalInsurer?->name. ") / " . $assignment?->client?->name;
            } else {
                $name = $client->name . " / " . $assignment?->client?->name;
            }
            $formattedClient = [
                'id' => $client->id,
                'code' => $client->code ?? $client->name, // Use code if exists, otherwise use name
                'name' => $name,
                'email' => $client->email ?? "N/A",
                'telephone' => $client->telephone ?? "N/A",
                'address' => $client->address ?? "N/A",
                'taxpayer_account_number' => $client->taxpayer_account_number ?? "N/A",
            ];
        } else {
            $client = $assignment->client;
            $formattedClient = [
                'id' => $client->id,
                'code' => $client->code ?? $client->name, // Use code if exists, otherwise use name
                'name' => $client->name,
                'email' => $client->email ?? "N/A",
                'telephone' => $client->phone_1 ?? $client->phone_2 ?? "N/A",
                'address' => $client->address ?? "N/A",
                'taxpayer_account_number' => $client->taxpayer_account_number ?? "N/A",
            ];
        }

        $fneSetting = FneSetting::where('entity_id', $assignment->expertFirm->id)->first();
                
        // Format payload to match FNE API structure
        $payload = [
            'entity' => [
                'code' => $assignment?->expertFirm?->code,
                'name' => $assignment?->expertFirm?->name,
                'email' => $assignment?->expertFirm?->email,
                'telephone' => $assignment?->expertFirm?->telephone,
                'address' => $assignment?->expertFirm?->address,
                'taxpayer_account_number' => $assignment?->expertFirm?->taxpayer_account_number,
                'point_sale' => $fneSetting?->point_sale,
                'establishment' => $fneSetting?->establishment,
                'commercial_message' => "N° de facture : ".$invoice->reference." - N° du rapport : ".$assignment->reference. " - N° de sinistre : ".$assignment->claim_number,
                'footer' => $fneSetting?->footer,
                'fne_token' => $fneSetting?->token,
            ],
            'reference' => $invoice->reference,
            'type' => $invoice->type,
            'invoice_reference' => $invoice->invoice_reference,
            'payment_method' => $invoice->payment_method,
            'template' => $invoice->template,
            'foreign_currency' => $invoice->foreign_currency,
            'foreign_currency_rate' => $invoice->foreign_currency_rate,
            'discount' => $invoice->discount,
            'invoice_reference' => $invoice->invoice_reference,
            'payload' => [
                'client' => $formattedClient,
                'receipt' => $formattedReceipts,
            ]
        ];
        
        // Construct the full URL for the external FNE application
        $url = config('services.fne.url');
        
        $response = Http::withoutVerifying()
            ->timeout(30)
            ->withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])
            ->post($url, $payload);

        if($response->successful()){
            Log::info('Invoice sent successfully to FNE');
        } else {
            Log::error('Invoice sent failed to FNE');
            Log::error('Status: ' . $response->status());
            Log::error('Response: ' . $response->body());
            
            // Throw exception to trigger job retry
            // throw new \Exception('Failed to send invoice to FNE: ' . $response->status() . ' - ' . $response->body());
        }
    }
}
