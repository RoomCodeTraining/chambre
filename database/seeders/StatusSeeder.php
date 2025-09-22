<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Status::create([
            'code' => StatusEnum::ACTIVE,
            'label' => "Actif(ve)",
            'description' => "Actif(ve)",
        ]);

        Status::create([
            'code' => StatusEnum::INACTIVE,
            'label' => "Inactif(ve)",
            'description' => "Inactif(ve)",
        ]);
        
        Status::create([
            'code' => StatusEnum::OPENED,
            'label' => "Ouvert",
            'description' => "Ouvert",
        ]);

        Status::create([
            'code' => StatusEnum::REALIZED,
            'label' => "Réalisé",
            'description' => "Réalisé",
        ]);

        Status::create([
            'code' => StatusEnum::EDITED,
            'label' => "Rédigé",
            'description' => "Rédigé",
        ]);

        Status::create([
            'code' => StatusEnum::VALIDATED,
            'label' => "Validé",
            'description' => "Validé",
        ]);

        Status::create([
            'code' => StatusEnum::CLOSED,
            'label' => "Clôturé",
            'description' => "Clôturé",
        ]);

        Status::create([
            'code' => StatusEnum::CANCELLED,
            'label' => "Annulé",
            'description' => "Annulé",
        ]);


        Status::create([
            'code' => StatusEnum::ARCHIVED,
            'label' => "Archivé",
            'description' => "Archivé",
        ]);

        Status::create([
            'code' => StatusEnum::DELETED,
            'label' => "Supprimé",
            'description' => "Supprimé",
        ]);
        
        Status::create([
            'code' => StatusEnum::IN_PAYMENT,
            'label' => "En cours de paiement",
            'description' => "En cours de paiement",
        ]);

        Status::create([    
            'code' => StatusEnum::PAID,
            'label' => "Payé",
            'description' => "Payé",
        ]);

    }
}
