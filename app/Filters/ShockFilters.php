<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ShockFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
