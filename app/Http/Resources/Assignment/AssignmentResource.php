<?php

namespace App\Http\Resources\Assignment;

use Carbon\Carbon;
use App\Models\User;
use App\Models\QrCode;
use App\Models\Status;
use App\Models\Payment;
use App\Enums\StatusEnum;
use App\Models\DocumentTransmitted;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Photo\PhotoResource;
use App\Http\Resources\Shock\ShockResource;
use App\Http\Resources\Client\ClientResource;
use App\Http\Resources\Entity\EntityResource;
use App\Http\Resources\QrCode\QrCodeResource;
use App\Http\Resources\Remark\RemarkResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\Invoice\InvoiceResource;
use App\Http\Resources\Payment\PaymentResource;
use App\Http\Resources\Receipt\ReceiptResource;
use App\Http\Resources\Vehicle\VehicleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OtherCost\OtherCostResource;
use App\Http\Resources\Workforce\WorkforceResource;
use App\Http\Resources\ClaimNature\ClaimNatureResource;
use App\Http\Resources\GeneralState\GeneralStateResource;
use App\Http\Resources\Ascertainment\AscertainmentResource;
use App\Http\Resources\ExpertiseType\ExpertiseTypeResource;
use App\Http\Resources\AssignmentType\AssignmentTypeResource;
use App\Http\Resources\AssignmentExpert\AssignmentExpertResource;
use App\Http\Resources\AssignmentReport\AssignmentReportResource;
use App\Http\Resources\DocumentTransmitted\DocumentTransmittedResource;
use App\Http\Resources\TechnicalConclusion\TechnicalConclusionResource;

class AssignmentResource extends JsonResource
{
    public function toArray($request): array
    {
        $now = now();
        if($this->created_at){
            $created_at = Carbon::parse($this->created_at);

            $edition_time_to_expire = $created_at->diffInHours($now);
            $edition_per_cent = $edition_time_to_expire * 100 / 24;
            $edition = $edition_per_cent > 100 ? "expired" : "in_progress";

            $recovery_time_to_expire = $created_at->diffInHours($now);
            $recovery_per_cent = $recovery_time_to_expire * 100 / 48;
            $recovery = $recovery_per_cent > 100 ? "expired" : "in_progress";
        } else {
            $edition_time_to_expire = null;
            $edition_per_cent = null;
            $edition = null;
            $recovery_time_to_expire = null;
            $recovery_per_cent = null;
            $recovery = null;
        }

        $work_sheet_established_by = User::where('id', $this->work_sheet_established_by)->first();

        $expert_signature = $work_sheet_established_by ? $work_sheet_established_by->signature : null;

        return [
            'id' => $this->id,
            'reference' => $this->reference,
            'policy_number' => $this->policy_number,
            'claim_number' => $this->claim_number,
            'claim_date' => $this->claim_date,
            'expertise_date' => $this->expertise_date,
            'expertise_place' => $this->expertise_place,
            'received_at' => $this->received_at,
            'repairer_id' => $this->repairer_id,
            'damage_declared' => $this->damage_declared,
            'point_noted' => $this->point_noted,
            'seen_before_work_date' => $this->seen_before_work_date,
            'seen_during_work_date' => $this->seen_during_work_date,
            'seen_after_work_date' => $this->seen_after_work_date,
            'contact_date' => $this->contact_date,
            'assured_value' => $this->assured_value,
            'salvage_value' => $this->salvage_value,
            'new_market_value' => $this->new_market_value,
            'depreciation_rate' => $this->depreciation_rate,
            'market_value' => $this->market_value,
            'vehicle_new_market_value_option' => $this->vehicle_new_market_value_option,
            'work_duration' => $this->work_duration,
            'instructions' => $this->instructions,
            'is_validated' => $this->is_validated ? true : false,
            'is_validated_by_repairer' => $this->is_validated_by_repairer ? true : false,
            'is_validated_by_expert' => $this->is_validated_by_expert ? true : false,
            'expert_work_sheet_remark' => $this->expert_work_sheet_remark,
            'expert_report_remark' => $this->expert_report_remark,
            'shock_amount_excluding_tax' => $this->shock_amount_excluding_tax,
            'shock_amount_tax' => $this->shock_amount_tax,
            'shock_amount' => $this->shock_amount,
            'other_cost_amount_excluding_tax' => $this->other_cost_amount_excluding_tax,
            'other_cost_amount_tax' => $this->other_cost_amount_tax,
            'other_cost_amount' => $this->other_cost_amount,
            'receipt_amount_excluding_tax' => $this->receipt_amount_excluding_tax,
            'receipt_amount_tax' => $this->receipt_amount_tax,
            'receipt_amount' => $this->receipt_amount,
            'total_amount_excluding_tax' => $this->total_amount_excluding_tax,
            'total_amount_tax' => $this->total_amount_tax,
            'total_amount' => $this->total_amount,
            'emails' => json_decode($this->emails),
            'qr_codes' => QrCode::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->first()->qr_code ?? null,
            'expert_firm' => new EntityResource($this->whenLoaded('expertFirm')),
            'insurer' => new EntityResource($this->whenLoaded('insurer')),
            'additional_insurer' => new EntityResource($this->whenLoaded('additionalInsurer')),
            'repairer' => new EntityResource($this->whenLoaded('repairer')),
            'vehicle' => new VehicleResource($this->whenLoaded('vehicle')),
            'assignment_type' => new AssignmentTypeResource($this->whenLoaded('assignmentType')),
            'expertise_type' => new ExpertiseTypeResource($this->whenLoaded('expertiseType')),
            'work_sheet_remark' => new RemarkResource($this->whenLoaded('workSheetRemark')),
            'report_remark' => new RemarkResource($this->whenLoaded('reportRemark')),
            // 'document_transmitted' => $this->document_transmitted_id ? DocumentTransmitted::whereIn('id', json_decode($this->document_transmitted_id))->get()->map(function($item){
            //     return [
            //         'id' => $item->id,
            //         'code' => $item->code,
            //         'label' => $item->label,
            //     ];
            // }) : null,
            'document_transmitted' => null,
            'claim_nature' => new ClaimNatureResource($this->whenLoaded('claimNature')),
            'technical_conclusion' => new TechnicalConclusionResource($this->whenLoaded('technicalConclusion')),
            'general_state' => new GeneralStateResource($this->whenLoaded('generalState')),
            'work_sheet_remark' => new GeneralStateResource($this->whenLoaded('workSheetRemark')),
            'report_remark' => new GeneralStateResource($this->whenLoaded('reportRemark')),
            'shocks' => ShockResource::collection($this->whenLoaded('shocks')),
            'other_costs' => OtherCostResource::collection($this->whenLoaded('otherCosts')),
            'receipts' => ReceiptResource::collection($this->whenLoaded('receipts')),
            'ascertainments' => AscertainmentResource::collection($this->whenLoaded('ascertainments')),
            'payments' => PaymentResource::collection($this->whenLoaded('payments')),
            'payment_received' => Payment::where('assignment_id', $this->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount'),
            'payment_remains' => $this->receipt_amount - Payment::where('assignment_id', $this->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount'),
            'invoices' => InvoiceResource::collection($this->whenLoaded('invoices')),
            'evaluations' => json_decode($this->evaluations),
            'photos' => PhotoResource::collection($this->whenLoaded('photos')),
            'qr_code' => new QrCodeResource($this->whenLoaded('qrCode')),
            'client' => new ClientResource($this->whenLoaded('client')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'experts' => AssignmentExpertResource::collection($this->whenLoaded('experts')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')), 
            'deleted_by' => new UserResource($this->whenLoaded('deletedBy')),
            'opened_by' => new UserResource($this->whenLoaded('openedBy')),
            'realized_by' => new UserResource($this->whenLoaded('realizedBy')),
            'repairer_validation_by' => new UserResource($this->whenLoaded('repairerValidatedBy')),
            'expert_validation_by' => new UserResource($this->whenLoaded('expertValidatedBy')),
            'directed_by' => new UserResource($this->whenLoaded('directedBy')),
            'edited_by' => new UserResource($this->whenLoaded('editedBy')),
            'validated_by' => new UserResource($this->whenLoaded('validatedBy')),
            'closed_by' => new UserResource($this->whenLoaded('closedBy')),
            'cancelled_by' => new UserResource($this->whenLoaded('cancelledBy')),
            'reference_updated_by' => new UserResource($this->whenLoaded('referenceUpdatedBy')),
            'work_sheet_established_by' => new UserResource($this->whenLoaded('workSheetEstablishedBy')),
            'expertise_sheet' => url('storage/expertise_sheet/'.$this->reference.'.pdf?v='.time()),
            'expertise_report' => url('storage/expertise_report/'.$this->reference.'.pdf?v='.time()),
            'work_sheet' => url('storage/work_sheet/'.$this->reference.'.pdf?v='.time()),
            'expert_signature' => url('storage/signature/'.$expert_signature),
            'repairer_signature' => $this->repairer_signature,
            'customer_signature' => $this->customer_signature,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
            'deleted_at' => dateTimeFormat($this->deleted_at),
            'closed_at' => dateTimeFormat($this->closed_at),
            'cancelled_at' => dateTimeFormat($this->cancelled_at),
            'edited_at' => dateTimeFormat($this->edited_at),
            'validated_at' => dateTimeFormat($this->validated_at),
            'repairer_validation_at' => dateTimeFormat($this->repairer_validation_at),
            'expert_validation_at' => dateTimeFormat($this->expert_validation_at),
            'realized_at' => dateTimeFormat($this->realized_at),
            'reference_updated_at' => dateTimeFormat($this->reference_updated_at),
            'work_sheet_established_at' => dateTimeFormat($this->work_sheet_established_at),
            'cancelled_at' => dateTimeFormat($this->cancelled_at),
            'edition_time_expire_at' => $this->created_at ? dateTimeFormat($this->created_at->addHours(24)) : null,
            'edition_status' => $this->status ? $this->status->id == Status::where('code', StatusEnum::OPENED)->first()->id || $this->status->id == Status::where('code', StatusEnum::REALIZED)->first()->id || $this->status->id == Status::where('code', StatusEnum::EDITED)->first()->id ? $edition : "done" : null,
            'edition_per_cent' => ceil($edition_per_cent),
            'recovery_time_expire_at' => $this->created_at ? dateTimeFormat($this->created_at->addHours(48)) : null,
            'recovery_status' => $this->status ? $this->status->id == Status::where('code', StatusEnum::OPENED)->first()->id || $this->status->id == Status::where('code', StatusEnum::REALIZED)->first()->id || $this->status->id == Status::where('code', StatusEnum::EDITED)->first()->id || $this->status->id == Status::where('code', StatusEnum::VALIDATED)->first()->id ? $recovery : "done" : null,
            'recovery_per_cent' => ceil($recovery_per_cent),
        ];
    }
}
