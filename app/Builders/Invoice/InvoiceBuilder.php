<?php

namespace App\Builders\Invoice;

use App\Models\User;
use App\Enums\RoleEnum;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class InvoiceBuilder extends Builder
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
