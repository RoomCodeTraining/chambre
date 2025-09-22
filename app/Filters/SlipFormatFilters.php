<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class SlipFormatFilters extends QueryFilters
{
    protected array $allowedFilters = ['insurer_id'];

    protected array $columnSearch = [];
}
