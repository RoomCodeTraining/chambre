<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ObservationFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
