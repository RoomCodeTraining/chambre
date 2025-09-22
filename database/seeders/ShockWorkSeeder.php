<?php

namespace Database\Seeders;

use App\Models\ShockWork;
use Illuminate\Database\Seeder;

class ShockWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ShockWork::factory(10)->create();
    }
}
