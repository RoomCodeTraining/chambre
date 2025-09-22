<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum PaymentMethodEnum: string
{
    use UsefulEnums;

    case WAVE = 'wave';
    case ORANGE_MONEY = 'orange_money';
    case MTN_MONEY = 'mtn_money';
    case MOOV_MONEY = 'moov_money';

}
