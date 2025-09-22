<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class DepreciationTableFilters extends QueryFilters
{
    protected array $allowedFilters = ['vehicle_genre_id','vehicle_age_id'];

    protected array $columnSearch = ['value'];
}
