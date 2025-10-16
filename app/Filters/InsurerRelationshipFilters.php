<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class InsurerRelationshipFilters extends QueryFilters
{
    protected array $allowedFilters = ['insurer_id', 'expert_firm_id', 'status_id'];

    protected array $columnSearch = [];
}
