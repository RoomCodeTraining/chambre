<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class RemarkFilters extends QueryFilters
{
    protected array $allowedFilters = ['type'];

    protected array $columnSearch = ['label'];
}
