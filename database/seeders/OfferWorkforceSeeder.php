<?php

namespace Database\Seeders;

use App\Models\OfferWorkforce;
use Illuminate\Database\Seeder;

class OfferWorkforceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        OfferWorkforce::factory(10)->create();
    }
}
