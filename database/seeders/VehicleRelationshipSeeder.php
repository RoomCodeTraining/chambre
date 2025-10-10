<?php

namespace Database\Seeders;

use App\Models\VehicleRelationship;
use Illuminate\Database\Seeder;

class VehicleRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        VehicleRelationship::factory(10)->create();
    }
}
