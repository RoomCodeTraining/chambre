<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Brand;
use App\Enums\BrandEnum;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Brand::create([
            'code' => BrandEnum::PEUGEOT,
            'label' => "Peugeot",
            'description' => "Peugeot",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::RENAULT,
            'label' => "Renault",
            'description' => "Renault",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::CITROEN,
            'label' => "Citroën",
            'description' => "Citroën",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::FORD,
            'label' => "Ford",
            'description' => "Ford",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::VOLKSWAGEN,
            'label' => "Volkswagen",
            'description' => "Volkswagen",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::OPEL,
            'label' => "Opel",
            'description' => "Opel",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::MERCEDES,
            'label' => "Mercedes",
            'description' => "Mercedes",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::AUDI,
            'label' => "Audi",
            'description' => "Audi",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::BMW,
            'label' => "BMW",
            'description' => "BMW",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::SEAT,
            'label' => "Seat",
            'description' => "Seat",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::SKODA,
            'label' => "Skoda",
            'description' => "Skoda",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::LANDROVER,
            'label' => "Land Rover",
            'description' => "Land Rover",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::JAGUAR,
            'label' => "Jaguar",
            'description' => "Jaguar",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::HYUNDAI,
            'label' => "Hyundai",
            'description' => "Hyundai",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::KIA,
            'label' => "Kia",
            'description' => "Kia",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]); 

        Brand::create([
            'code' => BrandEnum::MAZDA,
            'label' => "Mazda",
            'description' => "Mazda",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::MITSUBISHI,
            'label' => "Mitsubishi",
            'description' => "Mitsubishi",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::NISSAN,
            'label' => "Nissan",
            'description' => "Nissan",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::TOYOTA,
            'label' => "Toyota",
            'description' => "Toyota",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Brand::create([
            'code' => BrandEnum::VOLVO,
            'label' => "Volvo",
            'description' => "Volvo",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
