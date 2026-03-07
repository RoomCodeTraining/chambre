<?php

namespace Database\Seeders;

use App\Models\Recharge;
use Illuminate\Database\Seeder;

class RechargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Recharge::factory(10)->create();
    }
}
