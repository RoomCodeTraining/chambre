<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ProductionFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
