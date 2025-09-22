<?php

namespace Database\Seeders;

use App\Models\Workforce;
use Illuminate\Database\Seeder;

class WorkforceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Workforce::factory(10)->create();
    }
}
