<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum HourlyRateEnum: string
{
    use UsefulEnums;

    case ONE = '1750';
    case TWO = '2600';
    case THREE = '3000';
    case FOUR = '4000';
    case FIVE = '4200';
    case SIX = '4500';
    case SEVEN = '6750';
    case EIGHT = '7700';
    case NINE = '8250';
    case TEN = '8800';
    case ELEVEN = '9350';
    case TWELVE = '9900';
    case THIRTEEN = '11000';
    case FOURTEEN = '12650';
    case FIFTEEN = '13200';
}
