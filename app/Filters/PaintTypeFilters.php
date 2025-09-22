<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class PaintTypeFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['label'];
}
