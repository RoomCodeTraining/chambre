<?php

namespace App\Http\Resources\PaintingPrice;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PaintType\PaintTypeResource;
use App\Http\Resources\HourlyRate\HourlyRateResource;
use App\Http\Resources\NumberPaintElement\NumberPaintElementResource;

class PaintingPriceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'code' => $this->code,
            'label' => $this->label,
            'description' => $this->description,
            'hourly_rate' => new HourlyRateResource($this->whenLoaded('hourlyRate')),
            'paint_type' => new PaintTypeResource($this->whenLoaded('paintType')),
            'number_paint_element' => new NumberPaintElementResource($this->whenLoaded('numberPaintElement')),
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
