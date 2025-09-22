<?php

namespace Database\Seeders;

use App\Models\UserAction;
use Illuminate\Database\Seeder;

class UserActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        UserAction::factory(10)->create();
    }
}
