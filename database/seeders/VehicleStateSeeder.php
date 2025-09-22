<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\VehicleState;
use App\Enums\VehicleStateEnum;
use Illuminate\Database\Seeder;

class VehicleStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        VehicleState::create([
            'code' => VehicleStateEnum::NEW,
            'label' => "Neuf(ve)s",
            'description' => "Neuf(ve)s",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        VehicleState::create([
            'code' => VehicleStateEnum::USED,
            'label' => "Occasion",
            'description' => "Occasion",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
