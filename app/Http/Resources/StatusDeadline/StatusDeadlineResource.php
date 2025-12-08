<?php

namespace App\Http\Resources\StatusDeadline;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\GeneralStatusDeadline\GeneralStatusDeadlineResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Entity\EntityResource;

class StatusDeadlineResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'time_limit' => $this->time_limit,
            'entity' => new EntityResource($this->whenLoaded('entity')),
            'general_status_deadline' => new GeneralStatusDeadlineResource($this->whenLoaded('generalStatusDeadline')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')),
            'deleted_by' => new UserResource($this->whenLoaded('deletedBy')),
            'deleted_at' => dateTimeFormat($this->deleted_at),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
