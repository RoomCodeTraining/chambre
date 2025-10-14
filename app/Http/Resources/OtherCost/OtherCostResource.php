<?php

namespace App\Http\Resources\OtherCost;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Resources\OtherCostType\OtherCostTypeResource;

class OtherCostResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
                'id' => $this->hashId,
                'amount_excluding_tax' => $this->amount_excluding_tax,
                'amount_tax' => $this->amount_tax,
                'amount' => $this->amount,
                'other_cost_type_label' => $this->otherCostType->label,
                'assignment' => new AssignmentResource($this->whenLoaded('assignment')),
                'other_cost_type' => new OtherCostTypeResource($this->whenLoaded('otherCostType')),
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
