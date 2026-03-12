<?php

namespace App\Builders\Offer;

use App\Enums\RoleEnum;
use App\Enums\StatusEnum;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class OfferBuilder extends Builder
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
            return $this->where('offers.status_id', Status::where('code', '!=', StatusEnum::DRAFT)->first()->id);
        }

        if ($user->isSuperAdmin()) {
            return $this->where('offers.status_id', Status::where('code', '!=', StatusEnum::DRAFT)->first()->id);
        }

        if ($user->isAdmin()) {
            return $this->where('offers.status_id', Status::where('code', '!=', StatusEnum::DRAFT)->first()->id);
        }

        if ($user->isAdminExpert()) {
            return $this->whereHas('comparison.assignment', function (Builder $query) use ($user) {
                $query->where('expert_firm_id', $user->entity_id);
            })->where('offers.status_id', Status::where('code', '!=', StatusEnum::DRAFT)->first()->id);
        }

        if ($user->isInsurerAdmin()) {
            return $this->whereHas('comparison.assignment', function (Builder $query) use ($user) {
                $query->where('insurer_id', $user->entity_id);
            })->where('offers.status_id', Status::where('code', '!=', StatusEnum::DRAFT)->first()->id);
        }

        if ($user->isInsurerStandardUser()) {
            return $this->whereHas('comparison.assignment', function (Builder $query) use ($user) {
                $query->where('insurer_id', $user->entity_id);
            })->where('offers.status_id', Status::where('code', '!=', StatusEnum::DRAFT)->first()->id);
        }

        if ($user->isRepairerAdmin()) {
            return $this->where('offers.repairer_id', $user->entity_id);
        }

        if ($user->isRepairerStandardUser()) {
            return $this->where('offers.repairer_id', $user->entity_id);
        }

        if ($user->isClient()) {
            return $this->whereHas('comparison.assignment', function (Builder $query) use ($user) {
                $query->where('client_id', $user->entity_id);
            })->where('offers.status_id', Status::where('code', '!=', StatusEnum::DRAFT)->first()->id);
        }

        return $this->whereHas('comparison.assignment', function (Builder $query) use ($user) {
            $query->where('expert_firm_id', $user->entity_id);
        })->where('offers.status_id', Status::where('code', '!=', StatusEnum::DRAFT)->first()->id);
    }
}
