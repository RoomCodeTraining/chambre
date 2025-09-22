<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\VehicleAge;
use App\Models\VehicleGenre;
use Illuminate\Database\Seeder;
use App\Models\DepreciationTable;

class DepreciationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // VG01
        DepreciationTable::create([
            'value' => 1.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 3.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 6.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 8.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 10.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 11.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 12.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 13.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 15.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 16.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 17.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 18.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.98,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20.81,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 21.64,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 22.47,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 23.3,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.13,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 26.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 27.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 28.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 31.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 32.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 33.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 36.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 38.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.98,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 41.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 49.15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 51.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 53.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 95,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 95,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 95,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 95,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 95,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 95,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG01')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        // VG02
        DepreciationTable::create([
            'value' => 3.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 6.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 13.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 16.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 23.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 26.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 33.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 36.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 41.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.98,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.64,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 51.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 53.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.98,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 56.64,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 58.30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 61.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.98,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.64,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.3,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 76.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 78.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 79.15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 79.98,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 81.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 83.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 84.15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85.42,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85.84,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 86.26,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 86.68,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.92,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 88.34,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 88.76,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 89.18,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 89.60,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG02')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);


        // VG03
        DepreciationTable::create([
            'value' => 4.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 8.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 12.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 16.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 28.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 31.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 38.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 41.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 49.98,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 51.64,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 53.30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 56.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 58.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.98,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 61.64,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.98,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.64,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.3,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 76.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.49,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 78.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80.40,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80.8,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 81.20,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 81.60,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.00,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.40,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.91,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 83.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 83.73,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 84.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 84.55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85.42,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85.84,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 86.26,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 86.68,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.92,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 88.34,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 88.76,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 89.18,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 89.60,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG03')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);


        // VG04
        DepreciationTable::create([
            'value' => 2.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 7.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 12.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 16.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 17.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 18.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 21.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 22.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 23.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 27.07,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 28.73,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30.39,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 31.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 32.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 33.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 36.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.15,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 49.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 49.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 53.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 56.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 58.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 61.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.71,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.91,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.11,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.31,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.51,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.17,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.38,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.59,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.8,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 85,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 87.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG04')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);


        // VG05
        DepreciationTable::create([
            'value' => 2.91,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 5.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 8.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 11.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.58,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 17.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 22.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 27.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 28.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30.41,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 32.07,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 33.73,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35.39,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 36.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 38.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 41.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 49.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 53.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 58.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 61.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.71,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.91,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.11,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.31,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.51,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.17,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.38,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.59,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.8,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG05')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);
        

        // VG06
        DepreciationTable::create([
            'value' => 2.91,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 5.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 8.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 11.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.58,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 17.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 22.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 27.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 32.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 49.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 58.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.91,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.73,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65.37,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65.72,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.07,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.42,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.77,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.12,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.71,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.91,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.11,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.31,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.51,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.17,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.38,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.59,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.8,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG06')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);


        // VG07
        DepreciationTable::create([
            'value' => 2.91,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 5.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 8.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 11.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.58,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 17.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 22.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 27.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 32.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 49.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 49.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 51.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 53.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 58.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 61.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.17,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.38,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.59,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.8,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG07')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);


        // VG08
        DepreciationTable::create([
            'value' => 2.91,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 5.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 8.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 11.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.58,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 17.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 22.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 27.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 32.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 49.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 58.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.91,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.32,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.73,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65.41,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.23,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.64,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.05,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.17,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.38,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.59,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.8,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG08')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);


        // VG09
        DepreciationTable::create([
            'value' => 2.91,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 5.83,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 8.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 11.66,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.58,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 17.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 22.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 27.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 32.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 38.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 41.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 49.14,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50.80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 53.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 54.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 58.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 59.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 60.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 61.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 62.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 63.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 64.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 65.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 66.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 67.90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 68.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.17,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.38,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.59,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 69.8,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 71.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 72.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 73.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 77.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 80,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 82.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG09')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);


        // VG10
        DepreciationTable::create([
            'value' => 1.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 2.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 3.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 6.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 7.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 8.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 9.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 9.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 10.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 11.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 12.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 13.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 15.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 16.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 17.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 18.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 21.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 22.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 23.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 26.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 27.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 28.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 32.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 33.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 36.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 38.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 41.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.17,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.38,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.59,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.8,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG10')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);


        // VG11
        DepreciationTable::create([
            'value' => 1.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 2.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 3.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 6.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 7.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 8.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 9.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 9.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 10.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 11.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 12.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 13.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 15.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 16.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 17.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 18.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 21.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 22.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 23.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 26.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 27.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 28.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 32.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 33.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 36.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 38.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 41.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.17,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.38,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.59,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.8,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG11')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);


        // VG12
        DepreciationTable::create([
            'value' => 1.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 2.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 3.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 6.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 7.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 8.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 9.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 9.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 10.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 11.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 12.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 13.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 15.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 16.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 17.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 18.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 21.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 22.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 23.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 26.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 27.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 28.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 32.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 33.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 36.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 38.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 41.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.17,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.38,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.59,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.8,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG12')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);


        // VG13
        DepreciationTable::create([
            'value' => 1.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 1)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 2.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 2)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 3.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 3)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 4)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 6.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 5)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 7.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 6)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 8.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 7)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 9.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 8)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 9.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 9)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 10.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 10)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 11.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 11)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 12.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 12)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 13.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 13)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 14)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 14.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 15)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 15.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 16)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 16.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 17)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 17.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 18)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 18.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 19)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 20)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 19.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 21)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 20.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 22)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 21.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 23)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 22.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 24)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 23.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 25)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 26)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 24.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 27)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 25.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 28)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 26.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 29)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 27.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 30)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 28.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 31)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 32)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 29.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 33)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 30.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 34)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 32.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 35)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 33.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 36)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 37)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 34.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 38)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 35.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 39)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 36.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 40)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.48,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 41)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 37.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 42)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 38.33,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 43)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.16,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 44)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 39.99,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 45)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 40.82,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 46)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 41.65,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 47)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 48)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.70,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 49)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 42.90,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 50)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.10,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 51)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.30,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 52)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 53)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 54)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 43.96,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 55)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.17,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 56)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.38,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 57)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.59,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 58)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 44.8,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 59)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 45,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 60)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 61)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 62)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 63)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 64)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 65)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 46.25,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 66)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 67)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 68)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 69)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 70)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 71)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 47.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 72)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 73)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 74)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 75)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 76)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 77)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 48.75,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 78)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 79)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 80)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 81)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 82)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 83)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 84)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 85)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 86)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 87)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 88)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 89)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 90)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 91)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 92)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 93)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 94)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 95)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 52.50,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 96)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 97)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 98)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 99)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 100)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 101)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 102)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 103)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 104)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 105)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 106)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 107)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 55,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 108)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 109)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 110)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 111)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 112)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 113)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 114)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 115)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 116)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 117)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 118)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 119)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        DepreciationTable::create([
            'value' => 57.5,
            'vehicle_genre_id' => VehicleGenre::where('code', 'VG13')->first()->id,
            'vehicle_age_id' => VehicleAge::where('value', 120)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);
        
    }
}
