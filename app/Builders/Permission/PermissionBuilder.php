<?php

namespace App\Builders\Permission;

use App\Models\Role;
use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Builder;

class PermissionBuilder extends Builder
{
    public function isSuperAdmin(): bool
    {
        return $this->model->currentRole->name == RoleEnum::SYSTEM_ADMIN->value;
    }

    public function isAdmin(): bool
    {
        return $this->model->currentRole->name == RoleEnum::ADMIN->value;
    }

    public function accessibleBy(?User $user)
    {
        if (empty($user)) {
            return $this;
        }

        if ($user->isSuperAdmin()) {
            return $this;
        }

        if ($user->isAdmin()) {
            $roles = Role::whereIn('name', [RoleEnum::GENERAL_MEANS_MANAGER->value, RoleEnum::ACCOUNTING_MANAGER->value, RoleEnum::OTHER_MANAGER->value, RoleEnum::GENERAL_MEANS_RESPONSIBLE->value, RoleEnum::UNASSIGNED->value])->pluck('id');
            return $this->whereIn('current_role_id', $roles);
        }

        return $this->where('current_role_id', $user->current_role_id);
    }
}
