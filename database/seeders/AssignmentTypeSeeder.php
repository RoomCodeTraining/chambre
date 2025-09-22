<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Enums\AssignmentTypeEnum;
use App\Models\AssignmentType;
use Illuminate\Database\Seeder;

class AssignmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        AssignmentType::create([
            'code' => AssignmentTypeEnum::INSURER->value,
            'label' => "Compagnie",
            'description' => "Compagnie",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        AssignmentType::create([
            'code' => AssignmentTypeEnum::PARTICULAR->value,
            'label' => "Particulier",
            'description' => "Particulier",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        AssignmentType::create([
            'code' => AssignmentTypeEnum::TAXI->value,
            'label' => "Taxi",
            'description' => "Taxi",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        AssignmentType::create([
            'code' => AssignmentTypeEnum::EVALUATION->value,
            'label' => "Évaluation",
            'description' => "Évaluation",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        AssignmentType::create([
            'code' => AssignmentTypeEnum::AGAINST_EXPERTISE->value,
            'label' => "Contre expertise",
            'description' => "Contre expertise",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
