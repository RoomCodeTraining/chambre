<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum ClaimNatureEnum: string
{
    use UsefulEnums;

    case ACCIDENT_COLLISION = 'accident_collision';
    case ICE_BREAK = 'ice_break';
    case VANDALISM = 'vandalism';
    case FIRE = 'fire';
    case PARTIAL_FIRE = 'partial_fire';
    case VEHICLE_STOLEN_FOUND = 'vehicle_stolen_found';
    case VEHICLE_STOLEN_NOT_FOUND = 'vehicle_stolen_not_found';
    case ATTEMPTED_THEFT = 'attempted_theft';
    case VEHICLE_THEFT = 'vehicle_theft';
    case FLOODING = 'flooding'; 
}
