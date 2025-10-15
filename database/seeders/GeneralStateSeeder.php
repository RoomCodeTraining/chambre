<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\GeneralState;
use App\Enums\GeneralStateEnum;
use Illuminate\Database\Seeder;

class GeneralStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        GeneralState::create([
            'code' => GeneralStateEnum::VERY_GOOD,
            'label' => "Tres bon",
            'description' => "Tres bon",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        GeneralState::create([
            'code' => GeneralStateEnum::GOOD,
            'label' => "Bon",
            'description' => "Bon",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        GeneralState::create([
            'code' => GeneralStateEnum::NORMAL,
            'label' => "	",
            'description' => "Normal",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        GeneralState::create([
            'code' => GeneralStateEnum::BAD,
            'label' => "Mauvais",
            'description' => "Mauvais",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
