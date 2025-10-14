<?php

namespace App\Http\Resources\GeneralState;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralStateResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'code' => $this->code,
            'label' => $this->label,
            'description' => $this->description,
            'status' => new StatusResource($this->status),
            'created_by' => new UserResource($this->createdBy),
            'updated_by' => new UserResource($this->updatedBy),
            'deleted_by' => new UserResource($this->deletedBy),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
