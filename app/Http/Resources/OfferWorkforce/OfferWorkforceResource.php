<?php

namespace App\Http\Resources\OfferWorkforce;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OfferShock\OfferShockResource;
use App\Http\Resources\WorkforceType\WorkforceTypeResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;

class OfferWorkforceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->hashId,
            'nb_hours' => $this->nb_hours,
            'old_nb_hours' => $this->old_nb_hours,
            'work_fee' => $this->work_fee,
            'old_work_fee' => $this->old_work_fee,
            'with_tax' => $this->with_tax,
            'is_before_quote' => $this->is_before_quote,
            'is_validated' => $this->is_validated,
            'discount' => $this->discount,
            'old_discount' => $this->old_discount,
            'amount_excluding_tax' => $this->amount_excluding_tax,
            'old_amount_excluding_tax' => $this->old_amount_excluding_tax,
            'amount_tax' => $this->amount_tax,
            'old_amount_tax' => $this->old_amount_tax,
            'amount' => $this->amount,
            'old_amount' => $this->old_amount,
            'quote_validated' => $this->quote_validated,
            'offer_shock' => new OfferShockResource($this->whenLoaded('offerShock')),
            'workforce_type' => new WorkforceTypeResource($this->whenLoaded('workforceType')),
            'old_workforce_type' => new WorkforceTypeResource($this->whenLoaded('oldWorkforceType')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')),
            'updated_at' => dateTimeFormat($this->updated_at),
            'deleted_by' => new UserResource($this->whenLoaded('deletedBy')),
            'deleted_at' => dateTimeFormat($this->deleted_at),
        ];
    }
}
