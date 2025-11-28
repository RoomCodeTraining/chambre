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
    case PENDING_FOR_REPAIRER_QUOTE = 'pending_for_repairer_quote';
    case PENDING_FOR_REPAIRER_QUOTE_VALIDATION = 'pending_for_repairer_quote_validation';
    case IN_EDITING = 'in_editing';
    case EDITED = 'edited';
    case PENDING_FOR_REPAIRER_VALIDATION = 'pending_for_repairer_validation';
    case PENDING_FOR_EXPERT_VALIDATION = 'pending_for_expert_validation';
    case VALIDATED = 'validated';
    case PAID = 'paid';
    case CLOSED = 'closed';
    case CANCELLED = 'cancelled';
    case DELETED = 'deleted';
    case ARCHIVED = 'archived';
    case DRAFT = 'draft';
    case CLASSIFIED_WITHOUT_FURTHER_ACTION = 'classified_without_further_action';
    case SUCCESS = 'success';
    case FAILED = 'failed';

    case PENDING = 'pending';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
}
