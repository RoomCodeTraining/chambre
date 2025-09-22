<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\VehicleEnergy;
use Illuminate\Database\Seeder;

class VehicleEnergySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        VehicleEnergy::create([
            'code' => 'VE01',
            'label' => 'ESSENCE',
            'description' => 'ESSENCE',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleEnergy::create([
            'code' => 'VE02',
            'label' => 'GASOIL',
            'description' => 'GASOIL',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleEnergy::create([
            'code' => 'VE03',
            'label' => 'ELECTRIQUE',
            'description' => 'ELECTRIQUE',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleEnergy::create([
            'code' => 'VE04',
            'label' => 'HYBRIDE',
            'description' => 'HYBRIDE',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);
        
    }
}
