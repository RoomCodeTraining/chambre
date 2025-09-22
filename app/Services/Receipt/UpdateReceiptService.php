<?php

namespace App\Services\Receipt;

use Carbon\Carbon;
use App\Models\Status;
use App\Models\Receipt;
use App\Models\WorkFee;
use App\Enums\StatusEnum;
use App\Models\Assignment;
use App\Models\VehicleAge;
use App\Models\ReceiptType;
use App\Models\VehicleGenre;
use App\Models\VehicleEnergy;
use App\Enums\ReceiptTypeEnum;
use App\Models\DepreciationTable;
use Illuminate\Http\JsonResponse;
use Essa\APIToolKit\Api\ApiResponse;
use App\Jobs\GenerateExpertiseReportPdfJob;
use App\Http\Resources\Receipt\ReceiptResource;

class UpdateReceiptService
{
    use ApiResponse;

    public function updateReceipt($assignment_id)
    {
        $assignment = Assignment::with('technicalConclusion')->find($assignment_id);

        if($assignment->status_id == Status::where('code', StatusEnum::PAID)->first()->id){
            return null;
        }

        $receipts = Receipt::where('assignment_id', $assignment->id)->get();

        if($receipts->count() == 0){
            return null;
        }
        
        foreach($receipts as $receipt){
            if($receipt['receipt_type_id'] == ReceiptType::where('code', ReceiptTypeEnum::WORK_FEE)->first()->id){
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

                    $receipt_amount_excluding_tax = ceil($total);
                    $receipt_amount_tax = ceil(($total * config('services.settings.tax_rate')) / 100);
                    $receipt_amount = ceil($total + $receipt_amount_tax);
                    
                    Receipt::where('id', $receipt->id)->update([
                        'receipt_type_id' => $receipt->receipt_type_id,
                        'amount_excluding_tax' => $receipt_amount_excluding_tax,
                        'amount_tax' => $receipt_amount_tax,
                        'amount' => $receipt_amount,
                    ]);
                } else {
                    return null;
                }
            }
        }

        $receipt_amount_excluding_tax = ceil(Receipt::where('assignment_id', $assignment->id)->sum('amount_excluding_tax'));
        $receipt_amount_tax = ceil(Receipt::where('assignment_id', $assignment->id)->sum('amount_tax'));
        $receipt_amount = ceil(Receipt::where('assignment_id', $assignment->id)->sum('amount'));

        $assignment = Assignment::find($assignment->id);
        $assignment->update([
            'receipt_amount_excluding_tax' => $receipt_amount_excluding_tax,
            'receipt_amount_tax' => $receipt_amount_tax,
            'receipt_amount' => $receipt_amount,
        ]);

        // dispatch(new GenerateExpertiseReportPdfJob($assignment));

        return 'receipt updated successfully';
        
    }
}