<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\AppSetting;
use App\Models\Status;
use Illuminate\Database\Seeder;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        AppSetting::create([
            'code' => '2_fa_status',
            'value' => 'true',
            'label' => 'Statut 2FA',
            'description' => 'Statut 2FA',
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        AppSetting::create([
            'code' => '2_fa_expiry_minutes',
            'value' => '2',
            'label' => 'Temps d\'expiration 2FA',
            'description' => 'Temps d\'expiration 2FA',
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        AppSetting::create([
            'code' => 'domain_name',
            'value' => 'bca-ci.com',
            'label' => 'Nom de domaine autorisé',
            'description' => 'Nom de domaine autorisé',
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        AppSetting::create([
            'code' => 'attemp_login_limit',
            'value' => '3',
            'label' => 'Nombre d\'essais de connexion',
            'description' => 'Nombre d\'essais de connexion',
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        AppSetting::create([
            'code' => 'password_history_limit',
            'value' => '3',
            'label' => 'Nombre de mots de passe dans l\'historique des mots de passe',
            'description' => 'Nombre de mots de passe dans l\'historique des mots de passe',
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);
    }
}
