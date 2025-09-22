<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\ReceiptType;
use App\Enums\ReceiptTypeEnum;
use Illuminate\Database\Seeder;

class ReceiptTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ReceiptType::create([
            'code' => ReceiptTypeEnum::WORK_FEE,
            'label' => "Honoraires",
            'description' => "Honoraires",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        ReceiptType::create([
            'code' => ReceiptTypeEnum::DOCUMENT_FEE,
            'label' => "Frais de dossier",
            'description' => "Frais de dossier",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        ReceiptType::create([
            'code' => ReceiptTypeEnum::PHOTO,
            'label' => "Photo",
            'description' => "Photo",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
