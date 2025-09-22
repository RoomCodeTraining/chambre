<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\WorkFee;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;

class WorkFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        WorkFee::create([
            'param_1' => 0,
            'param_2' => 50000,
            'param_3' => 12000,
            'param_4' => 0,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        WorkFee::create([
            'param_1' => 50000,
            'param_2' => 150000,
            'param_3' => 12000,
            'param_4' => 15,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        WorkFee::create([
            'param_1' => 150000,
            'param_2' => 250000,
            'param_3' => 27000,
            'param_4' => 12,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        WorkFee::create([
            'param_1' => 250000,
            'param_2' => 350000,
            'param_3' => 39000,
            'param_4' => 9,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        WorkFee::create([
            'param_1' => 350000,
            'param_2' => 450000,
            'param_3' => 48000,
            'param_4' => 6,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        WorkFee::create([
            'param_1' => 450000,
            'param_2' => 600000,
            'param_3' => 54000,
            'param_4' => 3.6,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        
        WorkFee::create([
            'param_1' => 600000,
            'param_2' => 1000000,
            'param_3' => 59400,
            'param_4' => 2.4,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        WorkFee::create([
            'param_1' => 1000000,
            'param_2' => 1500000,
            'param_3' => 69000,
            'param_4' => 2.1,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        WorkFee::create([
            'param_1' => 1500000,
            'param_2' => 3000000,
            'param_3' => 79500,
            'param_4' => 1.8,
            'status_id' => Status::firstWhere('code', StatusEnum::ACTIVE)->id,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
