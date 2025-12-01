<?php

namespace Database\Seeders;

use App\Models\StatusDeadline;
use Illuminate\Database\Seeder;

class StatusDeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        StatusDeadline::factory(10)->create();
    }
}
