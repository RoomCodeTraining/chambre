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
            'entity_id' => Entity::firstWhere('code', 'CIEAMI')->id,
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
            'password' =>'12345678',
            'entity_id' => Entity::firstWhere('code', 'CIEAMI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U003',
            'code' => 'U003',
            'last_name' => 'ADMIN',
            'first_name' => 'LCA',
            'email' => 'adminlca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'LCA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT_ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U004',
            'code' => 'U004',
            'last_name' => 'CEO',
            'first_name' => 'LCA',
            'email' => 'ceolca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'LCA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::CEO)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U005',
            'code' => 'U005',
            'last_name' => 'EXPERT',
            'first_name' => 'MANAGER',
            'email' => 'expertmanagerlca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'LCA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT_MANAGER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U006',
            'code' => 'U006',
            'last_name' => 'EXPERT',
            'first_name' => 'USER',
            'email' => 'expertlca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'LCA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U007',
            'code' => 'U007',
            'last_name' => 'OPENER',
            'first_name' => 'USER',
            'email' => 'openerlca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'LCA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::OPENER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U008',
            'code' => 'U008',
            'last_name' => 'EDITOR',
            'first_name' => 'MANAGER',
            'email' => 'editormanagerlca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'LCA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EDITOR_MANAGER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U009',
            'code' => 'U009',
            'last_name' => 'EDITOR',
            'first_name' => 'USER',
            'email' => 'editorlca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'LCA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EDITOR)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U010',
            'code' => 'U010',
            'last_name' => 'ACCOUNTANT',
            'first_name' => 'MANAGER',
            'email' => 'accountantmanagerlca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'LCA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::ACCOUNTANT_MANAGER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U011',
            'code' => 'U011',
            'last_name' => 'ACCOUNTANT',
            'first_name' => 'USER',
            'email' => 'accountantlca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'LCA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::ACCOUNTANT)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U00222',
            'code' => 'U00222',
            'last_name' => 'BUSINESS',
            'first_name' => 'DEVELOPER',
            'email' => 'businessdeveloperlca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'LCA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::BUSINESS_DEVELOPER)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U012',
            'code' => 'U012',
            'last_name' => 'ADMIN',
            'first_name' => 'BCA-CI',
            'email' => 'adminbca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT_ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U013',
            'code' => 'U013',
            'last_name' => 'CEO',
            'first_name' => 'BCA-CI',
            'email' => 'ceobca@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'BCA_CI')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::CEO)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U014',
            'code' => 'U014',
            'last_name' => 'ADMIN',
            'first_name' => 'SGA',
            'email' => 'adminsga@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'SGA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::EXPERT_ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U015',
            'code' => 'U015',
            'last_name' => 'CEO',
            'first_name' => 'SGA',
            'email' => 'ceosga@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'SGA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::CEO)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U016',
            'code' => 'U016',
            'last_name' => 'ADMIN',
            'first_name' => 'NSIA',
            'email' => 'adminnsia@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'NSIA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::INSURER_ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U017',
            'code' => 'U017',
            'last_name' => 'ADMIN',
            'first_name' => 'GNA',
            'email' => 'admingna@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'GNA')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::INSURER_ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);
        User::create([
            'username' => 'U018',
            'code' => 'U018',
            'last_name' => 'ADMIN',
            'first_name' => 'CFAO',
            'email' => 'admincfao@gmail.com',
            'telephone' => '01050635899',
            'password' => '12345678',
            'entity_id' => Entity::firstWhere('code', 'CFAO')->id,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::REPAIRER_ADMIN)->id,
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
