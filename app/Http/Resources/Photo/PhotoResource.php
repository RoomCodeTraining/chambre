<?php

namespace App\Http\Resources\Photo;

use App\Models\PhotoType;
use App\Enums\PhotoTypeEnum;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PhotoType\PhotoTypeResource;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Resources\AssignmentRequest\AssignmentRequestResource;

class PhotoResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position,
            'is_cover' => (bool) $this->is_cover,
            // 'report_photos' => url('storage/photos/report/'.$this->assignment->reference.'/'.$this->name),
            'photo' => $this->photo_type_id == PhotoType::where('code', PhotoTypeEnum::WORK_SHEET)->first()->id ? url('storage/photos/work-sheet/'.$this->assignment->reference.'/'.$this->name) : url('storage/photos/report/'.$this->assignment->reference.'/'.$this->name),
            'work_sheet_photo' => url('storage/photos/work-sheet/'.$this->assignment->reference.'/'.$this->name),
            'assignment_request_photo' => url('storage/photos/assignment-request/'.$this->assignmentRequest->reference.'/'.$this->name),
            'assignment' => $this->assignment ? [
                'id' => $this->assignment->id,
                'reference' => $this->assignment->reference,
            ] : null,
            'assignment_request' => $this->assignmentRequest ? [
                'id' => $this->assignmentRequest->id,
                'reference' => $this->assignmentRequest->reference,
            ] : null,
            'photo_type' => new PhotoTypeResource($this->whenLoaded('photoType')),
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
