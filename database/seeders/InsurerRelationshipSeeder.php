<?php

namespace Database\Seeders;

use App\Models\InsurerRelationship;
use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\Entity;
use Illuminate\Database\Seeder;

class InsurerRelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        InsurerRelationship::create([
            'insurer_id' => Entity::where('code', 'NSIA')->first()->id,
            'expert_firm_id' => Entity::where('code', 'LCA')->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        InsurerRelationship::create([
            'insurer_id' => Entity::where('code', 'GNA')->first()->id,
            'expert_firm_id' => Entity::where('code', 'LCA')->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);
    }
}
