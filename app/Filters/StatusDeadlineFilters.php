<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class StatusDeadlineFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
