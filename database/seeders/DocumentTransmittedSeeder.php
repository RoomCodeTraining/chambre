<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;
use App\Models\DocumentTransmitted;

class DocumentTransmittedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DocumentTransmitted::create([
            'code' => "registration_document",
            'label' => "Carte grise",
            'description' => "Carte grise",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        DocumentTransmitted::create([
            'code' => "technical_visit",
            'label' => "Visite technique",
            'description' => "Visite technique",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        DocumentTransmitted::create([
            'code' => "insurance_certificate",
            'label' => "Attestation d'assurance",
            'description' => "Attestation d'assurance",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        DocumentTransmitted::create([
            'code' => "observation",
            'label' => "Constat",
            'description' => "Constat",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
