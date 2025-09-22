<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class EntityFilters extends QueryFilters
{
    protected array $allowedFilters = ['entity_type_id'];

    protected array $columnSearch = ['name'];

    protected array $allowedSorts = ['created_at'];
}
