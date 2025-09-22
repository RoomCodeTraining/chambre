<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class VehicleFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['license_plate'];
}
