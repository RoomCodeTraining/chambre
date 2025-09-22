<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class PaymentFilters extends QueryFilters
{
    protected array $allowedFilters = [
        'assignment_id',
    ];

    protected array $columnSearch = ['payments.reference'];

    protected array $relationSearch = [
        'assignment' => ['reference'],
    ];
}
