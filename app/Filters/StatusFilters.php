<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class StatusFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
