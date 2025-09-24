<?php

namespace App\Builders\Photo;

use App\Models\User;
use App\Enums\RoleEnum;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class PhotoBuilder extends Builder
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
            return $this->where('assignments.expert_firm_id', $user->entity_id);
        }

        if ($user->isInsurerAdmin()) {
            return $this->where('assignments.insurer_id', $user->entity_id);
        }

        if ($user->isRepairerAdmin()) {
            return $this->where('assignments.repairer_id', $user->entity_id);
        }

        return $this->where('current_role_id', $user->current_role_id);
    }
}
