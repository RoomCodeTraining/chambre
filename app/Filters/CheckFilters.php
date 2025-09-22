<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class CheckFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
