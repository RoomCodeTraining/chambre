<?php

namespace Database\Seeders;

use App\Models\ExpertiseCarriedOut;
use Illuminate\Database\Seeder;

class ExpertiseCarriedOutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ExpertiseCarriedOut::factory(10)->create();
    }
}
