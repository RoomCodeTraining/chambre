<?php

namespace App\Enums;

use App\Concerns\UsefulEnums;

enum Queue: string
{
    use UsefulEnums;

    case ORDERS = 'orders';
    case DEFAULT = 'default';
    case WEBHOOKS = 'webhooks';
    case PRODUCTIONS = 'productions';
    case NOTIFICATIONS = 'notifications';
    case STORAGE = 'storage';

}
