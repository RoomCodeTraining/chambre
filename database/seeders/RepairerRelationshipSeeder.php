<?php

namespace Database\Seeders;

use App\Models\RepairerRelationship;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;

class RepairerRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        RepairerRelationship::create([
            'repairer_id' => Entity::where('code', 'CFAO')->first()->id,
            'expert_firm_id' => Entity::where('code', 'LCA')->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);
    }
}
