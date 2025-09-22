<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\HourlyRate;
use App\Enums\HourlyRateEnum;
use Illuminate\Database\Seeder;

class HourlyRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        HourlyRate::create([
            'value' => HourlyRateEnum::ONE,
            'label' => "1750",
            'description' => "1750",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::TWO,
            'label' => "2600",
            'description' => "2600",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::THREE,
            'label' => "3000",
            'description' => "3000",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::FOUR,
            'label' => "4000",
            'description' => "4000",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::FIVE,
            'label' => "4200",
            'description' => "4200",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::SIX,
            'label' => "4500",
            'description' => "4500",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::SEVEN,
            'label' => "6750",
            'description' => "6750",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::EIGHT,
            'label' => "7700",
            'description' => "7700",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::NINE,
            'label' => "8250",
            'description' => "8250",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::TEN,
            'label' => "8800",
            'description' => "8800",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::ELEVEN,
            'label' => "9350",
            'description' => "9350",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::TWELVE,
            'label' => "9900",
            'description' => "9900",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::THIRTEEN,
            'label' => "11000",
            'description' => "11000",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::FOURTEEN,
            'label' => "12650",
            'description' => "12650",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        HourlyRate::create([
            'value' => HourlyRateEnum::FIFTEEN,
            'label' => "13200",
            'description' => "13200",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
