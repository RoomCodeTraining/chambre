<?php

namespace App\Http\Resources\Check;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Bank\BankResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Payment\PaymentResource;

class CheckResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'reference' => $this->reference,
            'date' => $this->date,
            'amount' => $this->amount,
            'photo' => url('storage/checks/'.$this->photo),
            'payment' => new PaymentResource($this->whenLoaded('payment')),
            'bank' => new BankResource($this->whenLoaded('bank')),
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
