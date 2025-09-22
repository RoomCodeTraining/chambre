<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum ReceiptTypeEnum: string
{
    use UsefulEnums;

    case WORK_FEE = 'work_fee';
    case DOCUMENT_FEE = 'document_fee';
    case PHOTO = 'photo';
}
