<?php

namespace App\Http\Resources\WorkFee;

use App\Http\Resources\User\UserResource;
use App\Http\Resources\Status\StatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkFeeResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->hashId,
            'param_1' => $this->param_1,
            'param_2' => $this->param_2,
            'param_3' => $this->param_3,
            'param_4' => $this->param_4,
            'status' => new StatusResource($this->status),
            'created_by' => new UserResource($this->createdBy),
            'updated_by' => new UserResource($this->updatedBy),
            'deleted_by' => new UserResource($this->deletedBy),
            'created_at' => dateTimeFormat($this->created_at),
            'updated_at' => dateTimeFormat($this->updated_at),
            'deleted_at' => dateTimeFormat($this->deleted_at),
        ];
    }
}
