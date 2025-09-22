<?php

namespace Database\Seeders;

use App\Models\RepairInvoice;
use Illuminate\Database\Seeder;

class RepairInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        RepairInvoice::factory(10)->create();
    }
}
