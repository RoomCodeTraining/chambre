<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class QuoteFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
