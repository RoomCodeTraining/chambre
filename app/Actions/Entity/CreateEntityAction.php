<?php

namespace App\Actions\Entity;

use Carbon\Carbon;
use App\Models\Entity;
use App\Models\Status;
use App\Models\EntityType;
use App\Enums\EntityTypeEnum;
use Illuminate\Support\Facades\DB;
use App\Actions\Wallet\CreateWalletAction;

class CreateEntityAction
{
    public function __construct() {}

    public function execute(array $data) : Entity
    {
        return DB::transaction(function () use ($data) {

            $entity = Entity::create([
                'code' => $data['code'],
                'name' => $data['name'],
                'prefix' => $data['prefix'] ?? null,
                'suffix' => $data['suffix'] ?? null,
                'email' => $data['email'] ?? null,
                'telephone' => $data['telephone'] ?? null,
                'address' => $data['address'] ?? null,
                'service_description' => $data['service_description'] ?? null,
                'footer_description' => $data['footer_description'] ?? null,
                'entity_type_id' => EntityType::firstWhere('code', $data['entity_type_code'])->id,
                'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
                'created_by' => auth()->user()->id ?? null,
                'updated_by' => auth()->user()->id ?? null,
            ]);

            return $entity;
        });
    }

}
