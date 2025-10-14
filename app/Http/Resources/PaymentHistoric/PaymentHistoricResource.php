<?php

namespace App\Http\Resources\PaymentHistoric;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Payment\PaymentResource;
use App\Http\Resources\PaymentType\PaymentTypeResource;
use App\Http\Resources\PaymentMethod\PaymentMethodResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;

class PaymentHistoricResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'reference' => $this->reference,
            'date' => dateFormat($this->date),
            'amount' => $this->amount,
            'payment' => new PaymentResource($this->whenLoaded('payment')),
            'payment_type' => new PaymentTypeResource($this->whenLoaded('paymentType')),
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
