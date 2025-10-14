<?php

namespace App\Http\Resources\VehicleModel;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Brand\BrandResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Bodywork\BodyworkResource;
use App\Http\Resources\VehicleModel\VehicleModelResource;

class VehicleModelResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'code' => $this->code,
            'label' => $this->label,
            'description' => $this->description,
            'brand' => new BrandResource($this->whenLoaded('brand')),
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
