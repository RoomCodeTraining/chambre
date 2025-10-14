<?php

namespace App\Http\Resources\Role;

use App\Http\Resources\Organization\OrganizationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'name' => $this->name,
            'label' => $this->label,
            'permissions' => PermissionResource::collection($this->permissions),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}