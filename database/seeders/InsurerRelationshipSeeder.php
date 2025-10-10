<?php

namespace Database\Seeders;

use App\Models\InsurerRelationship;
use Illuminate\Database\Seeder;

class InsurerRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        InsurerRelationship::factory(10)->create();
    }
}
