<?php

namespace App\Http\Resources\Workforce;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Shock\ShockResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\WorkforceType\WorkforceTypeResource;
use App\Http\Resources\Assignment\AssignmentResource;

class WorkforceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'old_id' => $this->old_id,
            'nb_hours' => $this->nb_hours,
            'old_nb_hours' => $this->old_nb_hours,
            'work_fee' => $this->work_fee,
            'old_work_fee' => $this->old_work_fee,
            'with_tax' => $this->with_tax,
            'old_with_tax' => $this->old_with_tax,
            'is_before_quote' => (bool) $this->is_before_quote,
            'quote_validated' => (bool) $this->quote_validated,
            'discount' => $this->discount,
            'old_discount' => $this->old_discount,
            'all_paint' => $this->all_paint,
            'old_all_paint' => $this->old_all_paint,
            'position' => $this->position,
            'amount_excluding_tax' => $this->amount_excluding_tax,
            'old_amount_excluding_tax' => $this->old_amount_excluding_tax,
            'amount_tax' => $this->amount_tax,
            'old_amount_tax' => $this->old_amount_tax,
            'amount' => $this->amount,
            'old_amount' => $this->old_amount,
            'shock' => new ShockResource($this->whenLoaded('shock')),
            'assignment' => new AssignmentResource($this->whenLoaded('assignment')),
            'workforce_type' => new WorkforceTypeResource($this->whenLoaded('workforceType')),
            'old_workforce_type' => new WorkforceTypeResource($this->whenLoaded('oldWorkforceType')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')),
            'deleted_by' => new UserResource($this->whenLoaded('deletedBy')),
            'deleted_at' => dateTimeFormat($this->deleted_at),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
