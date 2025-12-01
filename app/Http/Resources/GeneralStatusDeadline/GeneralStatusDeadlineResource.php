<?php

namespace App\Http\Resources\GeneralStatusDeadline;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;

class GeneralStatusDeadlineResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'label' => $this->label,
            'description' => $this->description,
            'time_limit' => $this->time_limit,
            'target_status' => new StatusResource($this->whenLoaded('targetStatus')),
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
