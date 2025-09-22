<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Status;
use App\Models\Invoice;
use App\Models\Receipt;
use App\Enums\StatusEnum;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Jobs\GenerateInvoicePdfJob;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\Invoice\InvoiceResource;
use App\Http\Requests\Invoice\CreateInvoiceRequest;
use App\Http\Requests\Invoice\UpdateInvoiceRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des factures
 *
 * APIs pour la gestion des factures
 */
class InvoiceController extends Controller
{
    use ApiResponse;
    
    public function __construct()
    {

    }

    /**
     * Lister toutes les factures
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $start_date = request()->filled('start_date') ? Carbon::parse(request()->start_date)->startOfDay() : null;
        $end_date = request()->filled('end_date') ? Carbon::parse(request()->end_date)->endOfDay() : null;
        $invoices = Invoice::with('assignment:id,reference,receipt_amount_excluding_tax,receipt_amount_tax,receipt_amount,expert_firm_id', 'status:id,code,label', 'createdBy:id,name,email,created_at', 'updatedBy:id,name,email,created_at', 'deletedBy:id,name,email,created_at', 'cancelledBy:id,name,email,created_at')
                    ->join('assignments', 'invoices.assignment_id', '=', 'assignments.id')
                    ->select('invoices.*', 'assignments.assignment_type_id', 'assignments.expertise_type_id', 'assignments.vehicle_id', 'assignments.client_id', 'assignments.insurer_id', 'assignments.repairer_id', 'assignments.receipt_amount')
                    ->accessibleBy(auth()->user());
        
        if($start_date && $end_date){
            $invoices = $invoices->whereBetween('invoices.date', [$start_date, $end_date]);
        } elseif ($start_date) {
            $invoices = $invoices->where('invoices.date', '>=', $start_date);
        } elseif ($end_date) {
            $invoices = $invoices->where('invoices.date', '<=', $end_date);
        }

        $status_id = Status::where('code', request()->status_code)->first()->id ?? null;
        if($status_id){
            $invoices = $invoices->where('status_id', $status_id);
        }

        $assignment_type_id = request()->assignment_type_id ?? null;
        if($assignment_type_id){
            $invoices = $invoices->where(function($query) use ($assignment_type_id){
                $query->where(['assignments.assignment_type_id' => $assignment_type_id]);
            });
        }

        $expertise_type_id = request()->expertise_type_id ?? null;
        if($expertise_type_id){
            $invoices = $invoices->where(function($query) use ($expertise_type_id){
                $query->where(['assignments.expertise_type_id' => $expertise_type_id]);
            });
        }

        $vehicle_id = request()->vehicle_id ?? null;
        if($vehicle_id){
            $invoices = $invoices->where(function($query) use ($vehicle_id){
                $query->where(['assignments.vehicle_id' => $vehicle_id]);
            });
        }

        $client_id = request()->client_id ?? null;
        if($client_id){
            $invoices = $invoices->where(function($query) use ($client_id){
                $query->where(['assignments.client_id' => $client_id]);
            });
        }

        $insurer_id = request()->insurer_id ?? null;
        if($insurer_id){
            $invoices = $invoices->where(function($query) use ($insurer_id){
                $query->where(['assignments.insurer_id' => $insurer_id]);
            });
        }

        $invoices = $invoices->latest('invoices.created_at')->useFilters()->dynamicPaginate();

        if($start_date || $end_date || $status_id || $assignment_type_id || $expertise_type_id || $vehicle_id || $client_id || $insurer_id){
            $export_url = $this->export($start_date, $end_date, $status_id, $assignment_type_id, $expertise_type_id, $vehicle_id, $client_id, $insurer_id);
        }

        return InvoiceResource::collection($invoices)->additional([
            'export_url' => $export_url ?? null,
        ]);
    }

    /**
     * Exporter les factures par période
     * 
     *
     * @authenticated
     */
    public function export($start_date, $end_date, $status_id, $assignment_type_id, $expertise_type_id, $vehicle_id, $client_id, $insurer_id) : string
    {        
        $start_date = $start_date ? Carbon::parse($start_date)->startOfDay() : null;
        $end_date = $end_date ? Carbon::parse($end_date)->endOfDay() : null;

        $invoices = \App\Models\Invoice::with('assignment:id,reference,receipt_amount_excluding_tax,receipt_amount_tax,receipt_amount,expert_firm_id', 'status:id,code,label')->accessibleBy(auth()->user());

        if ($start_date && $end_date) {
            $invoices = $invoices->whereBetween('invoices.date', [$start_date, $end_date]);
        } elseif ($start_date) {
            $invoices = $invoices->where('invoices.date', '>=', $start_date);
        } elseif ($end_date) {
            $invoices = $invoices->where('invoices.date', '<=', $end_date);
        }

        if($status_id){
            $invoices = $invoices->where('status_id', $status_id);
        }

        if($assignment_type_id){
            $invoices = $invoices->where(function($query) use ($assignment_type_id){
                $query->where(['assignment.assignment_type_id' => $assignment_type_id]);
            });
        }

        if($expertise_type_id){
            $invoices = $invoices->where(function($query) use ($expertise_type_id){
                $query->where(['assignment.expertise_type_id' => $expertise_type_id]);
            });
        }

        if($vehicle_id){
            $invoices = $invoices->where(function($query) use ($vehicle_id){
                $query->where(['assignment.vehicle_id' => $vehicle_id]);
            });
        }

        if($client_id){
            $invoices = $invoices->where(function($query) use ($client_id){
                $query->where(['assignment.client_id' => $client_id]);
            });
        }

        if($insurer_id){
            $invoices = $invoices->where(function($query) use ($insurer_id){
                $query->where(['assignment.insurer_id' => $insurer_id]);
            });
        }

        $invoices = $invoices->latest('invoices.created_at')
            ->useFilters()
            ->get();

        $exportData = [];
        // En-tête
        $exportData[] = [
            'Référence',
            'Dossier',
            'Montant',
            'Statut',
            'Date de création'
        ];

        foreach ($invoices as $invoice) {
            $exportData[] = [
                $invoice->reference,
                $invoice->assignment ? $invoice->assignment->reference : '',
                $invoice->assignment->receipt_amount,
                $invoice->status ? $invoice->status->label : '',
                $invoice->created_at ?  $invoice->created_at->format('d/m/Y H:i:s') : '',
            ];
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Factures');

        foreach ($exportData as $rowIndex => $row) {
            foreach ($row as $colIndex => $value) {
                $sheet->setCellValueByColumnAndRow($colIndex + 1, $rowIndex + 1, $value);
            }
        }

        // Utilisation de Maatwebsite\Excel\Facades\Excel pour exporter
        $filename = 'export_factures.xlsx';
        $filepath = storage_path('app/public/exports/' . $filename);

        if (!file_exists(dirname($filepath))) {
            mkdir(dirname($filepath), 0777, true);
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($filepath);

        $url = asset('storage/exports/' . $filename);

        return $url;
    }

    /**
     * Statistiques des factures
     *
     * @authenticated
     */
    public function statistics(): JsonResponse
    {
        $start_date = request()->filled('start_date') ? Carbon::parse(request()->start_date)->startOfDay() : null;
        $end_date = request()->filled('end_date') ? Carbon::parse(request()->end_date)->endOfDay() : null;

        $invoices_by_year_and_month_count = Invoice::join('assignments', 'invoices.assignment_id', '=', 'assignments.id')
            ->selectRaw('YEAR(invoices.created_at) as year, MONTH(invoices.created_at) as month, COUNT(*) as count')
            ->where(['assignments.expert_firm_id' => auth()->user()->entity_id]);

        if($start_date && $end_date){
            $invoices_by_year_and_month_count = $invoices_by_year_and_month_count->whereBetween('invoices.created_at', [$start_date, $end_date]);
        } elseif ($start_date) {
            $invoices_by_year_and_month_count = $invoices_by_year_and_month_count->where('invoices.created_at', '>=', $start_date);
        } elseif ($end_date) {
            $invoices_by_year_and_month_count = $invoices_by_year_and_month_count->where('invoices.created_at', '<=', $end_date);
        }

        $assignment_type_id = request()->assignment_type_id ?? null;
        if($assignment_type_id){
            $invoices_by_year_and_month_count = $invoices_by_year_and_month_count->where(function($query) use ($assignment_type_id){
                $query->where(['assignments.assignment_type_id' => $assignment_type_id]);
            });
        }

        $expertise_type_id = request()->expertise_type_id ?? null;
        if($expertise_type_id){
            $invoices_by_year_and_month_count = $invoices_by_year_and_month_count->where(function($query) use ($expertise_type_id){
                $query->where(['assignments.expertise_type_id' => $expertise_type_id]);
            });
        }

        $vehicle_id = request()->vehicle_id ?? null;
        if($vehicle_id){
            $invoices_by_year_and_month_count = $invoices_by_year_and_month_count->where(function($query) use ($vehicle_id){
                $query->where(['assignments.vehicle_id' => $vehicle_id]);
            });
        }

        $client_id = request()->client_id ?? null;
        if($client_id){
            $invoices_by_year_and_month_count = $invoices_by_year_and_month_count->where(function($query) use ($client_id){
                $query->where(['assignments.client_id' => $client_id]);
            });
        }

        $insurer_id = request()->insurer_id ?? null;
        if($insurer_id){
            $invoices_by_year_and_month_count = $invoices_by_year_and_month_count->where(function($query) use ($insurer_id){
                $query->where(['assignments.insurer_id' => $insurer_id]);
            });
        }

        $invoices_by_year_and_month_count = $invoices_by_year_and_month_count
            ->groupBy(DB::raw('YEAR(invoices.created_at)'), DB::raw('MONTH(invoices.created_at)'))
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->useFilters()
            ->get();

        $invoices_by_year_and_month_amount = Invoice::join('assignments', 'invoices.assignment_id', '=', 'assignments.id')
            ->selectRaw('YEAR(invoices.created_at) as year, MONTH(invoices.created_at) as month, SUM(assignments.receipt_amount) as amount')
            ->where(['assignments.expert_firm_id' => auth()->user()->entity_id]);

        if($start_date && $end_date){
            $invoices_by_year_and_month_amount = $invoices_by_year_and_month_amount->whereBetween('invoices.created_at', [$start_date, $end_date]);
        } elseif ($start_date) {
            $invoices_by_year_and_month_amount = $invoices_by_year_and_month_amount->where('invoices.created_at', '>=', $start_date);
        } elseif ($end_date) {
            $invoices_by_year_and_month_amount = $invoices_by_year_and_month_amount->where('invoices.created_at', '<=', $end_date);
        }

        $assignment_type_id = request()->assignment_type_id ?? null;
        if($assignment_type_id){
            $invoices_by_year_and_month_amount = $invoices_by_year_and_month_amount->where(function($query) use ($assignment_type_id){
                $query->where(['assignments.assignment_type_id' => $assignment_type_id]);
            });
        }

        $expertise_type_id = request()->expertise_type_id ?? null;
        if($expertise_type_id){
            $invoices_by_year_and_month_amount = $invoices_by_year_and_month_amount->where(function($query) use ($expertise_type_id){
                $query->where(['assignments.expertise_type_id' => $expertise_type_id]);
            });
        }

        $vehicle_id = request()->vehicle_id ?? null;
        if($vehicle_id){
            $invoices_by_year_and_month_amount = $invoices_by_year_and_month_amount->where(function($query) use ($vehicle_id){
                $query->where(['assignments.vehicle_id' => $vehicle_id]);
            });
        }

        $client_id = request()->client_id ?? null;
        if($client_id){
            $invoices_by_year_and_month_amount = $invoices_by_year_and_month_amount->where(function($query) use ($client_id){
                $query->where(['assignments.client_id' => $client_id]);
            });
        }

        $insurer_id = request()->insurer_id ?? null;
        if($insurer_id){
            $invoices_by_year_and_month_amount = $invoices_by_year_and_month_amount->where(function($query) use ($insurer_id){
                $query->where(['assignments.insurer_id' => $insurer_id]);
            });
        }

        $invoices_by_year_and_month_amount = $invoices_by_year_and_month_amount
            ->groupBy(DB::raw('YEAR(invoices.created_at)'), DB::raw('MONTH(invoices.created_at)'))
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->useFilters()
            ->get();

        // Export des statistiques des factures

        $export_invoices_by_year_and_month_count_data = [];
        // En-tête
        $export_invoices_by_year_and_month_count_data[] = [
            'Année',
            'Mois',
            'Nombre de factures'
        ];

        foreach ($invoices_by_year_and_month_count as $invoice) {
            $export_invoices_by_year_and_month_count_data[] = [
                $invoice->year,
                $invoice->month,
                $invoice->count,
            ];
        }

        $export_invoices_by_year_and_month_amount_data = [];
        // En-tête
        $export_invoices_by_year_and_month_amount_data[] = [
            'Année',
            'Mois',
            'Montant des factures'
        ];

        foreach ($invoices_by_year_and_month_amount as $invoice) {
            $export_invoices_by_year_and_month_amount_data[] = [
                $invoice->year,
                $invoice->month,
                $invoice->amount,
            ];
        }

        // Création d'un classeur avec deux feuilles
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

        // Première feuille : Nombre de dossiers par année et mois
        $sheetCount = $spreadsheet->getActiveSheet();
        $sheetCount->setTitle('Nombre de factures');

        foreach ($export_invoices_by_year_and_month_count_data as $rowIndex => $row) {
            foreach ($row as $colIndex => $value) {
                $sheetCount->setCellValueByColumnAndRow($colIndex + 1, $rowIndex + 1, $value);
            }
        }

        // Deuxième feuille : Montant des dossiers par année et mois
        $sheetAmount = $spreadsheet->createSheet();
        $sheetAmount->setTitle('Montant des factures');

        foreach ($export_invoices_by_year_and_month_amount_data as $rowIndex => $row) {
            foreach ($row as $colIndex => $value) {
                $sheetAmount->setCellValueByColumnAndRow($colIndex + 1, $rowIndex + 1, $value);
            }
        }

        // Sauvegarde du fichier
        $filename = 'export_factures_stats.xlsx';
        $filepath = storage_path('app/public/exports/' . $filename);

        if (!file_exists(dirname($filepath))) {
            mkdir(dirname($filepath), 0777, true);
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($filepath);

        $url = asset('storage/exports/' . $filename);

        return $this->responseSuccess('Statistiques des factures', [
            'invoices_by_year_and_month_count' => $invoices_by_year_and_month_count,
            'invoices_by_year_and_month_amount' => $invoices_by_year_and_month_amount,
            'export_url' => $url,
        ]);
    }

    /**
     * Créer une facture
     * 
     *
     * @authenticated
     */
    public function store(CreateInvoiceRequest $request): JsonResponse
    {
        $assignment = Assignment::accessibleBy(auth()->user())->findOrFail($request->assignment_id);

        if(Invoice::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->exists()){
            return $this->responseUnprocessable("La facture est déjà générée pour ce dossier.");
        }

        $receipt_amount = Receipt::where('assignment_id', $assignment->id)->sum('amount');
        if(!$receipt_amount || $receipt_amount == 0){
            return $this->responseUnprocessable("Ce dossier n'a aucune quittance.");
        }

        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;
        $reference = 'F'.$today;

        $invoice = Invoice::create([
            'reference' => $reference,
            'date' => $request->date,
            'object' => $request->object,
            'assignment_id' => $request->assignment_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        dispatch(new GenerateInvoicePdfJob($invoice));

        return $this->responseCreated('Invoice created successfully', new InvoiceResource($invoice));
    }

    /**
     * Afficher une facture
     *
     * @authenticated
     */
    public function show(Invoice $invoice): JsonResponse
    {
        return $this->responseSuccess(null, new InvoiceResource($invoice->accessibleBy(auth()->user())->load('assignment:id,reference,receipt_amount_excluding_tax,receipt_amount_tax,receipt_amount', 'status:id,code,label', 'createdBy:id,name,email,created_at', 'updatedBy:id,name,email,created_at', 'deletedBy:id,name,email,created_at', 'cancelledBy:id,name,email,created_at'))));
    }

    /**
     * Mettre à jour une facture
     *
     * @authenticated
     */
    public function update(UpdateInvoiceRequest $request, $id): JsonResponse
    {
        $invoice = Invoice::accessibleBy(auth()->user())->findOrFail($id);
        $invoice->update([
            'date' => $request->date,
            'object' => $request->object,
            'updated_by' => auth()->user()->id,
        ]);

        dispatch(new GenerateInvoicePdfJob($invoice));

        return $this->responseSuccess('Invoice updated Successfully', new InvoiceResource($invoice));
    }

    /**
     * Générer une facture
     *
     * @authenticated
     */
    public function generate($id): JsonResponse
    {
        $invoice = Invoice::accessibleBy(auth()->user())->findOrFail($id);
        
        dispatch(new GenerateInvoicePdfJob($invoice));

        return $this->responseSuccess('Facture générée avec succès', new InvoiceResource($invoice));
    }

    /**
     * Annuler une facture
     *
     * @authenticated
     */
    public function cancel($id): JsonResponse
    {
        $invoice = Invoice::accessibleBy(auth()->user())->findOrFail($id);

        $invoice->update([
            'status_id' => Status::where('code', StatusEnum::CANCELLED)->first()->id,
            'cancelled_by' => auth()->user()->id,
            'cancelled_at' => Carbon::now(),
            'updated_by' => auth()->user()->id,
        ]);

        $assignment = Assignment::findOrFail($invoice->assignment_id);

        $assignment->update([
            'status_id' => Status::where('code', StatusEnum::VALIDATED)->first()->id,
        ]);

        return $this->responseSuccess('Facture annulée avec succès', new InvoiceResource($invoice));
    }

    /**
     * Supprimer une facture
     *
     * @authenticated
     */
    public function destroy(Invoice $invoice): JsonResponse
    {
        // $invoice->delete();

        return $this->responseDeleted();
    }

   
}
