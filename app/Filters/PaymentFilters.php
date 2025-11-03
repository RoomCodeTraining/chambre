<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class PaymentFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['payments.reference'];

    protected array $relationSearch = [
        'assignment' => ['reference'],
    ];
}
