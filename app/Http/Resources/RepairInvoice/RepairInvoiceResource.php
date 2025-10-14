<?php

namespace App\Http\Resources\RepairInvoice;

use Illuminate\Http\Resources\Json\JsonResource;

class RepairInvoiceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
