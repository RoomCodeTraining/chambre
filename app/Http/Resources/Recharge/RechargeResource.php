<?php

namespace App\Http\Resources\Recharge;

use App\Http\Resources\Entity\EntityResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\PaymentMethod\PaymentMethodResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RechargeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'reference' => $this->reference,
            'amount' => $this->amount,
            'user_first_name' => $this->user_first_name,
            'user_last_name' => $this->user_last_name,
            'user_phone_number' => $this->user_phone_number,
            'entity' => new EntityResource($this->whenLoaded('entity')),
            'payment_method' => new PaymentMethodResource($this->whenLoaded('paymentMethod')),
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
