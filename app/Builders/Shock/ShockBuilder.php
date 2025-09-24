<?php

namespace App\Builders\Shock;

use App\Models\Shock;
use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Builder;

class ShockBuilder extends Builder
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
            return $this->where('assignments.expert_firm_id', $user->entity_id);
        }

        return $this->where('current_role_id', $user->current_role_id);
    }
}
