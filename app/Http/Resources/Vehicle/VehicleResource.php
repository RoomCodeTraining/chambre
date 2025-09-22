<?php

namespace App\Http\Resources\Vehicle;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Brand\BrandResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Bodywork\BodyworkResource;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Resources\VehicleGenre\VehicleGenreResource;
use App\Http\Resources\VehicleModel\VehicleModelResource;
use App\Http\Resources\VehicleState\VehicleStateResource;
use App\Http\Resources\VehicleEnergy\VehicleEnergyResource;
use App\Http\Resources\VehicleModel\VehicleModelResourceWhenLoaded;

class VehicleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'license_plate' => $this->license_plate,
            'type' => $this->type,
            'option' => $this->option,
            'mileage' => $this->mileage,
            'serial_number' => $this->serial_number,
            'first_entry_into_circulation_date' => $this->first_entry_into_circulation_date,
            'technical_visit_date' => $this->technical_visit_date,
            'fiscal_power' => $this->fiscal_power,
            'nb_seats' => $this->nb_seats,
            'new_market_value' => $this->new_market_value,
            'brand' => new BrandResource($this->whenLoaded('brand')),
            'vehicle_model' => new VehicleModelResource($this->whenLoaded('vehicleModel')),
            'vehicle_genre' => new VehicleGenreResource($this->whenLoaded('vehicleGenre')),
            'vehicle_energy' => new VehicleEnergyResource($this->whenLoaded('vehicleEnergy')),
            'color' => new ColorResource($this->whenLoaded('color')),
            'bodywork' => new BodyworkResource($this->whenLoaded('bodywork')),
            'assignments' => AssignmentResource::collection($this->whenLoaded('assignments')),
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
