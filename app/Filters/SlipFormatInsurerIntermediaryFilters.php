<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class SlipFormatInsurerIntermediaryFilters extends QueryFilters
{
    protected array $allowedFilters = ['insurer_id','intermediary_id'];

    protected array $columnSearch = [];
}
