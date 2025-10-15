<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum GeneralStateEnum: string
{
    use UsefulEnums;

    case VERY_GOOD = 'very_good';
    case GOOD = 'good';
    case NORMAL = 'normal';
    case BAD = 'bad';
}
