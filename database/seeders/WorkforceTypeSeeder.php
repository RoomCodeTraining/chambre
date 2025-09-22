<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\WorkforceType;
use Illuminate\Database\Seeder;
use App\Enums\WorkforceTypeEnum;

class WorkforceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        WorkforceType::create([
            'code' => WorkforceTypeEnum::PAINT,
            'label' => "Peinture",
            'description' => "Peinture",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        WorkforceType::create([
            'code' => \App\Enums\WorkforceTypeEnum::ELECTRICITY,
            'label' => "Electricité",
            'description' => "Electricité",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        WorkforceType::create([
            'code' => \App\Enums\WorkforceTypeEnum::SADDLERY,
            'label' => "Sellerie",
            'description' => "Sellerie",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        WorkforceType::create([
            'code' => \App\Enums\WorkforceTypeEnum::METALWORKING,
            'label' => "Tôlerie",
            'description' => "Tôlerie",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
