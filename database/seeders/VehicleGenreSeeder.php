<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\VehicleGenre;
use Illuminate\Database\Seeder;

class VehicleGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        VehicleGenre::create([
            'code' => 'VG01',
            'max_mileage_essence_per_year' => '5000.00',
            'max_mileage_diesel_per_year' => '5000.00',
            'label' => 'CYCLO MOTO 5000 Km/An',
            'description' => 'CYCLO MOTO 5000 Km/An',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG02',
            'max_mileage_essence_per_year' => '60000.00',
            'max_mileage_diesel_per_year' => '60000.00',
            'label' => 'TAXI COMPTEUR',
            'description' => 'TAXI COMPTEUR 60000 Km/An',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG03',
            'max_mileage_essence_per_year' => '80000.00',
            'max_mileage_diesel_per_year' => '80000.00',
            'label' => 'VTC (Véhicule de Transport avec Chauffeur)',
            'description' => 'VTC (Véhicule de Transport avec Chauffeur) 80000 Km/An',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG04',
            'max_mileage_essence_per_year' => '25000.00',
            'max_mileage_diesel_per_year' => '35000.00',
            'label' => 'VÉHICULE PARTICULIER',
            'description' => 'VÉHICULE PARTICULIER, SUV, 4*4, Essence 25000 Km/An, Diesel 35000 Km/An',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG05',
            'max_mileage_essence_per_year' => '40000.00',
            'max_mileage_diesel_per_year' => '40000.00',
            'label' => 'VÉHICULE UTILITAIRE',
            'description' => 'VÉHICULE UTILITAIRE / PU / CTTE ET 4*4 FGON 40000 Km/An',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG06',
            'max_mileage_essence_per_year' => '70000.00',
            'max_mileage_diesel_per_year' => '70000.00',
            'label' => 'CAMIONNETTE DE 2.5 T à 5 T',
            'description' => 'CAMIONNETTE DE 2.5 T à 5 T, 700000 Km/An',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG07',
            'max_mileage_essence_per_year' => '60000.00',
            'max_mileage_diesel_per_year' => '60000.00',
            'label' => 'CAMION DE + 5 T',
            'description' => 'CAMION DE + 5 T, 600000 Km/An',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG08',
            'max_mileage_essence_per_year' => '100000.00',
            'max_mileage_diesel_per_year' => '100000.00',
            'label' => 'BUS/TPV/MINIBUS, AUTOCAR',
            'description' => 'BUS/TPV/MINIBUS, AUTOCAR, 100000 Km/An',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG09',
            'max_mileage_essence_per_year' => '80000.00',
            'max_mileage_diesel_per_year' => '80000.00',
            'label' => 'TRACTEUR ROUTIER',
            'description' => 'TRACTEUR ROUTIER, 80000 Km/An',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG10',
            'max_mileage_essence_per_year' => '80000.00',
            'max_mileage_diesel_per_year' => '80000.00',
            'label' => 'SEMI-REMORQUE',
            'description' => 'SEMI-REMORQUE',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG11',
            'max_mileage_essence_per_year' => '0.00',
            'max_mileage_diesel_per_year' => '0.00',
            'label' => 'PETIT ENGIN',
            'description' => 'PETIT ENGIN',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG12',
            'max_mileage_essence_per_year' => '0.00',
            'max_mileage_diesel_per_year' => '0.00',
            'label' => 'GROS ENGIN',
            'description' => 'GROS ENGIN',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        VehicleGenre::create([
            'code' => 'VG13',
            'max_mileage_essence_per_year' => '0.00',
            'max_mileage_diesel_per_year' => '0.00',
            'label' => 'CITERNE',
            'description' => 'CITERNE',
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);
        
    }
}
