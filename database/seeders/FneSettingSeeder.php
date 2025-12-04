<?php

namespace Database\Seeders;

use App\Models\FneSetting;
use Illuminate\Database\Seeder;

class FneSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        FneSetting::factory(10)->create();
    }
}
