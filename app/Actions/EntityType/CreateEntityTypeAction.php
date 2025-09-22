<?php

namespace App\Actions\EntityType;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\EntityType;

class CreateEntityTypeAction
{
    public function execute(array $data)
    {
        $code = strtolower(str_replace(' ', '', $data['label']));

        $entityType = EntityType::create([
            'code' => $code,
            'label' => $data['label'],
            'description' => $data['description'],
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $entityType;
    }
}
