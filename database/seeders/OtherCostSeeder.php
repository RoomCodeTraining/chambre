<?php

namespace Database\Seeders;

use App\Models\OtherCost;
use Illuminate\Database\Seeder;

class OtherCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        OtherCost::factory(10)->create();
    }
}
