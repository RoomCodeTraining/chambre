<?php

namespace App\Http\Resources\PasswordHistory;

use Illuminate\Http\Resources\Json\JsonResource;

class PasswordHistoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
