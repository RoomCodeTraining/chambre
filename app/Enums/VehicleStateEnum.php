<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum VehicleStateEnum: string
{
    use UsefulEnums;

    case NEW = 'new';
    case USED = 'used';
}
