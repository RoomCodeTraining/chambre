<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\ExpertiseType;
use Illuminate\Database\Seeder;
use App\Enums\ExpertiseTypeEnum;

class ExpertiseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ExpertiseType::create([
            'code' => ExpertiseTypeEnum::JUDICIAL->value,
            'label' => "Expertise judiciaire",
            'description' => "Expertise judiciaire",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        ExpertiseType::create([
            'code' => ExpertiseTypeEnum::AGAINST_EXPERTISE->value,
            'label' => "Contre expertise",
            'description' => "Contre expertise",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        ExpertiseType::create([
            'code' => ExpertiseTypeEnum::STANDARD->value,
            'label' => "Expertise standard",
            'description' => "Expertise standard",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        ExpertiseType::create([
            'code' => ExpertiseTypeEnum::VEHICLE_VOL_NOT_FOUND->value,
            'label' => "Véhicule vole non trouvé",
            'description' => "Véhicule vole non trouvé",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        ExpertiseType::create([
            'code' => ExpertiseTypeEnum::VEHICLE_VOL_FOUND->value,
            'label' => "Véhicule vole trouvé",
            'description' => "Véhicule vole trouvé",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        ExpertiseType::create([
            'code' => ExpertiseTypeEnum::EVALUATION->value,
            'label' => "Évaluation de valeur vénale",
            'description' => "Évaluation de valeur vénale",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        ExpertiseType::create([
            'code' => ExpertiseTypeEnum::RISK_DIVERSE->value,
            'label' => "Expertise risque divers",
            'description' => "Expertise risque divers",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
