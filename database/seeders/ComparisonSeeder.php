<?php

namespace Database\Seeders;

use App\Models\Comparison;
use Illuminate\Database\Seeder;

class ComparisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Comparison::factory(10)->create();
    }
}
