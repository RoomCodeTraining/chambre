<?php

namespace Database\Seeders;

use App\Models\PaymentHistoric;
use Illuminate\Database\Seeder;

class PaymentHistoricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PaymentHistoric::factory(10)->create();
    }
}
