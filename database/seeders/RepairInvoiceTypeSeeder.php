<?php

namespace Database\Seeders;

use App\Models\RepairInvoiceType;
use Illuminate\Database\Seeder;

class RepairInvoiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        RepairInvoiceType::factory(10)->create();
    }
}
