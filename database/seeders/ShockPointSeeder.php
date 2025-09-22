<?php

namespace Database\Seeders;

use App\Models\ShockPoint;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;

class ShockPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ShockPoint::create([
            'code' => "SP001",
            'label' => "Arrière droit",
            'description' => "Arrière droit",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        ShockPoint::create([
            'code' => "SP002",
            'label' => "Arrière gauche",
            'description' => "Arrière gauche",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        ShockPoint::create([
            'code' => "SP003",
            'label' => "Avant droit",
            'description' => "Avant droit",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        ShockPoint::create([
            'code' => "SP004",
            'label' => "Avant gauche",
            'description' => "Avant gauche",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
