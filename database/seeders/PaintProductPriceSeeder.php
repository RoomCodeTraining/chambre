<?php

namespace Database\Seeders;

use App\Models\PaintProductPrice;
use App\Models\PaintType;
use App\Models\NumberPaintElement;
use App\Enums\PaintTypeEnum;
use App\Enums\NumberPaintElementEnum;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;

class PaintProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'value' => 6487,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'value' => 6487,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'value' => 6487,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'value' => 4573,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'value' => 7989,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'value' => 7989,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'value' => 7989,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'value' => 5255,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'value' => 9346,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'value' => 9346,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'value' => 9346,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'value' => 6021,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'value' => 13382,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([ 
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'value' => 13382,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'value' => 13382,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintProductPrice::create([
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'value' => 6854,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
