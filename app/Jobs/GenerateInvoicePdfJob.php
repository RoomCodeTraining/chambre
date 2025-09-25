<?php

namespace App\Jobs;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Photo;
use App\Models\Shock;
use App\Models\Entity;
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
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateInvoicePdfJob implements ShouldQueue
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

        $assignment = Assignment::with('generalState', 'technicalConclusion', 'documentTransmitted', 'assignmentType', 'expertiseType', 'status', 'vehicle', 'insurer', 'additionalInsurer', 'broker', 'repairer', 'client', 'directedBy')
                        ->where('id', $this->invoice->assignment_id)
                        ->first();

        $receipts = Receipt::with('receiptType')
                    ->where('assignment_id', $assignment->id)
                    ->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                    ->orderBy('id', 'desc')
                    ->get();
        
        $logo = Entity::where('id', $assignment->expert_firm_id)->first();
        $logo = $logo
        ? image_to_base64(public_path("storage/logos/{$logo->logo}"))
        : null;

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('fr');

        $pdf = PDF::loadView('invoice/index',compact('invoice','assignment','receipts','logo','numberTransformer'));
        $pdf->set_option('isHtml5ParserEnabled', false);
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->save(public_path("storage/invoice/".$invoice->reference.".pdf"));
        $pdf->setBasePath($_SERVER['DOCUMENT_ROOT']);
    }
}
