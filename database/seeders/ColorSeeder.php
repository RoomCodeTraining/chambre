<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Color::create([
            'code' => "white",
            'label' => "Blanche",
            'description' => "Blanche",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Color::create([
            'code' => "red",
            'label' => "Rouge",
            'description' => "Rouge",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Color::create([
            'code' => "blue",
            'label' => "Bleu",
            'description' => "Bleu",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
