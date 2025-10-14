<?php

namespace App\Http\Resources\ExpertiseType;

use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpertiseTypeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'code' => $this->code,
            'label' => $this->label,
            'description' => $this->description,
            'status' => new StatusResource($this->status),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
