<?php

namespace App\Http\Resources\Offer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Comparison\ComparisonResource;
use App\Http\Resources\Entity\EntityResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\OfferShock\OfferShockResource;

class OfferResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->hashId,
            'shock_amount_excluding_tax' => $this->shock_amount_excluding_tax,
            'shock_amount_tax' => $this->shock_amount_tax,
            'shock_amount' => $this->shock_amount,
            'comparison' => new ComparisonResource($this->whenLoaded('comparison')),
            'offer_shocks' => OfferShockResource::collection($this->whenLoaded('offerShocks')),
            'repairer' => new EntityResource($this->whenLoaded('repairer')),
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
