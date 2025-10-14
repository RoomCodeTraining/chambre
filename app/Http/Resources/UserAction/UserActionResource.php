<?php

namespace App\Http\Resources\UserAction;

use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\UserActionType\UserActionTypeResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserActionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'description' => $this->description,
            'ip_address' => $this->ip_address,
            'user_agent' => $this->user_agent,
            'browser' => $this->browser,
            'platform' => $this->platform,
            'device' => $this->device,
            'version' => $this->version,
            'user' => new UserResource($this->whenLoaded('user')),
            'user_action_type' => new UserActionTypeResource($this->whenLoaded('userActionType')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')),
            'deleted_by' => new UserResource($this->whenLoaded('deletedBy')),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
