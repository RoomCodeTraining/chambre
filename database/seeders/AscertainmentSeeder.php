<?php

namespace Database\Seeders;

use App\Models\Ascertainment;
use Illuminate\Database\Seeder;

class AscertainmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Ascertainment::factory(10)->create();
    }
}
