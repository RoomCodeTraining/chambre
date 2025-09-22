<?php

namespace Database\Seeders;

use App\Models\PasswordHistory;
use Illuminate\Database\Seeder;

class PasswordHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PasswordHistory::factory(10)->create();
    }
}
