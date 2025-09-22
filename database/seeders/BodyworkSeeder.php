<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Bodywork;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;

class BodyworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Bodywork::create([
            'code' => "sedan",
            'label' => "Berline",
            'description' => "Berline",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Bodywork::create([
            'code' => "cut",
            'label' => "Coupé",
            'description' => "Coupé",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Bodywork::create([
            'code' => "break",
            'label' => "Break",
            'description' => "Break",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Bodywork::create([
            'code' => "convertible",
            'label' => "Cabriolet",
            'description' => "Cabriolet",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
