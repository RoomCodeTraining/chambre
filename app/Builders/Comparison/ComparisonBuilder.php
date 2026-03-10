<?php

namespace App\Builders\Comparison;

use App\Enums\RoleEnum;
use App\Enums\StatusEnum;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class ComparisonBuilder extends Builder
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
            return $this->whereHas('assignment', function (Builder $query) use ($user) {
                $query->where('expert_firm_id', $user->entity_id);
            });
        }

        if ($user->isInsurerAdmin()) {
            return $this->whereHas('assignment', function (Builder $query) use ($user) {
                $query->where('insurer_id', $user->entity_id);
            });
        }

        if ($user->isInsurerStandardUser()) {
            return $this->whereHas('assignment', function (Builder $query) use ($user) {
                $query->where('insurer_id', $user->entity_id);
            });
        }

        if ($user->isRepairerAdmin()) {
            return $this->whereHas('assignment', function (Builder $query) use ($user) {
                $query->where('repairer_id', $user->entity_id);
            })->where('status_id', Status::where('code', StatusEnum::ACCEPTED)->first()->id);
        }

        if ($user->isRepairerStandardUser()) {
            return $this->whereHas('assignment', function (Builder $query) use ($user) {
                $query->where('repairer_id', $user->entity_id);
            })->where('status_id', Status::where('code', StatusEnum::ACCEPTED)->first()->id);
        }

        if ($user->isClient()) {
            return $this->whereHas('assignment', function (Builder $query) use ($user) {
                $query->where('client_id', $user->entity_id);
            });
        }

        return $this->whereHas('assignment', function (Builder $query) use ($user) {
            $query->where('expert_firm_id', $user->entity_id);
        });
    }
}
