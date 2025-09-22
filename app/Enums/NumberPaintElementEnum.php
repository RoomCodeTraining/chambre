<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum NumberPaintElementEnum: int
{
    use UsefulEnums;

    case ALL = 0;
    case ONE = 1;
    case TWO = 2;
    case THREE = 3;
}
