<?php

namespace App\Http\Resources\Ascertainment;

use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Resources\AscertainmentType\AscertainmentTypeResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AscertainmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'ascertainment_type' => new AscertainmentTypeResource($this->whenLoaded('ascertainmentType')),
            'very_good' => $this->very_good ? true : false,
            'good' => $this->good ? true : false,
            'acceptable' => $this->acceptable ? true : false,
            'less_good' => $this->less_good ? true : false,
            'bad' => $this->bad ? true : false,
            'very_bad' => $this->very_bad ? true : false,
            'comment' => $this->comment,
            'assignment' => new AssignmentResource($this->whenLoaded('assignment')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')),
            'deleted_by' => new UserResource($this->whenLoaded('deletedBy')),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
