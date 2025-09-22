<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum AssignmentReferencePrefixEnum: string
{
    use UsefulEnums;

    case INSURER = '';
    case PARTICULAR = 'PC';
    case TAXI = 'TA';
    case EVALUATION = 'EV';
    case AGAINST_EXPERTISE = 'CA';
}
