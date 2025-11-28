<?php

namespace App\Builders\Permission;

use App\Models\Role;
use App\Models\User;
use App\Enums\RoleEnum;
use App\Enums\PermissionEnum;
use Illuminate\Database\Eloquent\Builder;

class PermissionBuilder extends Builder
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
            // return $this->whereIn('name', [PermissionEnum::VIEW_USER->value, PermissionEnum::CREATE_USER->value, PermissionEnum::UPDATE_USER->value, PermissionEnum::DELETE_USER->value, PermissionEnum::ENABLE_USER->value, PermissionEnum::DISABLE_USER->value, PermissionEnum::RESET_USER->value, PermissionEnum::VIEW_ASSIGNMENT_REQUEST->value, PermissionEnum::CREATE_ASSIGNMENT_REQUEST->value, PermissionEnum::UPDATE_ASSIGNMENT_REQUEST->value, PermissionEnum::DELETE_ASSIGNMENT_REQUEST->value, PermissionEnum::ACCEPT_ASSIGNMENT_REQUEST->value, PermissionEnum::REJECT_ASSIGNMENT_REQUEST->value, PermissionEnum::CANCEL_ASSIGNMENT_REQUEST->value, PermissionEnum::VIEW_ASSIGNMENT->value, PermissionEnum::CREATE_ASSIGNMENT->value, PermissionEnum::UPDATE_ASSIGNMENT->value, PermissionEnum::REALIZE_ASSIGNMENT->value, PermissionEnum::UPDATE_REALIZED_ASSIGNMENT->value, PermissionEnum::CREATE_WORKSHEET_ASSIGNMENT->value, PermissionEnum::VALIDATE_WORK_SHEET_BY_EXPERT_ASSIGNMENT->value, PermissionEnum::UNVALIDATE_WORK_SHEET_BY_EXPERT_ASSIGNMENT->value, PermissionEnum::CREATE_QUOTE_ASSIGNMENT->value, PermissionEnum::VALIDATE_QUOTE_ASSIGNMENT->value, PermissionEnum::VALIDATE_QUOTE_WITH_CONDITION_ASSIGNMENT->value, PermissionEnum::UNVALIDATE_QUOTE_ASSIGNMENT->value, PermissionEnum::CANCEL_QUOTE_ASSIGNMENT->value, PermissionEnum::EDIT_ASSIGNMENT->value, PermissionEnum::UPDATE_EDITED_ASSIGNMENT->value, PermissionEnum::VALIDATE_ASSIGNMENT->value, PermissionEnum::UNVALIDATE_ASSIGNMENT->value]);
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
            return $this->where('repairer_id', $user->entity_id)->whereNotNull('realized_at');
        }

        if ($user->isRepairerStandardUser()) {
            return $this->where('repairer_id', $user->entity_id)->whereNotNull('realized_at');
        }

        if ($user->isClient()) {
            return $this->where('client_id', $user->client_id);
        }

        return $this;
    }
}
