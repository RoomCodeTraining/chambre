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
            'entity_id' => null,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::SYSTEM_ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U0011',
            'code' => 'U0011',
            'last_name' => 'ADMIN',
            'first_name' => 'ADMIN',
            'email' => 'admin@gmail.com',
            'telephone' => '01050635899',
            'password' =>'12345678',
            'entity_id' => null,
            'current_role_id' => Role::firstWhere('name', \App\Enums\RoleEnum::ADMIN)->id,
            'status_id' => Status::firstWhere('code', \App\Enums\StatusEnum::ACTIVE)->id,
        ]);

        User::create([
            'username' => 'U002',
            'code' => 'U002',
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
            'username' => 'U0021',
            'code' => 'U0021',
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
            'username' => 'U0022',
            'code' => 'U0022',
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
            'username' => 'U006',
            'code' => 'U006',
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
            'username' => 'U007',
            'code' => 'U007',
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
            'username' => 'U008',
            'code' => 'U008',
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
