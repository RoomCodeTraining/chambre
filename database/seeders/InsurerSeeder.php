<?php

namespace Database\Seeders;

use App\Models\Insurer;
use Illuminate\Database\Seeder;

class InsurerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Insurer::factory(10)->create();
    }
}
