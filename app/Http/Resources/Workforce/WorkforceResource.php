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
            'id' => $this->id,
            'nb_hours' => $this->nb_hours,
            'work_fee' => $this->work_fee,
            'with_tax' => $this->with_tax,
            'is_before_quote' => (bool) $this->is_before_quote,
            'is_validated' => (bool) $this->is_validated,
            'discount' => $this->discount,
            'all_paint' => $this->all_paint,
            'position' => $this->position,
            'amount_excluding_tax' => $this->amount_excluding_tax,
            'amount_tax' => $this->amount_tax,
            'amount' => $this->amount,
            'shock' => new ShockResource($this->whenLoaded('shock')),
            'assignment' => new AssignmentResource($this->whenLoaded('assignment')),
            'workforce_type' => new WorkforceTypeResource($this->whenLoaded('workforceType')),
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
