<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum ExpertiseTypeEnum: string
{
    use UsefulEnums;

    case STANDARD = 'standard';
    case JUDICIAL = 'judicial';
    case AGAINST_EXPERTISE = 'against_expertise'; 
    case VEHICLE_VOL_NOT_FOUND = 'vehicle_vol_not_found';
    case VEHICLE_VOL_FOUND = 'vehicle_vol_found';
    case EVALUATION = 'evaluation';
    case RISK_DIVERSE = 'risk_diverse';
}

