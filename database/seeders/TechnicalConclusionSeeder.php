<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\TechnicalConclusion;
use Illuminate\Database\Seeder;

class TechnicalConclusionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        TechnicalConclusion::create([
            'code' => "TC001",
            'label' => "Réparable",
            'description' => "Réparable",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        TechnicalConclusion::create([
            'code' => "TC002",
            'label' => "Épave",
            'description' => "Épave",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        TechnicalConclusion::create([
            'code' => "TC003",
            'label' => "Économiquement irréparable",
            'description' => "Économiquement irréparable",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        TechnicalConclusion::create([
            'code' => "TC004",
            'label' => "Techniquement irréparable",
            'description' => "Techniquement irréparable",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
