<?php

namespace App\Http\Resources\AssignmentDocument;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentDocumentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
        ];
    }
}
