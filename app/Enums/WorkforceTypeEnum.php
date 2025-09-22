<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum WorkforceTypeEnum: string
{
    use UsefulEnums;

    case PAINT = 'paint';
    case ELECTRICITY = 'electricity';
    case SADDLERY = 'saddlery';
    case METALWORKING = 'metalworking';
}
