<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class DocumentTransmittedFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['label'];
}
