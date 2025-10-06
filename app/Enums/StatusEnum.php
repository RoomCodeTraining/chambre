<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;
use App\Concerns\UsefulEnums;

enum StatusEnum: string
{
    use UsefulEnums;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case OPENED = 'opened';
    case REALIZED = 'realized';
    case PENDING_FOR_REPAIRER_INVOICE = 'pending_for_repairer_invoice';
    case PENDING_FOR_REPAIRER_INVOICE_VALIDATION = 'pending_for_repairer_invoice_validation';
    case IN_EDITING = 'in_editing';
    case EDITED = 'edited';
    case VALIDATED = 'validated';
    case PAID = 'paid';
    case CLOSED = 'closed';
    case CANCELLED = 'cancelled';
    case DELETED = 'deleted';
    case ARCHIVED = 'archived';
    case DRAFT = 'draft';
    case SUCCESS = 'success';
    case FAILED = 'failed';
}
