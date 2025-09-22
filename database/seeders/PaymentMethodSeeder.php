<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\Status;
use Illuminate\Database\Seeder;
use App\Enums\PaymentMethodEnum;
use App\Enums\StatusEnum;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PaymentMethod::create([
            'code' => PaymentMethodEnum::WAVE->value,
            'label' => 'WAVE',
            'description' => 'WAVE',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaymentMethod::create([
            'code' => PaymentMethodEnum::ORANGE_MONEY->value,
            'label' => 'ORANGE MONEY',
            'description' => 'ORANGE MONEY',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaymentMethod::create([
            'code' => PaymentMethodEnum::MTN_MONEY->value,
            'label' => 'MTN MONEY',
            'description' => 'MTN MONEY',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaymentMethod::create([
            'code' => PaymentMethodEnum::MOOV_MONEY->value,
            'label' => 'MOOV MONEY',
            'description' => 'MOOV MONEY',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
