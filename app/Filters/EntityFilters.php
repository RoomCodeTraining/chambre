<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class EntityFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['name'];

    protected array $allowedSorts = ['created_at'];
}
