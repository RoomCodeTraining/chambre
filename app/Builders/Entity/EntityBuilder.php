<?php

namespace App\Builders\Entity;

use App\Models\User;
use App\Enums\RoleEnum;
use App\Models\EntityType;
use App\Enums\EntityTypeEnum;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class EntityBuilder extends Builder
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

    public function isRepairerAdmin(): bool
    {
        return $this->model->currentRole->name == RoleEnum::REPAIRER_ADMIN->value;
    }

    public function isInsurerStandardUser(): bool
    {
        return $this->model->currentRole->name == RoleEnum::INSURER_STANDARD_USER->value;
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
            $entityTypes = EntityType::whereIn('code', [EntityTypeEnum::ORGANIZATION->value, EntityTypeEnum::INSURER->value, EntityTypeEnum::REPAIRER->value])->pluck('id');
            return $this->whereIn('entity_type_id', $entityTypes);
        }

        if ($user->isInsurerStandardUser()) {
            return $this->where('entity_type_id', EntityType::firstWhere('code', EntityTypeEnum::INSURER)->id);
        }

        if ($user->isRepairerStandardUser()) {
            return $this->where('entity_type_id', EntityType::firstWhere('code', EntityTypeEnum::REPAIRER)->id);
        }

        if ($user->isClient()) {
            return $this;
        }

        return $this;
    }
}
