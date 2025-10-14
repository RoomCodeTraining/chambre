<?php

namespace App\Http\Resources\Payment;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PaymentType\PaymentTypeResource;
use App\Http\Resources\PaymentMethod\PaymentMethodResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Resources\Check\CheckResource;

class PaymentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'reference' => $this->reference,
            'date' => $this->date,
            'amount' => $this->amount,
            'assignment' => new AssignmentResource($this->whenLoaded('assignment')),
            'payment_type' => new PaymentTypeResource($this->whenLoaded('paymentType')),
            'payment_method' => new PaymentMethodResource($this->whenLoaded('paymentMethod')),
            'checks' => CheckResource::collection($this->whenLoaded('checks')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'cancelled_by' => new UserResource($this->whenLoaded('cancelledBy')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')),
            'deleted_by' => new UserResource($this->whenLoaded('deletedBy')),
            'cancelled_at' => dateTimeFormat($this->cancelled_at),
            'deleted_at' => dateTimeFormat($this->deleted_at),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
