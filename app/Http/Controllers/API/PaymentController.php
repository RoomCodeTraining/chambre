<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Status;
use App\Models\Payment;
use App\Models\Receipt;
use App\Enums\StatusEnum;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\Payment\PaymentResource;
use App\Http\Requests\Payment\CreatePaymentRequest;
use App\Http\Requests\Payment\UpdatePaymentRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des paiements
 *
 * APIs pour la gestion des paiements
 */
class PaymentController extends Controller
{
    use ApiResponse;
    
    public function __construct()
    {

    }

    /**
     * Lister tous les paiements
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $start_date = request()->filled('start_date') ? Carbon::parse(request()->start_date)->startOfDay() : null;
        $end_date   = request()->filled('end_date') ? Carbon::parse(request()->end_date)->endOfDay() : null;
        $payments = Payment::with('assignment:id,reference', 'paymentType:id,code,label', 'paymentMethod:id,code,label', 'status:id,code,label', 'createdBy:id,name,email,created_at', 'updatedBy:id,name,email,created_at', 'deletedBy:id,name,email,created_at')
                    ->join('assignments', 'payments.assignment_id', '=', 'assignments.id')
                    ->select('payments.*', 'assignments.assignment_type_id', 'assignments.expertise_type_id', 'assignments.vehicle_id', 'assignments.client_id', 'assignments.insurer_id', 'assignments.repairer_id', 'assignments.receipt_amount')
                    ->accessibleBy(auth()->user());

        if($start_date && $end_date){
            $payments = $payments->whereBetween('payments.date', [$start_date, $end_date]);
        } elseif ($start_date) {
            $payments = $payments->where('payments.date', '>=', $start_date);
        } elseif ($end_date) {
            $payments = $payments->where('payments.date', '<=', $end_date);
        }

        $assignment_type_id = request()->assignment_type_id ?? null;
        if($assignment_type_id){
            $payments = $payments->where(function($query) use ($assignment_type_id){
                $query->where(['assignments.assignment_type_id' => $assignment_type_id]);
            });
        }

        $expertise_type_id = request()->expertise_type_id ?? null;
        if($expertise_type_id){
            $payments = $payments->where(function($query) use ($expertise_type_id){
                $query->where(['assignments.expertise_type_id' => $expertise_type_id]);
            });
        }

        $vehicle_id = request()->vehicle_id ?? null;
        if($vehicle_id){
            $payments = $payments->where(function($query) use ($vehicle_id){
                $query->where(['assignments.vehicle_id' => $vehicle_id]);
            });
        }

        $client_id = request()->client_id ?? null;
        if($client_id){
            $payments = $payments->where(function($query) use ($client_id){
                $query->where(['assignments.client_id' => $client_id]);
            });
        }

        $insurer_id = request()->insurer_id ?? null;
        if($insurer_id){
            $payments = $payments->where(function($query) use ($insurer_id){
                $query->where(['assignments.insurer_id' => $insurer_id]);
            });
        }

        $status_id = Status::where('code', request()->status_code)->first()->id ?? null;
        if($status_id){
            $payments = $payments->where('status_id', $status_id);
        }

        $total_amount = $payments->sum('amount');

        $payments = $payments->latest('payments.created_at')->useFilters()->dynamicPaginate();

        if($start_date || $end_date || $status_id || $assignment_type_id || $expertise_type_id || $vehicle_id || $client_id || $insurer_id){
            $export_url = $this->export($start_date, $end_date, $status_id, $assignment_type_id, $expertise_type_id, $vehicle_id, $client_id, $insurer_id);
        }

        return PaymentResource::collection($payments)->additional([
            'total_amount' => $total_amount,
            'export_url' => $export_url ?? null,
        ]);
    }

    /**
     * Exporter les paiements par période
     * 
     *
     * @authenticated
     */
    public function export($start_date, $end_date, $status_id, $assignment_type_id, $expertise_type_id, $vehicle_id, $client_id, $insurer_id) : string
    {        
        $start_date = $start_date ? Carbon::parse($start_date)->startOfDay() : null;
        $end_date = $end_date ? Carbon::parse($end_date)->endOfDay() : null;

        $payments = \App\Models\Payment::with('assignment:id,reference', 'paymentType:id,code,label', 'paymentMethod:id,code,label', 'status:id,code,label')
                            ->join('assignments', 'payments.assignment_id', '=', 'assignments.id')
                            ->select('payments.*', 'assignments.assignment_type_id', 'assignments.expertise_type_id', 'assignments.vehicle_id', 'assignments.client_id', 'assignments.insurer_id', 'assignments.repairer_id', 'assignments.receipt_amount')
                            ->accessibleBy(auth()->user());

        if ($start_date && $end_date) {
            $payments = $payments->whereBetween('payments.date', [$start_date, $end_date]);
        } elseif ($start_date) {
            $payments = $payments->where('payments.date', '>=', $start_date);
        } elseif ($end_date) {
            $payments = $payments->where('payments.date', '<=', $end_date);
        }

        if($status_id){
            $payments = $payments->where('status_id', $status_id);
        }

        if($assignment_type_id){
            $payments = $payments->where(function($query) use ($assignment_type_id){
                $query->where(['assignments.assignment_type_id' => $assignment_type_id]);
            });
        }

        if($expertise_type_id){
            $payments = $payments->where(function($query) use ($expertise_type_id){
                $query->where(['assignments.expertise_type_id' => $expertise_type_id]);
            });
        }

        if($vehicle_id){
            $payments = $payments->where(function($query) use ($vehicle_id){
                $query->where(['assignments.vehicle_id' => $vehicle_id]);
            });
        }

        if($client_id){
            $payments = $payments->where(function($query) use ($client_id){
                $query->where(['assignments.client_id' => $client_id]);
            });
        }

        if($insurer_id){
            $payments = $payments->where(function($query) use ($insurer_id){
                $query->where(['assignments.insurer_id' => $insurer_id]);
            });
        }

        $payments = $payments->latest('payments.created_at')
            ->useFilters()
            ->get();

        $exportData = [];
        // En-tête
        $exportData[] = [
            'Référence',
            'Dossier',
            'Montant',
            'Type de paiement',
            'Méthode de paiement',
            'Statut',
            'Date'
        ];

        foreach ($payments as $payment) {
            $exportData[] = [
                $payment->reference,
                $payment->assignment ? $payment->assignment->reference : '',
                $payment->amount,
                $payment->paymentType ? $payment->paymentType->label : '',
                $payment->paymentMethod ? $payment->paymentMethod->label : '',
                $payment->status ? $payment->status->label : '',
                $payment->created_at ?  $payment->created_at->format('d/m/Y H:i:s') : '',
            ];
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Paiements');

        foreach ($exportData as $rowIndex => $row) {
            foreach ($row as $colIndex => $value) {
                $sheet->setCellValueByColumnAndRow($colIndex + 1, $rowIndex + 1, $value);
            }
        }

        // Utilisation de Maatwebsite\Excel\Facades\Excel pour exporter
        $filename = 'export_paiements.xlsx';
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
     * Statistiques des paiements
     *
     * @authenticated
     */
    public function statistics(): JsonResponse
    {   
        $start_date = request()->filled('start_date') ? Carbon::parse(request()->start_date)->startOfDay() : null;
        $end_date   = request()->filled('end_date') ? Carbon::parse(request()->end_date)->endOfDay() : null;

        $payments_by_year_and_month_count = Payment::join('assignments', 'payments.assignment_id', '=', 'assignments.id')
                                            ->selectRaw('YEAR(payments.date) as year, MONTH(payments.date) as month, COUNT(*) as count')
                                            ->accessibleBy(auth()->user());

        if($start_date && $end_date){
            $payments_by_year_and_month_count = $payments_by_year_and_month_count->whereBetween('payments.date', [$start_date, $end_date]);
        } elseif ($start_date) {
            $payments_by_year_and_month_count = $payments_by_year_and_month_count->where('payments.date', '>=', $start_date);
        } elseif ($end_date) {
            $payments_by_year_and_month_count = $payments_by_year_and_month_count->where('payments.date', '<=', $end_date);
        }

        $assignment_type_id = request()->assignment_type_id ?? null;
        if($assignment_type_id){
            $payments_by_year_and_month_count = $payments_by_year_and_month_count->where(function($query) use ($assignment_type_id){
                $query->where(['assignments.assignment_type_id' => $assignment_type_id]);
            });
        }

        $expertise_type_id = request()->expertise_type_id ?? null;
        if($expertise_type_id){
            $payments_by_year_and_month_count = $payments_by_year_and_month_count->where(function($query) use ($expertise_type_id){
                $query->where(['assignments.expertise_type_id' => $expertise_type_id]);
            });
        }

        $vehicle_id = request()->vehicle_id ?? null;
        if($vehicle_id){
            $payments_by_year_and_month_count = $payments_by_year_and_month_count->where(function($query) use ($vehicle_id){
                $query->where(['assignments.vehicle_id' => $vehicle_id]);
            });
        }

        $client_id = request()->client_id ?? null;
        if($client_id){
            $payments_by_year_and_month_count = $payments_by_year_and_month_count->where(function($query) use ($client_id){
                $query->where(['assignments.client_id' => $client_id]);
            });
        }

        $insurer_id = request()->insurer_id ?? null;
        if($insurer_id){
            $payments_by_year_and_month_count = $payments_by_year_and_month_count->where(function($query) use ($insurer_id){
                $query->where(['assignments.insurer_id' => $insurer_id]);
            });
        }

        $payments_by_year_and_month_count = $payments_by_year_and_month_count
            ->groupBy(DB::raw('YEAR(payments.date)'), DB::raw('MONTH(payments.date)'))
            ->orderBy('year', 'desc')
            ->useFilters()
            ->get();

        $payments_by_year_and_month_amount = Payment::join('assignments', 'payments.assignment_id', '=', 'assignments.id')
                                            ->selectRaw('YEAR(payments.date) as year, MONTH(payments.date) as month, SUM(payments.amount) as amount')
                                            ->accessibleBy(auth()->user());

        if($start_date && $end_date){
            $payments_by_year_and_month_amount = $payments_by_year_and_month_amount->whereBetween('payments.date', [$start_date, $end_date]);
        } elseif ($start_date) {
            $payments_by_year_and_month_amount = $payments_by_year_and_month_amount->where('payments.date', '>=', $start_date);
        } elseif ($end_date) {
            $payments_by_year_and_month_amount = $payments_by_year_and_month_amount->where('payments.date', '<=', $end_date);
        }

        $assignment_type_id = request()->assignment_type_id ?? null;
        if($assignment_type_id){
            $payments_by_year_and_month_amount = $payments_by_year_and_month_amount->where(function($query) use ($assignment_type_id){
                $query->where(['assignments.assignment_type_id' => $assignment_type_id]);
            });
        }

        $expertise_type_id = request()->expertise_type_id ?? null;
        if($expertise_type_id){
            $payments_by_year_and_month_amount = $payments_by_year_and_month_amount->where(function($query) use ($expertise_type_id){
                $query->where(['assignments.expertise_type_id' => $expertise_type_id]);
            });
        }

        $vehicle_id = request()->vehicle_id ?? null;
        if($vehicle_id){
            $payments_by_year_and_month_amount = $payments_by_year_and_month_amount->where(function($query) use ($vehicle_id){
                $query->where(['assignments.vehicle_id' => $vehicle_id]);
            });
        }

        $client_id = request()->client_id ?? null;
        if($client_id){
            $payments_by_year_and_month_amount = $payments_by_year_and_month_amount->where(function($query) use ($client_id){
                $query->where(['assignments.client_id' => $client_id]);
            });
        }

        $insurer_id = request()->insurer_id ?? null;
        if($insurer_id){
            $payments_by_year_and_month_amount = $payments_by_year_and_month_amount->where(function($query) use ($insurer_id){
                $query->where(['assignments.insurer_id' => $insurer_id]);
            });
        }

        $payments_by_year_and_month_amount = $payments_by_year_and_month_amount
            ->groupBy(DB::raw('YEAR(payments.date)'), DB::raw('MONTH(payments.date)'))
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->useFilters()
            ->get();

        // Export des statistiques des paiements

        $export_payments_by_year_and_month_count_data = [];
        // En-tête
        $export_payments_by_year_and_month_count_data[] = [
            'Année',
            'Mois',
            'Nombre de paiements'
        ];

        foreach ($payments_by_year_and_month_count as $payment) {
            $export_payments_by_year_and_month_count_data[] = [
                $payment->year,
                $payment->month,
                $payment->count,
            ];
        }

        $export_payments_by_year_and_month_amount_data = [];
        // En-tête
        $export_payments_by_year_and_month_amount_data[] = [
            'Année',
            'Mois',
            'Montant des paiements'
        ];

        foreach ($payments_by_year_and_month_amount as $payment) {
            $export_payments_by_year_and_month_amount_data[] = [
                $payment->year,
                $payment->month,
                $payment->amount,
            ];
        }

        // Création d'un classeur avec deux feuilles
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

        // Première feuille : Nombre de dossiers par année et mois
        $sheetCount = $spreadsheet->getActiveSheet();
        $sheetCount->setTitle('Nombre de paiements');

        foreach ($export_payments_by_year_and_month_count_data as $rowIndex => $row) {
            foreach ($row as $colIndex => $value) {
                $sheetCount->setCellValueByColumnAndRow($colIndex + 1, $rowIndex + 1, $value);
            }
        }

        // Deuxième feuille : Montant des dossiers par année et mois
        $sheetAmount = $spreadsheet->createSheet();
        $sheetAmount->setTitle('Montant des paiements');

        foreach ($export_payments_by_year_and_month_amount_data as $rowIndex => $row) {
            foreach ($row as $colIndex => $value) {
                $sheetAmount->setCellValueByColumnAndRow($colIndex + 1, $rowIndex + 1, $value);
            }
        }

        // Sauvegarde du fichier
        $filename = 'export_paiements_stats.xlsx';
        $filepath = storage_path('app/public/exports/' . $filename);

        if (!file_exists(dirname($filepath))) {
            mkdir(dirname($filepath), 0777, true);
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($filepath);

        $url = asset('storage/exports/' . $filename);

        return $this->responseSuccess('Statistiques des paiements', [
            'payments_by_year_and_month_count' => $payments_by_year_and_month_count,
            'payments_by_year_and_month_amount' => $payments_by_year_and_month_amount,
            'export_url' => $url,
        ]);
    }

    /**
     * Créer un paiement
     *
     * @authenticated
     */
    public function store(CreatePaymentRequest $request): JsonResponse
    {
        $assignment = Assignment::accessibleBy(auth()->user())->findOrFail($request->assignment_id);
        if($assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Le dossier est déjà réglé.");
        }

        // $receipt_amount = Receipt::where('assignment_id', $request->assignment_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount');
        // $payment_amount = Payment::where('assignment_id', $request->assignment_id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount');
        // if($request->amount > ($receipt_amount - $payment_amount)){
        //     return $this->responseUnprocessable("Le montant du paiement ne peut pas dépasser le montant restant à payer du dossier qui est de ".($receipt_amount - $payment_amount)." FCFA.");
        // }

        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;
        $reference = 'P'.$today;

        $payment = Payment::create([
            'reference' => $reference,
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
            'amount' => $request->amount,
            'assignment_id' => $request->assignment_id,
            'payment_type_id' => $request->payment_type_id,
            'payment_method_id' => $request->payment_method_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        $receipt_amount = Receipt::where('assignment_id', $request->assignment_id)->sum('amount');
        $payment_amount = Payment::where('assignment_id', $request->assignment_id)->sum('amount');
        if($receipt_amount > 0){
            if($receipt_amount <= $payment_amount && $assignment->status_id == Status::where('code', StatusEnum::VALIDATED)->first()->id){
                $assignment->update([
                    'status_id' => Status::where('code', StatusEnum::PAID)->first()->id,
                ]);
            } 
        }

        return $this->responseCreated('Payment created successfully', new PaymentResource($payment));
    }

    /**
     * Afficher un paiement
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $payment = Payment::join('assignments', 'payments.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('payments.id', Payment::keyFromHashId($id))
            ->first();

        return $this->responseSuccess(null, new PaymentResource($payment->load('assignment:id,reference', 'paymentType:id,code,label', 'paymentMethod:id,code,label', 'status:id,code,label', 'createdBy:id,name,email,created_at', 'updatedBy:id,name,email,created_at', 'deletedBy:id,name,email,created_at')));
    }

    /**
     * Mettre à jour un paiement
     *
     * @authenticated
     */
    public function update(UpdatePaymentRequest $request, $id): JsonResponse
    {
        $payment = Payment::join('assignments', 'payments.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('payments.id', Payment::keyFromHashId($id))
            ->firstOrFail();

        $payment->update([
            'assignment_id' => $request->assignment_id,
            'payment_type_id' => $request->payment_type_id,
            'payment_method_id' => $request->payment_method_id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Payment updated Successfully', new PaymentResource($payment->load('assignment:id,reference', 'paymentType:id,code,label', 'paymentMethod:id,code,label', 'status:id,code,label')));
    }

    /**
     * Annuler un paiement
     *
     * @authenticated
     */
    public function cancel($id): JsonResponse
    {
        $payment = Payment::join('assignments', 'payments.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('payments.id', Payment::keyFromHashId($id))
            ->firstOrFail();

        $payment->update([
            'status_id' => Status::where('code', StatusEnum::CANCELLED)->first()->id,
            'cancelled_by' => auth()->user()->id,
            'cancelled_at' => Carbon::now(),
            'updated_by' => auth()->user()->id,
        ]);

        $assignment = Assignment::find($payment->assignment_id);
        if($assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            $assignment->update([
                'status_id' => Status::where('code', StatusEnum::VALIDATED)->first()->id,
            ]);
        }

        return $this->responseSuccess('Paiement annulé avec succès', new PaymentResource($payment->load('assignment:id,reference', 'paymentType:id,code,label', 'paymentMethod:id,code,label', 'status:id,code,label')));
    }

    /**
     * Supprimer un paiement
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $payment = Payment::findOrFail(Payment::keyFromHashId($id));
        // $payment->delete();

        return $this->responseDeleted();
    }

   
}
