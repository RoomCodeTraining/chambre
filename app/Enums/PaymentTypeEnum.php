<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum PaymentTypeEnum: string
{
    use UsefulEnums;

    case CASH = 'cash';
    case CHECK = 'check';
    case BANK_TRANSFER = 'bank_transfer';
    case MOBILE_MONEY = 'mobile_money';

}
