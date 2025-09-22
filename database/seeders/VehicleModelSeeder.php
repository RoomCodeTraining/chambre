<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Status;
use App\Enums\BrandEnum;
use App\Enums\StatusEnum;
use App\Models\VehicleModel;
use Illuminate\Database\Seeder;

class VehicleModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        VehicleModel::create([
            'code' => "208",
            'label' => "208",
            'description' => "Peugeot 208",
            'brand_id' => Brand::firstWhere('code', BrandEnum::PEUGEOT)->id,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
