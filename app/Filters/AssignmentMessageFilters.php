<?php

namespace App\Filters;

use App\Models\Assignment;
use App\Models\Status;
use Essa\APIToolKit\Filters\QueryFilters;

class AssignmentMessageFilters extends QueryFilters
{
    protected array $allowedFilters = ['assignment_id', 'status_id'];

    protected array $columnSearch = [];
}
