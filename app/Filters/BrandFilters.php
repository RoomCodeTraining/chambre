<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class BrandFilters extends QueryFilters
{
    protected array $allowedFilters = ['code','label'];

    protected array $columnSearch = ['code','label'];
}
