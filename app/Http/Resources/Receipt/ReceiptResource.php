<?php

namespace App\Http\Resources\Receipt;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Resources\ReceiptType\ReceiptTypeResource;

class ReceiptResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'amount_excluding_tax' => $this->amount_excluding_tax,
            'amount_tax' => $this->amount_tax,
            'amount' => $this->amount,
            'assignment' => new AssignmentResource($this->whenLoaded('assignment')),
            'receipt_type' => new ReceiptTypeResource($this->whenLoaded('receiptType')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
