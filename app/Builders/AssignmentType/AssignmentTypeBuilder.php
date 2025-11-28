<?php

namespace App\Builders\AssignmentType;

use App\Models\User;
use App\Enums\RoleEnum;
use App\Models\AssignmentType;
use App\Enums\AssignmentTypeEnum;
use Illuminate\Database\Eloquent\Builder;

class AssignmentTypeBuilder extends Builder
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

        if ($user->isInsurerAdmin()) {
            return $this->where(['id' => AssignmentType::where('code', AssignmentTypeEnum::INSURER->value)->first()->id]);
        }

        if ($user->isInsurerStandardUser()) {
            return $this->where(['id' => AssignmentType::where('code', AssignmentTypeEnum::INSURER->value)->first()->id]);
        }

        return $this;
    }
}