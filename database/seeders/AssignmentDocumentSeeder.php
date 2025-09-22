<?php

namespace Database\Seeders;

use App\Models\AssignmentDocument;
use Illuminate\Database\Seeder;

class AssignmentDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        AssignmentDocument::factory(10)->create();
    }
}
