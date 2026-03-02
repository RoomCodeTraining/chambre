<?php

namespace App\Http\Resources\Comparison;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Status\StatusResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Assignment\AssignmentResource;

class ComparisonResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->hashId,
            'reference' => $this->reference,
            'assignment' => new AssignmentResource($this->whenLoaded('assignment')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'created_by' => new UserResource($this->whenLoaded('createdBy')),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_by' => new UserResource($this->whenLoaded('updatedBy')),
            'updated_at' => dateTimeFormat($this->updated_at),
            'deleted_by' => new UserResource($this->whenLoaded('deletedBy')),
            'deleted_at' => dateTimeFormat($this->deleted_at),
        ];
    }
}
