<?php

namespace App\Builders\Role;

use App\Models\Role;
use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Builder;

class RoleBuilder extends Builder
{
    public function isSuperAdmin(): bool
    {
        return $this->model->currentRole->name == RoleEnum::SYSTEM_ADMIN->value;
    }

    public function isAdmin(): bool
    {
        return $this->model->currentRole->name == RoleEnum::ADMIN->value;
    }

    public function isAdminExpert(): bool
    {
        return $this->model->currentRole->name == RoleEnum::EXPERT_ADMIN->value;
    }

    public function isCEO(): bool
    {
        return $this->model->currentRole->name == RoleEnum::CEO->value;
    }

    public function isExpertManager(): bool
    {
        return $this->model->currentRole->name == RoleEnum::EXPERT_MANAGER->value;
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
            $roles = Role::whereIn('name', [RoleEnum::ADMIN_EXPERT->value, RoleEnum::CEO->value, RoleEnum::EXPERT_MANAGER->value, RoleEnum::EXPERT->value, RoleEnum::OPENER->value, RoleEnum::EDITOR->value, RoleEnum::VALIDATOR->value, RoleEnum::ACCOUNTANT_MANAGER->value, RoleEnum::ACCOUNTANT->value, RoleEnum::BUSINESS_DEVELOPER->value, RoleEnum::INSURER_ADMIN->value, RoleEnum::INSURER_STANDARD_USER->value, RoleEnum::REPAIRER_ADMIN->value, RoleEnum::REPAIRER_STANDARD_USER->value, RoleEnum::UNASSIGNED->value])->pluck('id');
            return $this->whereIn('current_role_id', $roles);
        }

        if ($user->isAdminExpert()) {
            $roles = Role::whereIn('name', [RoleEnum::CEO->value, RoleEnum::EXPERT_MANAGER->value, RoleEnum::EXPERT->value, RoleEnum::OPENER->value, RoleEnum::EDITOR->value, RoleEnum::VALIDATOR->value, RoleEnum::ACCOUNTANT_MANAGER->value, RoleEnum::ACCOUNTANT->value, RoleEnum::BUSINESS_DEVELOPER->value, RoleEnum::INSURER_ADMIN->value, RoleEnum::INSURER_STANDARD_USER->value, RoleEnum::REPAIRER_ADMIN->value, RoleEnum::REPAIRER_STANDARD_USER->value, RoleEnum::UNASSIGNED->value])->pluck('id');
            return $this->whereIn('current_role_id', $roles);
        }

        if ($user->isCEO()) {
            $roles = Role::whereIn('name', [RoleEnum::EXPERT_MANAGER->value, RoleEnum::EXPERT->value, RoleEnum::OPENER->value, RoleEnum::EDITOR->value, RoleEnum::VALIDATOR->value, RoleEnum::ACCOUNTANT_MANAGER->value, RoleEnum::ACCOUNTANT->value, RoleEnum::BUSINESS_DEVELOPER->value, RoleEnum::INSURER_ADMIN->value, RoleEnum::INSURER_STANDARD_USER->value, RoleEnum::REPAIRER_ADMIN->value, RoleEnum::REPAIRER_STANDARD_USER->value, RoleEnum::UNASSIGNED->value])->pluck('id');
            return $this->whereIn('current_role_id', $roles);
        }

        if ($user->isExpertManager()) {
            $roles = Role::whereIn('name', [RoleEnum::EXPERT->value, RoleEnum::OPENER->value, RoleEnum::EDITOR->value, RoleEnum::VALIDATOR->value, RoleEnum::ACCOUNTANT_MANAGER->value, RoleEnum::ACCOUNTANT->value, RoleEnum::BUSINESS_DEVELOPER->value, RoleEnum::INSURER_ADMIN->value, RoleEnum::INSURER_STANDARD_USER->value, RoleEnum::REPAIRER_ADMIN->value, RoleEnum::REPAIRER_STANDARD_USER->value, RoleEnum::UNASSIGNED->value])->pluck('id');
            return $this->whereIn('current_role_id', $roles);
        }

        if ($user->isInsurerAdmin()) {
            $roles = Role::whereIn('name', [RoleEnum::INSURER_ADMIN->value, RoleEnum::INSURER_STANDARD_USER->value])->pluck('id');
            return $this->whereIn('current_role_id', $roles);
        }

        if ($user->isRepairerAdmin()) {
            $roles = Role::whereIn('name', [RoleEnum::REPAIRER_ADMIN->value, RoleEnum::REPAIRER_STANDARD_USER->value])->pluck('id');
            return $this->whereIn('current_role_id', $roles);
        }

        return $this->where('current_role_id', $user->current_role_id);
    }
}
