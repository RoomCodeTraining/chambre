<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class VehicleModelFilters extends QueryFilters
{
    protected array $allowedFilters = ['brand_id'];

    protected array $columnSearch = ['code','label'];
}
