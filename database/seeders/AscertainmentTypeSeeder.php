<?php

namespace Database\Seeders;

use App\Models\AscertainmentType;
use App\Enums\StatusEnum;
use App\Models\Status;
use Illuminate\Database\Seeder;

class AscertainmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        AscertainmentType::create([
            'code' => '0001',
            'label' => 'Carrosserie',
            'description' => 'Carrosserie',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        AscertainmentType::create([
            'code' => '0002',
            'label' => 'Sellerie',
            'description' => 'Sellerie',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        AscertainmentType::create([
            'code' => '0003',
            'label' => 'Mécanique',
            'description' => 'Mécanique',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        AscertainmentType::create([
            'code' => '0004',
            'label' => 'Électricité',
            'description' => 'Électricité',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        AscertainmentType::create([
            'code' => '0005',
            'label' => 'Peinture',
            'description' => 'Peinture',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        AscertainmentType::create([
            'code' => '0006',
            'label' => 'Pneumatique',
            'description' => 'Pneumatique',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
