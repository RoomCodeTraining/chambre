<?php

namespace App\Http\Resources\Shock;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ShockWork\ShockWorkResource;
use App\Http\Resources\Workforce\WorkforceResource;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Resources\ShockPoint\ShockPointResource;
use App\Http\Resources\PaintType\PaintTypeResource;
use App\Http\Resources\HourlyRate\HourlyRateResource;

class ShockResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'position' => $this->position,
            'with_tax' => $this->with_tax,
            'obsolescence_amount_excluding_tax' => $this->obsolescence_amount_excluding_tax,
            'obsolescence_amount_tax' => $this->obsolescence_amount_tax,
            'obsolescence_amount' => $this->obsolescence_amount,
            'recovery_amount_excluding_tax' => $this->recovery_amount_excluding_tax,
            'recovery_amount_tax' => $this->recovery_amount_tax,
            'recovery_amount' => $this->recovery_amount,
            'new_amount_excluding_tax' => $this->new_amount_excluding_tax,
            'new_amount_tax' => $this->new_amount_tax,
            'new_amount' => $this->new_amount,
            'workforce_amount_excluding_tax' => $this->workforce_amount_excluding_tax,
            'workforce_amount_tax' => $this->workforce_amount_tax,
            'workforce_amount' => $this->workforce_amount,
            'amount_excluding_tax' => $this->amount_excluding_tax,
            'amount_tax' => $this->amount_tax,
            'amount' => $this->amount,
            'assignment' => new AssignmentResource($this->whenLoaded('assignment')),
            'shock_point' => new ShockPointResource($this->whenLoaded('shockPoint')),
            'paint_type' => new PaintTypeResource($this->whenLoaded('paintType')),
            'hourly_rate' => new HourlyRateResource($this->whenLoaded('hourlyRate')),
            'shock_works' => ShockWorkResource::collection($this->whenLoaded('shockWorks')),
            'workforces' => WorkforceResource::collection($this->whenLoaded('workforces')),
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
