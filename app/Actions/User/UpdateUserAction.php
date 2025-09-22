<?php

namespace App\Actions\User;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class UpdateUserAction
{
    public function execute(User $user, array $data): User
    {
        $role = Role::firstWhere('name', $data['role']);
        $user->update([
            'code' => $data['code'],
            'telephone' => $data['telephone'] ?? null,
            'first_name' => $data['first_name'] ?? null,
            'last_name' => $data['last_name'] ?? null,
            'email' => $data['email'] ?? null,
            'current_role_id' => $role->id,
        ]);

        app(PermissionRegistrar::class)->setPermissionsTeamId($user->current_role_id);
        $user->assignRole($role->name);

        return $user->fresh();
    }
}
