<?php

namespace App\Http\Resources\Entity;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\EntityType\EntityTypeResource;

class EntityResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'prefix' => $this->prefix,
            'suffix' => $this->suffix,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'address' => $this->address,
            'service_description' => $this->service_description,
            'footer_description' => $this->footer_description,
            'logo' => $this->logo ? url('storage/logos/'.$this->logo.'?v='.time()) : null,
            'status' => new StatusResource($this->whenLoaded('status')),
            'entity_type' => new EntityTypeResource($this->whenLoaded('entityType')),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
