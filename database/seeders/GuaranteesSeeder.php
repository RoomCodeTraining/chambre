<?php

namespace Database\Seeders;

use App\Models\Guarantees;
use Illuminate\Database\Seeder;

class GuaranteesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Guarantees::factory(10)->create();
    }
}
