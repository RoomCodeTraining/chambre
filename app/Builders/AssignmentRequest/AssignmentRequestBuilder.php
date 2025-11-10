<?php

namespace App\Builders\AssignmentRequest;

use App\Models\User;
use App\Enums\RoleEnum;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class AssignmentRequestBuilder extends Builder
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

    public function isInsurerAdmin(): bool
    {
        return $this->model->currentRole->name == RoleEnum::INSURER_ADMIN->value;
    }

    public function isInsurerStandardUser(): bool
    {
        return $this->model->currentRole->name == RoleEnum::INSURER_STANDARD_USER->value;
    }

    public function isRepairerAdmin(): bool
    {
        return $this->model->currentRole->name == RoleEnum::REPAIRER_ADMIN->value;
    }

    public function isRepairerStandardUser(): bool
    {
        return $this->model->currentRole->name == RoleEnum::REPAIRER_STANDARD_USER->value;
    }

    public function isClient(): bool
    {
        return $this->model->currentRole->name == RoleEnum::CLIENT->value;
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

        if ($user->isAdminExpert()) {
            return $this->where('expert_firm_id', $user->entity_id);
        }

        if ($user->isInsurerAdmin()) {
            return $this->where('insurer_id', $user->entity_id);
        }

        if ($user->isInsurerStandardUser()) {
            return $this->where('insurer_id', $user->entity_id);
        }

        if ($user->isRepairerAdmin()) {
            return $this->where('repairer_id', $user->entity_id);
        }

        if ($user->isRepairerStandardUser()) {
            return $this->where('repairer_id', $user->entity_id);
        }

        if ($user->isClient()) {
            return $this->where('client_id', $user->client_id);
            // return $this;
        }

        return $this->where('expert_firm_id', $user->entity_id);
        // return $this;
    }
}
