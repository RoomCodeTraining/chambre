<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum PaintTypeEnum: string
{
    use UsefulEnums;

    case ORDINARY = 'ordinary';
    case ACRYLIC = 'acrylic';
    case VERNISSED = 'vernissed';
    case NACRED = 'nacred';
}
