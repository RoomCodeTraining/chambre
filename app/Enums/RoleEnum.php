<?php

namespace App\Enums;

use App\Concerns\UsefulEnums;

enum RoleEnum: string
{
    use UsefulEnums;

    case SYSTEM_ADMIN = 'system_admin';
    case ADMIN = 'admin';
    case EXPERT_ADMIN = 'expert_admin';
    case CEO = 'ceo';
    case EXPERT_MANAGER = 'expert_manager';
    case EXPERT = 'expert';
    case OPENER = 'opener';
    case EDITOR_MANAGER = 'editor_manager';
    case EDITOR = 'editor';
    case VALIDATOR = 'validator';
    case ACCOUNTANT_MANAGER = 'accountant_manager';
    case ACCOUNTANT = 'accountant';
    case BUSINESS_DEVELOPER = 'business_developer';
    case INSURER_ADMIN = 'insurer_admin';
    case INSURER_STANDARD_USER = 'insurer_standard_user';
    case REPAIRER_ADMIN = 'repairer_admin';
    case REPAIRER_STANDARD_USER = 'repairer_standard_user';
    case CLIENT = 'client';
    case UNASSIGNED = 'unassigned';
}
