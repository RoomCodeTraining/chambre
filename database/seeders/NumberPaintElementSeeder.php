<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;
use App\Models\NumberPaintElement;
use App\Enums\NumberPaintElementEnum;

class NumberPaintElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        NumberPaintElement::create([
            'value' => NumberPaintElementEnum::ALL,
            'label' => "Peinture complète",
            'description' => "Peinture complète",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        NumberPaintElement::create([
            'value' => NumberPaintElementEnum::ONE,
            'label' => "1",
            'description' => "1",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        NumberPaintElement::create([
            'value' => NumberPaintElementEnum::TWO,
            'label' => "2",
            'description' => "2",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        NumberPaintElement::create([
            'value' => NumberPaintElementEnum::THREE,
            'label' => "3",
            'description' => "3",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
