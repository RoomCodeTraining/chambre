<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ClientFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['name','phone_1','phone_2','email'];
}
