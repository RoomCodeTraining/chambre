<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\UserActionType;
use Illuminate\Database\Seeder;
use App\Enums\UserActionTypeEnum;

class UserActionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        UserActionType::create([
            'code' => UserActionTypeEnum::LIST_USER->value,
            'label' => "Liste des utilisateurs",
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        UserActionType::create([
            'code' => UserActionTypeEnum::DETAILS_USER->value,
            'label' => "Détails d'un utilisateur",
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        UserActionType::create([
            'code' => UserActionTypeEnum::CREATE_USER->value,
            'label' => "Création d'un utilisateur",
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        UserActionType::create([
            'code' => UserActionTypeEnum::UPDATE_USER->value,
            'label' => "Modification d'un utilisateur",
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        UserActionType::create([
            'code' => UserActionTypeEnum::DELETE_USER->value,
            'label' => "Suppression d'un utilisateur",
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        UserActionType::create([
            'code' => UserActionTypeEnum::ENABLE_USER->value,
            'label' => "Activation d'un utilisateur",
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        UserActionType::create([
            'code' => UserActionTypeEnum::DISABLE_USER->value,
            'label' => "Désactivation d'un utilisateur",
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        UserActionType::create([
            'code' => UserActionTypeEnum::RESET_PASSWORD_USER->value,
            'label' => "Réinitialisation du mot de passe d'un utilisateur",
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        UserActionType::create([
            'code' => UserActionTypeEnum::CHANGE_PASSWORD_USER->value,
            'label' => "Changement de mot de passe d'un utilisateur",
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        UserActionType::create([
            'code' => UserActionTypeEnum::LOGIN_USER->value,
            'label' => "Connexion d'un utilisateur",
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);

        UserActionType::create([
            'code' => UserActionTypeEnum::LOGOUT_USER->value,
            'label' => "Déconnexion d'un utilisateur",
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ]);
    }
}
