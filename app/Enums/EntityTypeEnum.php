<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum EntityTypeEnum: string
{
    use UsefulEnums;

    case MAIN_ORGANIZATION = 'main_organization';
    case ORGANIZATION = 'organization';
    case INSURER = 'insurer';
    case REPAIRER = 'repairer';
}
