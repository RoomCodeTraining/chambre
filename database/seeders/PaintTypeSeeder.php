<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\PaintType;
use App\Enums\PaintTypeEnum;
use Illuminate\Database\Seeder;

class PaintTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PaintType::create([
            'code' => PaintTypeEnum::ORDINARY,
            'label' => "Ordinaire",
            'description' => "Ordinaire",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintType::create([
            'code' => PaintTypeEnum::ACRYLIC,
            'label' => "Acrylique (BD)",
            'description' => "Acrylique (BD)",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintType::create([
            'code' => PaintTypeEnum::VERNISSED,
            'label' => "Vernissée",
            'description' => "Vernissée",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintType::create([
            'code' => PaintTypeEnum::NACRED,
            'label' => "Nacrée",
            'description' => "Nacrée",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
