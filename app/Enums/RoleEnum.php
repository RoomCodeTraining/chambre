<?php

namespace App\Enums;

use App\Concerns\UsefulEnums;

enum RoleEnum: string
{
    use UsefulEnums;

    case SYSTEM_ADMIN = 'system_admin';
    case ADMIN = 'admin';
    case CEO = 'ceo';
    case EXPERT_MANAGER = 'expert_manager';
    case EXPERT = 'expert';
    case OPENER = 'opener';
    case EDITOR = 'editor';
    case VALIDATOR = 'validator';
    case ACCOUNTANT_MANAGER = 'accountant_manager';
    case ACCOUNTANT = 'accountant';
    case BUSINESS_DEVELOPER = 'business_developer';
    case INSURER_ADMIN = 'insurer_admin';
    case INSURER_STANDARD_USER = 'insurer_standard_user';
    case REPAIRER_ADMIN = 'repairer_admin';
    case REPAIRER_STANDARD_USER = 'repairer_standard_user';
    case UNASSIGNED = 'unassigned';

    // public static function freeFromOrganizationRestriction(): array
    // {
    //     return array_map(
    //         fn ($role) => $role->value,
    //         [self::SYSTEM_ADMIN, self::SYSTEM_SUPPORT, self::ADMIN, self::OPERATING_ADMIN]
    //     );
    // }

    // public static function mainOfficeRoles(): array
    // {
    //     return array_map(
    //         fn ($role) => $role->value,
    //         [self::OFFICE_ADMIN, self::OFFICE_ADMIN, self::STOCK_MANAGER, self::OFFICE_MANAGER, self::BROKER_MANAGER, self::FINANCE_MANAGER]
    //     );
    // }
}
