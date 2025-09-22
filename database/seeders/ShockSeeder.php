<?php

namespace Database\Seeders;

use App\Models\Shock;
use Illuminate\Database\Seeder;

class ShockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Shock::factory(10)->create();
    }
}
