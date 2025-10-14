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
            'id' => $this->hashId,
            'insurer' => new EntityResource($this->whenLoaded('insurer')),
            'expert_firm' => new EntityResource($this->whenLoaded('expertFirm')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')),
            'enabled_by' => new UserResource($this->whenLoaded('enabledBy')),
            'disabled_by' => new UserResource($this->whenLoaded('disabledBy')),
            'deleted_by' => new UserResource($this->whenLoaded('deletedBy')),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
            'enabled_at' => dateTimeFormat($this->enabled_at),
            'disabled_at' => dateTimeFormat($this->disabled_at),
            'deleted_at' => dateTimeFormat($this->deleted_at),
        ];
    }
}
