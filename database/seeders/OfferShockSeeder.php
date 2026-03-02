<?php

namespace Database\Seeders;

use App\Models\OfferShock;
use Illuminate\Database\Seeder;

class OfferShockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        OfferShock::factory(10)->create();
    }
}
