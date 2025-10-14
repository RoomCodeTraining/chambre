<?php

namespace App\Http\Resources\Invoice;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Payment\PaymentResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Assignment\AssignmentResource;

class InvoiceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'reference' => $this->reference,
            'date' => $this->date,
            'object' => $this->object,
            'path' => url('storage/invoice/'.$this->reference.'.pdf?v='.time()),
            'assignment' => new AssignmentResource($this->whenLoaded('assignment')),
            'payment' => new PaymentResource($this->whenLoaded('payment')),
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
