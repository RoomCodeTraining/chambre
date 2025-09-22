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
            'code' => GeneralStateEnum::NEW,
            'label' => "Neuf(ve)s",
            'description' => "Neuf(ve)s",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        GeneralState::create([
            'code' => GeneralStateEnum::USED,
            'label' => "Occasion",
            'description' => "Occasion",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
