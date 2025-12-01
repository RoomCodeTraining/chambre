<?php

namespace Database\Seeders;

use App\Models\GeneralStatusDeadline;
use Illuminate\Database\Seeder;

class GeneralStatusDeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        GeneralStatusDeadline::factory(10)->create();
    }
}
