<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;
use App\Models\GeneralStatusDeadline;

class GeneralStatusDeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        GeneralStatusDeadline::create([
            'label' => 'Réalisation',
            'description' => 'Réalisation',
            'time_limit' => 24,
            'target_status_id' => Status::where('code', StatusEnum::REALIZED)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        GeneralStatusDeadline::create([
            'label' => 'Edition du devis par le réparateur',
            'description' => 'Edition du devis par le réparateur',
            'time_limit' => 24,
            'target_status_id' => Status::where('code', StatusEnum::PENDING_FOR_REPAIRER_QUOTE)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        GeneralStatusDeadline::create([
            'label' => 'Validation du devis du réparateur par l\'expert',
            'description' => 'Validation du devis du réparateur par l\'expert',
            'time_limit' => 24,
            'target_status_id' => Status::where('code', StatusEnum::PENDING_FOR_REPAIRER_QUOTE_VALIDATION)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        GeneralStatusDeadline::create([
            'label' => 'Rédaction du rapport',
            'description' => 'Rédaction du rapport',
            'time_limit' => 24,
            'target_status_id' => Status::where('code', StatusEnum::IN_EDITING)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        GeneralStatusDeadline::create([
            'label' => 'Validation de la rédaction du rapport par le réparateur',
            'description' => 'Validation de la rédaction du rapport par le réparateur',
            'time_limit' => 48,
            'target_status_id' => Status::where('code', StatusEnum::PENDING_FOR_REPAIRER_VALIDATION)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        GeneralStatusDeadline::create([
            'label' => 'Validation de la rédaction du rapport par l\'expert',
            'description' => 'Validation de la rédaction du rapport par l\'expert',
            'time_limit' => 48,
            'target_status_id' => Status::where('code', StatusEnum::PENDING_FOR_EXPERT_VALIDATION)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        GeneralStatusDeadline::create([
            'label' => 'Validation du dossier par le réparateur',
            'description' => 'Validation du dossier par le réparateur',
            'time_limit' => 48,
            'target_status_id' => Status::where('code', StatusEnum::VALIDATED)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        GeneralStatusDeadline::create([
            'label' => 'Paiement du dossier',
            'description' => 'Paiement du dossier',
            'time_limit' => 72,
            'target_status_id' => Status::where('code', StatusEnum::PAID)->first()->id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);  
    }
}
