<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class PhotoFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['name'];
}
