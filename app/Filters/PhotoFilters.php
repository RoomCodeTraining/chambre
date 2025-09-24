<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class PhotoFilters extends QueryFilters
{
    protected array $allowedFilters = ['assignment_id', 'photo_type_id', 'status_id'];

    protected array $columnSearch = ['name'];
}
