<?php

namespace App\Builders\OfferShock;

use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Builder;

class OfferShockBuilder extends Builder
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

        // if ($user->isSuperAdmin()) {
        //     return $this;
        // }

        // if ($user->isAdmin()) {
        //     return $this;
        // }

        // if ($user->isAdminExpert()) {
        //     return $this->where('offer_shocks.offer.comparison.assignment.expert_firm_id', $user->entity_id);
        // }

        // if ($user->isInsurerAdmin()) {
        //     return $this->where('offer_shocks.offer.comparison.assignment.insurer_id', $user->entity_id);
        // }

        // if ($user->isInsurerStandardUser()) {
        //     return $this->where('offer_shocks.offer.comparison.assignment.insurer_id', $user->entity_id);
        // }

        // if ($user->isRepairerAdmin()) {
        //     return $this->where('offer_shocks.offer.repairer_id', $user->entity_id);
        // }

        // if ($user->isRepairerStandardUser()) {
        //     return $this->where('offer_shocks.offer.repairer_id', $user->entity_id);
        // }

        // if ($user->isClient()) {
        //     return $this->where('offer_shocks.offer.comparison.assignment.client_id', $user->entity_id);
        // }

        // return $this->where('offer_shocks.offer.comparison.assignment.expert_firm_id', $user->entity_id);

        return $this;
    }
}
