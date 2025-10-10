<?php

namespace Database\Seeders;

use App\Models\RepairerRelationship;
use Illuminate\Database\Seeder;

class RepairerRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        RepairerRelationship::factory(10)->create();
    }
}
