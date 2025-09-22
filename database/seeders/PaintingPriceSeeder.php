<?php

namespace Database\Seeders;

use App\Models\PaintingPrice;
use App\Models\PaintType;
use App\Models\NumberPaintElement;
use App\Models\HourlyRate;
use App\Models\Status;
use App\Enums\StatusEnum;
use App\Enums\PaintTypeEnum;
use App\Enums\NumberPaintElementEnum;
use App\Enums\HourlyRateEnum;
use Illuminate\Database\Seeder;

class PaintingPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // ONE
        // 1750:ONE - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 2275,
            'param_2' => 1225,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 2616,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 2844,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 3072,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 2600:TWO - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 3380,
            'param_2' => 1820,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 3887,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 4225,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 4563,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 3000:THREE - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 3900,
            'param_2' => 2100,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 4485,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 4875,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 5265,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4000:FOUR - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 5200,
            'param_2' => 2800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 5980,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 6500,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 7020,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4200:FIVE - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 5460,
            'param_2' => 2940,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 6279,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 6825,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 7371,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4500:SIX - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 5850,
            'param_2' => 3150,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 6728,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 7313,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 7898,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 6750:SEVEN - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 8775,
            'param_2' => 4725,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 10092,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 10969,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 11847,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 7700:EIGHT - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 10010,
            'param_2' => 5390,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 11511,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 12512,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 13513,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 8250:NINE - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 10725,
            'param_2' => 5775,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 12334,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 13406,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 14479,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 8800:TEN - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 11440,
            'param_2' => 6160,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 13156,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 14300,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 15444,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 9350:ELEVEN - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 12155,
            'param_2' => 6545,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 13979,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 15194,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 16409,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 9900:TWELVE - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 12850,
            'param_2' => 6930,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 14800,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 16087,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 17374,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 11000:THIRTEEN - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 14300,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 16445,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 17875,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 19305,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 12650:FOURTEEN - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 16445,
            'param_2' => 8855,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 18912,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 20557,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 22201,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 13200:FIFTEEN - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 17160,
            'param_2' => 9240,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 19734,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 21450,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ONE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 23166,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // TWO
        // 1750:ONE - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 2047,
            'param_2' => 1225,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 2355,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 2559,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 2764,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 2600:TWO - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 3042,
            'param_2' => 1820,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 3498,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 3802,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 4107,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 3000:THREE - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 3510,
            'param_2' => 2100,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 4036,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 4386,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 4739,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4000:FOUR - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 4680,
            'param_2' => 2800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 5381,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 5848,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 6319,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4200:FIVE - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 4914,
            'param_2' => 2940,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 5650,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 6140,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 6635,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4500:SIX - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 5265,
            'param_2' => 3150,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 6055,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 6581,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 7108,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 6750:SEVEN - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 7897,
            'param_2' => 4725,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 9082,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 9871,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 10662,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 7700:EIGHT - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 9009,
            'param_2' => 5390,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 10360,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 11261,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 12162,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 8250:NINE - ONE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 9652,
            'param_2' => 5775,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 11100,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 12066,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 13031,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 8800:TEN - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 10296,
            'param_2' => 6160,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 11840,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 12870,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 13900,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 9350:ELEVEN - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 10939,
            'param_2' => 6545,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 12581,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 13674,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 14763,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 9900:TWELVE - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 11583,
            'param_2' => 6930,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 13321,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 14479,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 15637,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 11000:THIRTEEN - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 12870,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 14800,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 16087,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 17374,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 12650:FOURTEEN - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 14800,
            'param_2' => 8855,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 17020,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 18501,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 19981,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 13200:FIFTEEN - TWO
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 15444,
            'param_2' => 9240,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 17761,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 19305,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::TWO)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 20849,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // THREE
        // 1750:ONE - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 1934,
            'param_2' => 1225,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 2224,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 2417,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 2610,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 2600:TWO - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 2873,
            'param_2' => 1820,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 3310,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 3591,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 3878,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 3000:THREE - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 3315,
            'param_2' => 2100,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 3819,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 4143,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 4475,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4000:FOUR - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 4420,
            'param_2' => 2800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 5092,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 5524,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 5967,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4200:FIVE - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 4641,
            'param_2' => 2940,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 5347,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 5800,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 6265,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4500:SIX - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 4973,
            'param_2' => 3150,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 5718,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 6216,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 6713,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 6750:SEVEN - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 7450,
            'param_2' => 4725,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 8577,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 9324,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 10070,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 7700:EIGHT - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 8508,
            'param_2' => 5390,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 9785,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 10636,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 11486,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 8250:NINE - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 9116,
            'param_2' => 5775,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 10484,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 11395,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 12310,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 8800:TEN - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 9724,
            'param_2' => 6160,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 11183,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 12155,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 13127,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 9350:ELEVEN - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 10332,
            'param_2' => 6545,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 11882,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 12915,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 13948,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 9900:TWELVE - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 10939,
            'param_2' => 6930,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 12581,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 13674,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 14768,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 11000:THIRTEEN - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 12155,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 13979,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 15194,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 16409,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 12650:FOURTEEN - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 13979,
            'param_2' => 8855,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 16075,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 17472,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 18871,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 13200:FIFTEEN - THREE
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 14586,
            'param_2' => 9240,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 16774,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 18232,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::THREE)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 19691,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // ALL
        // 1750:ONE - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 2275,
            'param_2' => 1225,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 2616,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 2844,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ONE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 3072,
            'param_2' => 1750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 2600:TWO - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 3380,
            'param_2' => 1820,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 3887,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 4225,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWO)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 4563,
            'param_2' => 2600,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 3000:THREE - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 3900,
            'param_2' => 2100,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 4485,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 4875,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THREE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 5265,
            'param_2' => 3000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4000:FOUR - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 5200,
            'param_2' => 2800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 5980,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 6500,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOUR)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 7020,
            'param_2' => 4000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4200:FIVE - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 5460,
            'param_2' => 2940,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 6279,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 6825,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 7371,
            'param_2' => 4200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 4500:SIX - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 5850,
            'param_2' => 3150,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 6728,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 7313,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SIX)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 7898,
            'param_2' => 4500,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 6750:SEVEN - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 8775,
            'param_2' => 4725,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 10091,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 10969,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::SEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 11846,
            'param_2' => 6750,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 7700:EIGHT - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 10010,
            'param_2' => 5390,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 11511,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 12512,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::EIGHT)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 13513,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 8250:NINE - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 10725,
            'param_2' => 5775,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 12334,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 13406,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::NINE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 14479,
            'param_2' => 8250,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 8800:TEN - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 11440,
            'param_2' => 6160,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 13156,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 14300,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 15444,
            'param_2' => 8800,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 9350:ELEVEN - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 12155,
            'param_2' => 6545,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 13978,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 15194,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::ELEVEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 16409,
            'param_2' => 9350,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 9900:TWELVE - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 13585,
            'param_2' => 6930,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 14800,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 16087,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::TWELVE)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 17374,
            'param_2' => 9900,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 11000:THIRTEEN - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 14300,
            'param_2' => 7700,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 16445,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 17875,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::THIRTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 19305,
            'param_2' => 11000,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 12650:FOURTEEN - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 16445,
            'param_2' => 8855,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 18912,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FOURTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 20557,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 22201,
            'param_2' => 12650,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        // 13200:FIFTEEN - ALL
        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ORDINARY)->id,
            'param_1' => 17160,
            'param_2' => 9240,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::ACRYLIC)->id,
            'param_1' => 19734,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::VERNISSED)->id,
            'param_1' => 21450,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaintingPrice::create([
            'hourly_rate_id' => HourlyRate::firstWhere('value', HourlyRateEnum::FIFTEEN)->id,
            'number_paint_element_id' => NumberPaintElement::firstWhere('value', NumberPaintElementEnum::ALL)->id,
            'paint_type_id' => PaintType::firstWhere('code', PaintTypeEnum::NACRED)->id,
            'param_1' => 23166,
            'param_2' => 13200,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
