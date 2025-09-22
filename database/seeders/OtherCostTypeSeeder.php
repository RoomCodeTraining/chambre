<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\OtherCostType;
use Illuminate\Database\Seeder;

class OtherCostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        OtherCostType::create([
            'code' => "towing",
            'label' => "Remorquage",
            'description' => "Remorquage",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        OtherCostType::create([
            'code' => "Troubleshooting",
            'label' => "Dépannage",
            'description' => "Dépannage",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
