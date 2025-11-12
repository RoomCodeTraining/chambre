<?php

namespace App\Builders\Assignment;

use App\Models\User;
use App\Models\Status;
use App\Enums\RoleEnum;
use App\Enums\StatusEnum;
use App\Models\AssignmentType;
use App\Enums\AssignmentTypeEnum;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Builder;

class AssignmentBuilder extends Builder
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
            return $this->where(['insurer_id' => $user->entity_id, 'assignment_type_id' => AssignmentType::where('code', AssignmentTypeEnum::INSURER->value)->first()->id]);
        }

        if ($user->isInsurerStandardUser()) {
            return $this->where(['insurer_id' => $user->entity_id, 'assignment_type_id' => AssignmentType::where('code', AssignmentTypeEnum::INSURER->value)->first()->id]);
        }

        if ($user->isRepairerAdmin()) {
            return $this->where('repairer_id', $user->entity_id)->whereNotIn('status_id', Status::whereIn('code', [StatusEnum::OPENED, StatusEnum::REALIZED])->pluck('id'));
        }

        if ($user->isRepairerStandardUser()) {
            return $this->where('repairer_id', $user->entity_id)->whereNotIn('status_id', Status::whereIn('code', [StatusEnum::OPENED, StatusEnum::REALIZED])->pluck('id'));
        }

        if ($user->isClient()) {
            return $this->where('client_id', $user->client_id);
        }

        return $this->where('expert_firm_id', $user->entity_id);
    }
}
