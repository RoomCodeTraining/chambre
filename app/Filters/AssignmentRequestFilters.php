<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class AssignmentRequestFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['reference','claim_number','policy_number'];

    protected array $relationSearch = [
        'expertFirm' => ['name'],
        'vehicle' => ['license_plate'],
        'insurer' => ['name'],
        'additionalInsurer' => ['name'],
        'repairer' => ['name'],
        'client' => ['name'],
    ];
}
