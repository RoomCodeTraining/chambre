<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Models\Receipt;
use App\Models\WorkFee;
use App\Enums\StatusEnum;
use App\Models\Assignment;
use App\Models\ReceiptType;
use App\Enums\ReceiptTypeEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Jobs\GenerateAssignmentPdfJob;
use App\Jobs\GenerateExpertiseReportPdfJob;
use App\Http\Resources\Receipt\ReceiptResource;
use App\Http\Requests\Receipt\CreateReceiptRequest;
use App\Http\Requests\Receipt\UpdateReceiptRequest;
use App\Http\Requests\Receipt\CalculateReceiptRequest;
use App\Http\Requests\Receipt\CreateMultipleReceiptRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des quittances
 *
 * APIs pour la gestion des quittances
 */
class ReceiptController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les quittances
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $receipts = Receipt::with('receiptType', 'status')
                    ->join('assignments', 'receipts.assignment_id', '=', 'assignments.id')
                    ->accessibleBy(auth()->user())
                    ->useFilters()
                    ->orderBy('id', 'asc')
                    ->dynamicPaginate();

        return ReceiptResource::collection($receipts);
    }

    /**
     * Calculer une quittance
     *
     * @authenticated
     */
    public function calculate(CalculateReceiptRequest $request): JsonResponse
    {
        $receipts = [];
        $receipt_amount_excluding_tax = 0;
        $receipt_amount_tax = 0;
        $receipt_amount = 0;

        $receipts_data = $request->get('receipts');
        foreach($receipts_data as $receipt){
            if($receipt['receipt_type_id'] == ReceiptType::where('code', ReceiptTypeEnum::WORK_FEE)->first()->id){
                $assignment = Assignment::with('technicalConclusion')->find($request->assignment_id);
                $amount = $assignment->total_amount;
                if($amount){
                    if($assignment->technicalConclusion &&$assignment->technicalConclusion->code != 'TC001'){
                        $amount = $assignment->market_value - $assignment->salvage_value;
                    }
                    $workFee = WorkFee::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('param_1', '<', $amount)->where('param_2', '>=', $amount)->first();
                    if(!$workFee){
                        $workFee = WorkFee::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->orderBy('param_2', 'desc')->first();
                    }
                    $total = (($amount - $workFee->param_1) * $workFee->param_4 / 100) + $workFee->param_3;
                } else {
                    return $this->responseUnprocessable("Le dossier n'est pas encore redigé.");
                }
            } else {
                $total = $receipt['amount'];
            }

            $amount_excluding_tax = ceil($total);
            $amount_tax = ceil(($total * config('services.settings.tax_rate')) / 100);
            $amount = ceil($total + $amount_tax);
            
            $receipts[] = [
                'assignment_id' => $request->assignment_id,
                'receipt_type_id' => $receipt['receipt_type_id'],
                'amount_excluding_tax' => $amount_excluding_tax,
                'amount_tax' => $amount_tax,
                'amount' => $amount,
            ];

            $receipt_amount_excluding_tax += $amount_excluding_tax;
            $receipt_amount_tax += $amount_tax;
            $receipt_amount += $amount;
        }

        return $this->responseCreated('Receipts calculated successfully', [
            'receipts' => $receipts,
            'receipt_amount_excluding_tax' => $receipt_amount_excluding_tax,
            'receipt_amount_tax' => $receipt_amount_tax,
            'receipt_amount' => $receipt_amount,
        ]);
    }

    /**
     * Ajouter une quittance
     *
     * @authenticated
     */
    // public function store(CreateReceiptRequest $request): JsonResponse
    // {
    //     if($request->receipt_type_id == ReceiptType::where('code', ReceiptTypeEnum::WORK_FEE)->first()->id){
    //         $assignment = Assignment::findOrFail($request->assignment_id);
    //         if($assignment->total_amount_excluding_tax){
    //             $workFee = WorkFee::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('param_1', '<', $assignment->total_amount_excluding_tax)->where('param_2', '>=', $assignment->total_amount_excluding_tax)->firstOrFail();
    //             $receipt_amount_excluding_tax = (($request->amount - $workFee->param_1) * $workFee->param_4 / 100) + $workFee->param_3;
    //         } else {
    //             return $this->responseUnprocessable("Le dossier n'est pas encore redigé.");
    //         }
    //     } else {
    //         $receipt_amount_excluding_tax = $request->amount;
    //     }

    //     $receipt_amount_tax = (config('services.settings.tax_rate') * $receipt_amount_excluding_tax) / 100;
    //     $receipt_amount = $receipt_amount_excluding_tax + $receipt_amount_tax;
        
    //     $receipt = Receipt::create([
    //         'assignment_id' => $request->assignment_id,
    //         'receipt_type_id' => $request->receipt_type_id,
    //         'amount_excluding_tax' => $receipt_amount_excluding_tax,
    //         'amount_tax' => $receipt_amount_tax,
    //         'amount' => $receipt_amount,
    //         'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
    //         'created_by' => auth()->user()->id,
    //         'updated_by' => auth()->user()->id,
    //     ]);

    //     $receipt_amount_excluding_tax = ceil(Receipt::where('assignment_id', $request->assignment_id)->sum('amount_excluding_tax'));
    //     $receipt_amount_tax = ceil(Receipt::where('assignment_id', $request->assignment_id)->sum('amount_tax'));
    //     $receipt_amount = ceil(Receipt::where('assignment_id', $request->assignment_id)->sum('amount'));

    //     $assignment = Assignment::find($request->assignment_id);
    //     $assignment->update([
    //         'receipt_amount_excluding_tax' => $receipt_amount_excluding_tax,
    //         'receipt_amount_tax' => $receipt_amount_tax,
    //         'receipt_amount' => $receipt_amount,
    //     ]);

    //     dispatch(new GenerateExpertiseReportPdfJob($assignment));

    //     return $this->responseCreated('Receipt created successfully', new ReceiptResource($receipt));
    // }

    /**
     * Ajouter une quittance
     *
     * @authenticated
     */
    public function store(CreateMultipleReceiptRequest $request): JsonResponse
    {
        $receipts = $request->get('receipts');
        foreach($receipts as $receipt){
            if($receipt['receipt_type_id'] == ReceiptType::where('code', ReceiptTypeEnum::WORK_FEE)->first()->id){
                $assignment = Assignment::with('technicalConclusion')->find($request->assignment_id);
                $amount = $assignment->total_amount;
                if($amount){
                    if($assignment->technicalConclusion && $assignment->technicalConclusion->code != 'TC001'){
                        $amount = $assignment->market_value - $assignment->salvage_value;
                    }
                    $workFee = WorkFee::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('param_1', '<', $amount)->where('param_2', '>=', $amount)->first();
                    if(!$workFee){
                        $workFee = WorkFee::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->orderBy('param_2', 'desc')->first();
                    }
                    $total = (($amount - $workFee->param_1) * $workFee->param_4 / 100) + $workFee->param_3;
                } else {
                    return $this->responseUnprocessable("Le dossier n'est pas encore redigé.");
                }
            } else {
                $total = $receipt['amount'];
            }

            $receipt_amount_excluding_tax = ceil($total);
            $receipt_amount_tax = ceil(($total * config('services.settings.tax_rate')) / 100);
            $receipt_amount = ceil($total + $receipt_amount_tax);
            
            $receipt = Receipt::create([
                'assignment_id' => $request->assignment_id,
                'receipt_type_id' => $receipt['receipt_type_id'],
                'amount_excluding_tax' => $receipt_amount_excluding_tax,
                'amount_tax' => $receipt_amount_tax,
                'amount' => $receipt_amount,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        $receipt_amount_excluding_tax = ceil(Receipt::where('assignment_id', $request->assignment_id)->sum('amount_excluding_tax'));
        $receipt_amount_tax = ceil(Receipt::where('assignment_id', $request->assignment_id)->sum('amount_tax'));
        $receipt_amount = ceil(Receipt::where('assignment_id', $request->assignment_id)->sum('amount'));

        $assignment = Assignment::find($request->assignment_id);
        $assignment->update([
            'receipt_amount_excluding_tax' => $receipt_amount_excluding_tax,
            'receipt_amount_tax' => $receipt_amount_tax,
            'receipt_amount' => $receipt_amount,
        ]);

        $this->recalculate($assignment->id);

        return $this->responseCreated('Receipts created successfully', null);
    }

    /**
     * Afficher une quittance
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $receipt = Receipt::join('assignments', 'receipts.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('receipts.id', $id)
            ->firstOrFail();

        return $this->responseSuccess(null, new ReceiptResource($receipt->load('receiptType', 'status')));
    }

    /**
     * Mettre à jour une quittance
     *
     * @authenticated
     */
    public function update(UpdateReceiptRequest $request, $id): JsonResponse
    {
        $receipt = Receipt::join('assignments', 'receipts.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('receipts.id', $id)
            ->firstOrFail();

        $assignment = Assignment::with('technicalConclusion')->find($receipt->assignment_id);

        if($assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return $this->responseUnprocessable("Le dossier est déjà réglé.");
        }

        if($request->receipt_type_id == ReceiptType::where('code', ReceiptTypeEnum::WORK_FEE)->first()->id){
            $amount = $assignment->total_amount;
            if($amount){
                if($assignment->technicalConclusion && $assignment->technicalConclusion->code != 'TC001'){
                    $amount = $assignment->market_value - $assignment->salvage_value;
                }
                $workFee = WorkFee::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('param_1', '<', $amount)->where('param_2', '>=', $amount)->first();
                if(!$workFee){
                    $workFee = WorkFee::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->orderBy('param_2', 'desc')->first();
                }
                $total = (($amount - $workFee->param_1) * $workFee->param_4 / 100) + $workFee->param_3;
            } else {
                return $this->responseUnprocessable("Le dossier n'est pas encore redigé.");
            }
        } else {
            $total = $request->amount;
        }

        $receipt_amount_excluding_tax = ceil($total);
        $receipt_amount_tax = ceil(($total * config('services.settings.tax_rate')) / 100);
        $receipt_amount = ceil($total + $receipt_amount_tax);

        $receipt->update([
            'amount_excluding_tax' => $receipt_amount_excluding_tax,
            'amount_tax' => $receipt_amount_tax,
            'amount' => $receipt_amount,
            'updated_by' => auth()->user()->id,
        ]);

        $receipt_amount_excluding_tax = ceil(Receipt::where('assignment_id', $receipt->assignment_id)->sum('amount_excluding_tax'));
        $receipt_amount_tax = ceil(Receipt::where('assignment_id', $receipt->assignment_id)->sum('amount_tax'));
        $receipt_amount = ceil(Receipt::where('assignment_id', $receipt->assignment_id)->sum('amount'));

        $assignment->update([
            'receipt_amount_excluding_tax' => $receipt_amount_excluding_tax,
            'receipt_amount_tax' => $receipt_amount_tax,
            'receipt_amount' => $receipt_amount,
        ]);

        $this->recalculate($assignment->id);

        return $this->responseSuccess('Receipt updated Successfully', new ReceiptResource($receipt));
    }

    /**
     * Recalculer les données d'une main-d'œuvre
     *
     * @authenticated
     */
    public function recalculate($assignment_id)
    {
        $assignment = Assignment::findOrFail($assignment_id);

        $total_receipt_amount_excluding_tax = Receipt::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_excluding_tax');
        $total_receipt_amount_tax = Receipt::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount_tax');
        $total_receipt_amount = Receipt::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount');

        $assignment->update([
            'receipt_amount_excluding_tax' => $total_receipt_amount_excluding_tax,
            'receipt_amount_tax' => $total_receipt_amount_tax,
            'receipt_amount' => $total_receipt_amount,
        ]);

        // dispatch(new GenerateExpertiseReportPdfJob($assignment));

    }

    /**
     * Supprimer une quittance
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $receipt = Receipt::join('assignments', 'receipts.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('receipts.id', $id)
            ->firstOrFail();

        $receipt->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_at' => now(),
            'deleted_by' => auth()->user()->id,
        ]);

        $receipt->delete();

        $this->recalculate($receipt->assignment_id);

        return $this->responseDeleted();
    }

   
}
