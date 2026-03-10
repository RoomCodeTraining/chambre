<?php

namespace App\Builders\Offer;

use App\Enums\RoleEnum;
use App\Enums\StatusEnum;
use App\Models\Assignment;
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
            return $this;
        }

        if ($user->isSuperAdmin()) {
            return $this;
        }

        if ($user->isAdmin()) {
            return $this;
        }

        if ($user->isAdminExpert()) {
            $assignmentIds = Assignment::where('expert_firm_id', $user->entity_id)->pluck('id');
            return $this->whereIn('offers.comparison.assignment_id', $assignmentIds)->where('offers.status_id', Status::where('code','!=', StatusEnum::DRAFT)->first()->id);
        }

        if ($user->isInsurerAdmin()) {
            $assignmentIds = Assignment::where('insurer_id', $user->entity_id)->pluck('id');
            return $this->whereIn('offers.comparison.assignment_id', $assignmentIds)->where('offers.status_id', Status::where('code','!=', StatusEnum::DRAFT)->first()->id);
        }

        if ($user->isInsurerStandardUser()) {
            $assignmentIds = Assignment::where('insurer_id', $user->entity_id)->pluck('id');
            return $this->whereIn('offers.comparison.assignment_id', $assignmentIds)->where('offers.status_id', Status::where('code','!=', StatusEnum::DRAFT)->first()->id);
        }

        if ($user->isRepairerAdmin()) {
            return $this->where('offers.repairer_id', $user->entity_id);
        }

        if ($user->isRepairerStandardUser()) {
            return $this->where('offers.repairer_id', $user->entity_id);
        }

        if ($user->isClient()) {
            return $this->where('offers.comparison.assignment.client_id', $user->entity_id)->where('offers.status_id', Status::where('code','!=', StatusEnum::DRAFT)->first()->id);
        }

        return $this->where('offers.comparison.assignment.expert_firm_id', $user->entity_id)->where('offers.status_id', Status::where('code','!=', StatusEnum::DRAFT)->first()->id);
    }
}
