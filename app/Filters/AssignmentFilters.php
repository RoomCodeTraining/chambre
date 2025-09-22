<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class AssignmentFilters extends QueryFilters
{
    protected array $allowedFilters = [
        'assignment_type_id',
        'expertise_type_id',
        'created_by',
        'edited_by',
        'directed_by',
        'realized_by',
        'validated_by',
        // 'opened_by',
        'status_id',
        'vehicle_id',
        'insurer_id',
        'repairer_id',
        'client_id',
        'claim_nature_id',
        'status_id',
    ];

    protected array $allowedIncludes = [
        'insurer', 
        'broker', 
        'repairer', 
        'client', 
        'vehicle', 
        'status', 
        'expertiseType', 
        'assignmentType', 
        'createdBy', 
        // 'openedBy',
        'directedBy',
        'realizedBy', 
        'editedBy', 
        'validatedBy', 
        'claimNature',
    ];


    protected array $columnSearch = [
        'reference','claim_number'
    ];

    protected array $relationSearch = [
        'vehicle' => ['license_plate'],
        'insurer' => ['name'],
        'broker' => ['name'],
        'repairer' => ['name'],
        'client' => ['name'],
    ];

    

}
