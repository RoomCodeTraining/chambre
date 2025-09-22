<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Entity;
use App\Models\Status;
use App\Enums\StatusEnum;
use App\Enums\ProfileEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Actions\User\CreateUserAction;
use Spatie\Permission\PermissionRegistrar;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'username' => 'U001',
            'code' => 'U001',
            'last_name' => 'SUPER',
            'first_name' => 'ADMIN',
            'email' => 'brahimafane06@gmail.com',
            'telephone' => '01050635899',
            'password' =>'12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::SYSTEM_ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U002',
            'code' => 'U002',
            'last_name' => 'ADMIN',
            'first_name' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U006',
            'code' => 'U006',
            'last_name' => 'Louis',
            'first_name' => 'AHOUDJE',
            'email' => 'ahoudjelouis@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U007',
            'code' => 'U007',
            'last_name' => 'Alexandre',
            'first_name' => 'AKE',
            'email' => 'akealexandre@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U008',
            'code' => 'U008',
            'last_name' => 'Constant',
            'first_name' => 'ASSY',
            'email' => 'assyconstant@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U009',
            'code' => 'U009',
            'last_name' => 'Mamadou',
            'first_name' => 'BAMBA',
            'email' => 'bambamamadou@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U010',
            'code' => 'U010',
            'last_name' => 'Victorien',
            'first_name' => 'BROU',
            'email' => 'brouvictorien@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U011',
            'code' => 'U011',
            'last_name' => 'Kany',
            'first_name' => 'CISSÉ',
            'email' => 'cissekany@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::OPENER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        
        User::create([
            'username' => 'U012',
            'code' => 'U012',
            'last_name' => '',
            'first_name' => 'COMPTABLE',
            'email' => 'comptabilite@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::ACCOUNTANT_MANAGER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U013',
            'code' => 'U013',
            'last_name' => '',
            'first_name' => 'CONTACT',
            'email' => 'contact@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U014',
            'code' => 'U014',
            'last_name' => 'Berenger',
            'first_name' => 'DIGBEU',
            'email' => 'digbeuberenger@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::BUSINESS_DEVELOPER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U015',
            'code' => 'U015',
            'last_name' => '',
            'first_name' => 'DIRECTION',
            'email' => 'direction@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::CEO)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U016',
            'code' => 'U016',
            'last_name' => 'Mawa',
            'first_name' => 'DOUMOUYA',
            'email' => 'doumouyamawa@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::OPENER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U017',
            'code' => 'U017',
            'last_name' => 'Ali',
            'first_name' => 'FANE',
            'email' => 'faneali@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U018',
            'code' => 'U018',
            'last_name' => 'Bakary',
            'first_name' => 'FANE',
            'email' => 'fanebakary@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::CEO)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U019',
            'code' => 'U019',
            'last_name' => 'Modeste',
            'first_name' => 'KOFFI',
            'email' => 'koffimodeste@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U020',
            'code' => 'U020',
            'last_name' => 'Jamilah',
            'first_name' => 'KONE',
            'email' => 'konejamilah@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::ACCOUNTANT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U021',
            'code' => 'U021',
            'last_name' => 'Landry',
            'first_name' => 'KOUAKOU',
            'email' => 'kouakoulandry@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U022',
            'code' => 'U022',
            'last_name' => 'Jean Claude',
            'first_name' => 'KOUASSI',
            'email' => 'kouassijeanclaude@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::VALIDATOR)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U023',
            'code' => 'U023',
            'last_name' => 'Julien',
            'first_name' => 'KOUASSI',
            'email' => 'kouassijulien@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT_MANAGER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U024',
            'code' => 'U024',
            'last_name' => 'Hermann',
            'first_name' => 'LOROUGNON',
            'email' => 'lorougnonhermann@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EDITOR)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U025',
            'code' => 'U025',
            'last_name' => 'Mamadou',
            'first_name' => 'MANDÉ',
            'email' => 'mandemamadou@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U026',
            'code' => 'U026',
            'last_name' => 'Franck',
            'first_name' => 'NASSET',
            'email' => 'nassetfranck@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::ACCOUNTANT_MANAGER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U027',
            'code' => 'U027',
            'last_name' => 'Eude',
            'first_name' => 'NGORAN',
            'email' => 'ngoraneude@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U028',
            'code' => 'U028',
            'last_name' => '',
            'first_name' => 'RECOUVREMENT',
            'email' => 'recouvrement@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::ACCOUNTANT_MANAGER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U029',
            'code' => 'U029',
            'last_name' => 'Aminata',
            'first_name' => 'SAVADOGO',
            'email' => 'savadogoaminata@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::OPENER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U030',
            'code' => 'U030',
            'last_name' => 'Habib Laye',
            'first_name' => 'TIMITE',
            'email' => 'timitehabiblaye@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U031',
            'code' => 'U031',
            'last_name' => 'Massandje',
            'first_name' => 'TOURE',
            'email' => 'touremassandje@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::BUSINESS_DEVELOPER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U032',
            'code' => 'U032',
            'last_name' => 'bamba',
            'first_name' => 'VASSANSI',
            'email' => 'vassansibamba@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT_MANAGER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        
        User::create([
            'username' => 'U033',
            'code' => 'U033',
            'last_name' => 'Souphiane',
            'first_name' => 'YANKENE',
            'email' => 'yankenesouphiane@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U034',
            'code' => 'U034',
            'last_name' => 'Appolinaire',
            'first_name' => 'YAO',
            'email' => 'yaoappolinaire@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U035',
            'code' => 'U035',
            'last_name' => 'Fortune',
            'first_name' => 'YAO',
            'email' => 'yaofortune@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U036',
            'code' => 'U036',
            'last_name' => 'Louis',
            'first_name' => 'YEDO',
            'email' => 'yedolois@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::OPENER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U037',
            'code' => 'U037',
            'last_name' => 'Oumar',
            'first_name' => 'ZAPRE',
            'email' => 'zapreoumar@bca-ci.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        // Assign roles to all users
        $users = User::all();
            
        foreach ($users as $user) {
            app(PermissionRegistrar::class)->setPermissionsTeamId($user->current_role_id);
            $role = Role::find($user->current_role_id);
            if ($role) {
                $user->assignRole($role->name);
            }
        }
    }
}
