<?php

namespace Database\Seeders;

use App\Models\AssignmentMessage;
use Illuminate\Database\Seeder;

class AssignmentMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        AssignmentMessage::factory(10)->create();
    }
}
