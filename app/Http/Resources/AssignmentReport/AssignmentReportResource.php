<?php

namespace App\Http\Resources\AssignmentReport;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Photo\PhotoResource;
use App\Http\Resources\Shock\ShockResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Resources\TechnicalConclusion\TechnicalConclusionResource;

class AssignmentReportResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'reference' => $this->reference,
            'policy_number' => $this->policy_number,
            'claim_number' => $this->claim_number,
            'claim_date' => dateTimeFormat($this->claim_date),
            'expertise_place' => $this->expertise_place,
            'seen_before_work_date' => dateTimeFormat($this->seen_before_work_date),
            'seen_during_work_date' => dateTimeFormat($this->seen_during_work_date),
            'seen_after_work_date' => dateTimeFormat($this->seen_after_work_date),
            'new_value' => $this->new_value,
            'depreciation_rate' => $this->depreciation_rate,
            'market_value' => $this->market_value,
            'starts_at' => dateTimeFormat($this->starts_at),
            'ends_at' => dateTimeFormat($this->ends_at),
            'work_duration' => $this->work_duration,
            'expert_remark' => $this->expert_remark,
            'fee' => $this->fee,
            'work_fee' => $this->work_fee,
            'photo_fee' => $this->photo_fee,
            'amount_excluding_tax' => $this->amount_excluding_tax,
            'amount_tax' => $this->amount_tax,
            'amount' => $this->amount,
            'printed_at' => dateTimeFormat($this->printed_at),
            'assignment' => new AssignmentResource($this->whenLoaded('assignment')),
            'technical_conclusion' => new TechnicalConclusionResource($this->whenLoaded('technicalConclusion')),
            'shocks' => ShockResource::collection($this->whenLoaded('shocks')),
            'photos' => PhotoResource::collection($this->whenLoaded('photos')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')),
            'deleted_by' => new UserResource($this->whenLoaded('deletedBy')),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
            'deleted_at' => dateTimeFormat($this->deleted_at),
        ];
    }
}
