<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum PhotoTypeEnum: string
{
    use UsefulEnums;

    case BEFORE = 'before';
    case DURING = 'during';
    case AFTER = 'after';

}
