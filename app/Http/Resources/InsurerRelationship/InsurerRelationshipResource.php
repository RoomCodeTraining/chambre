<?php

namespace App\Http\Resources\InsurerRelationship;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Entity\EntityResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;

class InsurerRelationshipResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'insurer' => new EntityResource($this->insurer),
            'expert_firm' => new EntityResource($this->expert_firm),
            'status' => new StatusResource($this->status),
            'created_by' => new UserResource($this->created_by),
            'updated_by' => new UserResource($this->updated_by),
            'enabled_by' => new UserResource($this->enabled_by),
            'disabled_by' => new UserResource($this->disabled_by),
            'deleted_by' => new UserResource($this->deleted_by),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
            'enabled_at' => dateTimeFormat($this->enabled_at),
            'disabled_at' => dateTimeFormat($this->disabled_at),
            'deleted_at' => dateTimeFormat($this->deleted_at),
        ];
    }
}
