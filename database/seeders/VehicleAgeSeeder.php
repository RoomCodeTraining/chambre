<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\VehicleAge;
use Illuminate\Database\Seeder;

class VehicleAgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        for ($i = 1; $i <= 120; $i++) {
            VehicleAge::create([
                'value' => $i,
                'label' => $i . ' mois',
                'description' => $i . ' mois',
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            ]);
        }
    }
}
