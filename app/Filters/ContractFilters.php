<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ContractFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
