<?php

namespace App\Http\Resources\OfferShockWork;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OfferShock\OfferShockResource;
use App\Http\Resources\Supply\SupplyResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;

class OfferShockWorkResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->hashId,
            'position' => $this->position,
            'offer_shock' => new OfferShockResource($this->whenLoaded('offerShock')),
            'supply' => new SupplyResource($this->whenLoaded('supply')),
            'old_supply' => new SupplyResource($this->whenLoaded('oldSupply')),
            'disassembly' => $this->disassembly,
            'old_disassembly' => $this->old_disassembly,
            'replacement' => $this->replacement,
            'old_replacement' => $this->old_replacement,
            'repair' => $this->repair,
            'old_repair' => $this->old_repair,
            'paint' => $this->paint,
            'old_paint' => $this->old_paint,
            'obsolescence' => $this->obsolescence,
            'old_obsolescence' => $this->old_obsolescence,
            'control' => $this->control,
            'old_control' => $this->old_control,
            'comment' => $this->comment,
            'old_comment' => $this->old_comment,
            'is_before_quote' => $this->is_before_quote,
            'quote_validated' => $this->quote_validated,
            'amount' => $this->amount,
            'old_amount' => $this->old_amount,
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
            'status' => new StatusResource($this->whenLoaded('status')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')),
            'deleted_by' => new UserResource($this->whenLoaded('deletedBy')),
            'updated_at' => dateTimeFormat($this->updated_at),
            'deleted_at' => dateTimeFormat($this->deleted_at),
        ];
    }
}
