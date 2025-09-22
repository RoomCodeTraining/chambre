<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;
use App\Enums\PaymentTypeEnum;
use App\Enums\StatusEnum;
use App\Models\Status;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PaymentType::create([
            'code' => PaymentTypeEnum::CASH->value,
            'label' => 'Espèce',
            'description' => 'Espèce',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaymentType::create([
            'code' => PaymentTypeEnum::CHECK->value,
            'label' => 'Chèque',
            'description' => 'Chèque',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaymentType::create([
            'code' => PaymentTypeEnum::BANK_TRANSFER->value,
            'label' => 'Virement',
            'description' => 'Virement',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        PaymentType::create([
            'code' => PaymentTypeEnum::MOBILE_MONEY->value,
            'label' => 'Mobile Money',
            'description' => 'Mobile Money',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
