<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class OfficeFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
