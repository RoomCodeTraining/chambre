<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class InvoiceFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['invoices.reference'];

    protected array $relationSearch = [
        'assignment' => ['reference'],
    ];
}
