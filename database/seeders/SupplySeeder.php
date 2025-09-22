<?php

namespace Database\Seeders;

use App\Models\Supply;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Supply::create([
            'code' => "S001",
            'label' => "Pare chocs avant",
            'description' => "Pare chocs avant",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Supply::create([
            'code' => "S002",
            'label' => "Pare chocs arrière",
            'description' => "Pare chocs arrière",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Supply::create([
            'code' => "S003",
            'label' => "Pare chocs latéral",
            'description' => "Pare chocs latéral",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Supply::create([
            'code' => "S005",
            'label' => "Jupe avant",
            'description' => "Jupe avant",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Supply::create([
            'code' => "S004",
            'label' => "Jupe arrière",
            'description' => "Jupe arrière",
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
