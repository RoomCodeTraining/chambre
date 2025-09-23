<?php

namespace Database\Seeders;

use App\Models\AssignmentRequest;
use Illuminate\Database\Seeder;

class AssignmentRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        AssignmentRequest::factory(10)->create();
    }
}
