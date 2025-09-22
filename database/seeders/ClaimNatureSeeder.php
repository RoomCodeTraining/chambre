<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\ClaimNature;
use App\Enums\ClaimNatureEnum;
use Illuminate\Database\Seeder;

class ClaimNatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ClaimNature::create([
            'code' => ClaimNatureEnum::ACCIDENT_COLLISION->value,
            'label' => 'Accident / Collision',
            'description' => 'Accident / Collision',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
        ]);

        ClaimNature::create([
            'code' => ClaimNatureEnum::ICE_BREAK->value,
            'label' => 'Bris de glace',
            'description' => 'Bris de glace',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
        ]);

        ClaimNature::create([
            'code' => ClaimNatureEnum::VANDALISM->value,
            'label' => 'Vandalisme',
            'description' => 'Vandalisme',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
        ]);

        ClaimNature::create([
            'code' => ClaimNatureEnum::FIRE->value,
            'label' => 'Incendie',
            'description' => 'Incendie (Total / Partiel)',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
        ]);

        ClaimNature::create([
            'code' => ClaimNatureEnum::VEHICLE_STOLEN_FOUND->value,
            'label' => 'Véhicule volé retrouvé',
            'description' => 'Véhicule volé retrouvé',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
        ]);

        ClaimNature::create([
            'code' => ClaimNatureEnum::VEHICLE_STOLEN_NOT_FOUND->value,
            'label' => 'Véhicule volé non retrouvé',
            'description' => 'Véhicule volé non retrouvé',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
        ]);

        ClaimNature::create([
            'code' => ClaimNatureEnum::ATTEMPTED_THEFT->value,
            'label' => 'Tentative de vol',
            'description' => 'Tentative de vol',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
        ]);

        ClaimNature::create([
            'code' => ClaimNatureEnum::VEHICLE_THEFT->value,
            'label' => 'Vol d\'un véhicule',
            'description' => 'Vol d\'un véhicule',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
        ]);

        ClaimNature::create([
            'code' => ClaimNatureEnum::FLOODING->value,
            'label' => 'Inondation',
            'description' => 'Inondation',
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
        ]);
    }
}
