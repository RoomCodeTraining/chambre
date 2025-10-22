<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class RepairerRelationshipFilters extends QueryFilters
{
    protected array $allowedFilters = ['repairer_id', 'expert_firm_id', 'status_id'];

    protected array $columnSearch = [];
}
