<?php

namespace App\Http\Resources\Client;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\Vehicle\VehicleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Assignment\AssignmentResource;

class ClientResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone_1' => $this->phone_1,
            'phone_2' => $this->phone_2,
            'address' => $this->address,
            'assignments' => AssignmentResource::collection($this->whenLoaded('assignments')),
            'vehicles' => VehicleResource::collection($this->whenLoaded('vehicles')),
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
