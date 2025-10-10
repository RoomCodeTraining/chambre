<?php

namespace Database\Seeders;

use App\Models\ClientRelationship;
use Illuminate\Database\Seeder;

class ClientRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ClientRelationship::factory(10)->create();
    }
}
