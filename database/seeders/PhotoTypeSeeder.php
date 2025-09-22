<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\PhotoType;
use App\Enums\StatusEnum;
use App\Enums\PhotoTypeEnum;
use Illuminate\Database\Seeder;

class PhotoTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PhotoType::create([
            'code' => PhotoTypeEnum::BEFORE->value,
            'label' => 'Avant travaux',
            'description' => 'Avant travaux',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PhotoType::create([
            'code' => PhotoTypeEnum::DURING->value,
            'label' => 'Pendant travaux',
            'description' => 'Pendant travaux',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PhotoType::create([
            'code' => PhotoTypeEnum::AFTER->value,
            'label' => 'Après travaux',
            'description' => 'Après travaux',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
