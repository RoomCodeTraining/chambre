<?php

namespace Database\Seeders;

use App\Models\Repairer;
use Illuminate\Database\Seeder;

class RepairerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Repairer::factory(10)->create();
    }
}
