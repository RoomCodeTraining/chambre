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
            'id' => $this->hashId,
            'disassembly' => (bool) $this->disassembly,
            'old_disassembly' => (bool) $this->old_disassembly,
            'replacement' => (bool) $this->replacement,
            'old_replacement' => (bool) $this->old_replacement,
            'repair' => (bool) $this->repair,
            'old_repair' => (bool) $this->old_repair,
            'paint' => (bool) $this->paint,
            'old_paint' => (bool) $this->old_paint,
            'obsolescence' => (bool) $this->obsolescence,
            'old_obsolescence' => (bool) $this->old_obsolescence,
            'control' => (bool) $this->control,
            'old_control' => (bool) $this->old_control,
            'in_order' => (bool) $this->in_order,
            'old_in_order' => (bool) $this->old_in_order,
            'comment' => $this->comment,
            'old_comment' => $this->old_comment,
            'is_before_quote' => (bool) $this->is_before_quote,
            'quote_validated' => (bool) $this->quote_validated,
            'amount' => $this->amount,
            'old_amount' => $this->old_amount,
            'position' => $this->position,
            'obsolescence_rate' => $this->obsolescence_rate,
            'old_obsolescence_rate' => $this->old_obsolescence_rate,
            'obsolescence_amount_excluding_tax' => $this->obsolescence_amount_excluding_tax,
            'old_obsolescence_amount_excluding_tax' => $this->old_obsolescence_amount_excluding_tax,
            'obsolescence_amount_tax' => $this->obsolescence_amount_tax,
            'old_obsolescence_amount_tax' => $this->old_obsolescence_amount_tax,
            'obsolescence_amount' => $this->obsolescence_amount,
            'old_obsolescence_amount' => $this->old_obsolescence_amount,
            'recovery_amount_excluding_tax' => $this->recovery_amount_excluding_tax,
            'old_recovery_amount_excluding_tax' => $this->old_recovery_amount_excluding_tax,
            'recovery_amount_tax' => $this->recovery_amount_tax,
            'old_recovery_amount_tax' => $this->old_recovery_amount_tax,
            'recovery_amount' => $this->recovery_amount,
            'old_recovery_amount' => $this->old_recovery_amount,
            'discount' => $this->discount,
            'old_discount' => $this->old_discount,
            'discount_amount_excluding_tax' => $this->discount_amount_excluding_tax,
            'old_discount_amount_excluding_tax' => $this->old_discount_amount_excluding_tax,
            'discount_amount_tax' => $this->discount_amount_tax,
            'old_discount_amount_tax' => $this->old_discount_amount_tax,
            'discount_amount' => $this->discount_amount,
            'old_discount_amount' => $this->old_discount_amount,
            'new_amount_excluding_tax' => $this->new_amount_excluding_tax,
            'old_new_amount_excluding_tax' => $this->old_new_amount_excluding_tax,
            'new_amount_tax' => $this->new_amount_tax,
            'old_new_amount_tax' => $this->old_new_amount_tax,
            'new_amount' => $this->new_amount,
            'old_new_amount' => $this->old_new_amount,
            'amount_excluding_tax' => $this->amount_excluding_tax,
            'old_amount_excluding_tax' => $this->old_amount_excluding_tax,
            'amount_tax' => $this->amount_tax,
            'old_amount_tax' => $this->old_amount_tax,
            'amount' => $this->amount,
            'old_amount' => $this->old_amount,
            'is_for_work_sheet' => (bool) $this->is_for_work_sheet,
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
