<?php

namespace Database\Seeders;

use App\Models\OfferShockWork;
use Illuminate\Database\Seeder;

class OfferShockWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        OfferShockWork::factory(10)->create();
    }
}
