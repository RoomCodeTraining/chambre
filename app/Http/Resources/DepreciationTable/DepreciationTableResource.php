<?php

namespace App\Http\Resources\DepreciationTable;

use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\VehicleAge\VehicleAgeResource;
use App\Http\Resources\VehicleGenre\VehicleGenreResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DepreciationTableResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'vehicle_genre' => new VehicleGenreResource($this->whenLoaded('vehicleGenre')),
            'vehicle_age' => new VehicleAgeResource($this->whenLoaded('vehicleAge')),
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
