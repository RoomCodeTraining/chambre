<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class AssignmentFilters extends QueryFilters
{
    protected array $allowedFilters = [
        // 'assignment_type_id',
        // 'expertise_type_id',
        // 'created_by',
        // 'edited_by',
        // 'directed_by',
        // 'realized_by',
        // 'validated_by',
        // 'status_id',
        // 'vehicle_id',
        // 'insurer_id',
        // 'repairer_id',
        // 'client_id',
        // 'claim_nature_id',
        // 'work_sheet_established_by',
        // 'repairer_validation_by',
        // 'expert_validation_by',
        // 'cancelled_by',
        // 'closed_by',
        // 'deleted_by'
    ];

    protected array $allowedIncludes = [
        'insurer', 
        'broker', 
        'additionalInsurer',
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
        'additionalInsurer' => ['name'],
        'repairer' => ['name'],
        'client' => ['name'],
    ];

    

}
