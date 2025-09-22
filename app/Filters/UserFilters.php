<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;
use Essa\APIToolKit\Traits\DateFilter;

class UserFilters extends QueryFilters
{
    use DateFilter;

    protected array $allowedFilters = ['email', 'username'];

    protected array $allowedSorts = ['created_at'];

    protected array $columnSearch = ['username', 'email', 'last_name', 'first_name'];

}
