<?php

namespace App\Http\Resources\ShockWork;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Shock\ShockResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\Supply\SupplyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ShockWorkResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'disassembly' => (bool) $this->disassembly,
            'replacement' => (bool) $this->replacement,
            'repair' => (bool) $this->repair,
            'paint' => (bool) $this->paint,
            'obsolescence' => (bool) $this->obsolescence,
            'control' => (bool) $this->control,
            'comment' => $this->comment,
            'amount' => $this->amount,
            'position' => $this->position,
            'obsolescence_rate' => $this->obsolescence_rate,
            'obsolescence_amount_excluding_tax' => $this->obsolescence_amount_excluding_tax,
            'obsolescence_amount_tax' => $this->obsolescence_amount_tax,
            'obsolescence_amount' => $this->obsolescence_amount,
            'recovery_amount_excluding_tax' => $this->recovery_amount_excluding_tax,
            'recovery_amount_tax' => $this->recovery_amount_tax,
            'recovery_amount' => $this->recovery_amount,
            'discount' => $this->discount,
            'discount_amount_excluding_tax' => $this->discount_amount_excluding_tax,
            'discount_amount_tax' => $this->discount_amount_tax,
            'discount_amount' => $this->discount_amount,
            'new_amount_excluding_tax' => $this->new_amount_excluding_tax,
            'new_amount_tax' => $this->new_amount_tax,
            'new_amount' => $this->new_amount,
            'amount_excluding_tax' => $this->amount_excluding_tax,
            'amount_tax' => $this->amount_tax,
            'amount' => $this->amount,
            'shock' => new ShockResource($this->whenLoaded('shock')),
            'supply' => new SupplyResource($this->whenLoaded('supply')),
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
