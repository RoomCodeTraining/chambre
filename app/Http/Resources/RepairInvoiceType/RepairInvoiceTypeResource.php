<?php

namespace App\Http\Resources\RepairInvoiceType;

use Illuminate\Http\Resources\Json\JsonResource;

class RepairInvoiceTypeResource extends JsonResource
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
