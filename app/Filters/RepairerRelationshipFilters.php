<?php

namespace App\Filters;

use App\Models\Entity;
use App\Models\Status;
use Essa\APIToolKit\Filters\QueryFilters;

class RepairerRelationshipFilters extends QueryFilters
{
    public function prepareForValidation()
    {
        $this->merge([
            'repairer_id' => $this->repairer_id ? Entity::keyFromHashId($this->repairer_id) : null,
            'expert_firm_id' => $this->expert_firm_id ? Entity::keyFromHashId($this->expert_firm_id) : null,
            'status_id' => $this->status_id ? Status::keyFromHashId($this->status_id) : null,
        ]);
    }
    protected array $allowedFilters = ['repairer_id', 'expert_firm_id', 'status_id'];

    protected array $columnSearch = [];
}
