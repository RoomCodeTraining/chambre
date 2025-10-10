<?php

namespace App\Http\Resources\VehicleRelationship;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Vehicle\VehicleResource;
use App\Http\Resources\Entity\EntityResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;

class VehicleRelationshipResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'vehicle' => new VehicleResource($this->vehicle),
            'expert_firm' => new EntityResource($this->expert_firm),
            'insurer' => new EntityResource($this->insurer),
            'repairer' => new EntityResource($this->repairer),
            'status' => new StatusResource($this->status),
            'created_by' => new UserResource($this->created_by),
            'updated_by' => new UserResource($this->updated_by),
            'deleted_by' => new UserResource($this->deleted_by),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
            'deleted_at' => dateTimeFormat($this->deleted_at),
        ];
    }
}
