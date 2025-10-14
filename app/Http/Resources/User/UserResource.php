<?php

namespace App\Http\Resources\User;

use App\Http\Resources\RoleResource;
use Illuminate\Http\Resources\MissingValue;
use App\Http\Resources\Entity\EntityResource;
use App\Http\Resources\Office\OfficeResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Organization\OrganizationResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'code' => $this->code,
            'email' => $this->email,
            'username' => $this->username,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'telephone' => $this->telephone,
            'entity' => new EntityResource($this->whenLoaded('entity')),
            'photo_url' => $this->photo_url,
            'pending_verification' => (bool) $this->welcome_valid_until,
            'role' => (new RoleResource($this->whenLoaded('currentRole'))),
            'permissions' => $this->when(! ($this->whenLoaded('permissions') instanceof MissingValue), function () {
                return collect($this->getAllPermissions())->map(fn ($perm) => $perm['name']);
            }),
            'signature' => $this->signature ? url('storage/signature/'.$this->signature) : null,
            'status' => new StatusResource($this->whenLoaded('status')),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
