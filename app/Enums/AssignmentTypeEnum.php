<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum AssignmentTypeEnum: string
{
    use UsefulEnums;

    case INSURER = 'insurer';
    case PARTICULAR = 'particular';
    case TAXI = 'taxi';
    case EVALUATION = 'evaluation';
    case AGAINST_EXPERTISE = 'contreexpertise';
}
