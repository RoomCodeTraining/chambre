<?php

namespace App\Builders\User;

use App\Models\User;
use App\Enums\RoleEnum;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class UserBuilder extends Builder
{
    public function isSuperAdmin(): bool
    {
        return $this->model->currentRole->name == RoleEnum::SYSTEM_ADMIN->value;
    }

    public function isAdmin(): bool
    {
        return $this->model->currentRole->name == RoleEnum::ADMIN->value;
    }

    public function isInsurerAdmin(): bool
    {
        return $this->model->currentRole->name == RoleEnum::INSURER_ADMIN->value;
    }

    public function isRepairerAdmin(): bool
    {
        return $this->model->currentRole->name == RoleEnum::REPAIRER_ADMIN->value;
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
            $roles = Role::whereIn('name', [RoleEnum::ADMIN->value,RoleEnum::CEO->value,RoleEnum::EXPERT_MANAGER->value,RoleEnum::EXPERT->value,RoleEnum::OPENER->value,RoleEnum::EDITOR->value,RoleEnum::VALIDATOR->value,RoleEnum::ACCOUNTANT->value,RoleEnum::INSURER_ADMIN->value,RoleEnum::REPAIRER_ADMIN->value,RoleEnum::UNASSIGNED->value])->pluck('id');
            return $this->whereIn('current_role_id', $roles);
        }

        if ($user->isInsurerAdmin()) {
            $roles = Role::whereIn('name', [RoleEnum::INSURER_ADMIN->value,RoleEnum::INSURER_STANDARD_USER->value])->pluck('id');
            return $this->whereIn('current_role_id', $roles);
        }

        if ($user->isRepairerAdmin()) {
            $roles = Role::whereIn('name', [RoleEnum::REPAIRER_ADMIN->value,RoleEnum::REPAIRER_STANDARD_USER->value])->pluck('id');
            return $this->whereIn('current_role_id', $roles);
        }

        return $this->where('current_role_id', $user->current_role_id);
    }
}
