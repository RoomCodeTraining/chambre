<?php

namespace App\Http\Resources\AssignmentRequest;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentRequestResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'reference' => $this->reference,
            'policy_number' => $this->policy_number,
            'claim_number' => $this->claim_number,
            'claim_date' => dateTimeFormat($this->claim_date),
            'expertise_place' => $this->expertise_place,
            'new_market_value' => $this->new_market_value,
            'expert_firm' => new EntityResource($this->whenLoaded('expertFirm')),
            'insurer' => new EntityResource($this->whenLoaded('insurer')),
            'repairer' => new EntityResource($this->whenLoaded('repairer')),
            'client' => new ClientResource($this->whenLoaded('client')),
            'vehicle' => new VehicleResource($this->whenLoaded('vehicle')),
            'assignment_type' => new AssignmentTypeResource($this->whenLoaded('assignmentType')),
            'expertise_type' => new ExpertiseTypeResource($this->whenLoaded('expertiseType')),
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
