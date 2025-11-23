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
            return $this;
        }

        return $this;
    }
}
