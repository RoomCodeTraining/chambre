<?php

namespace App\Http\Requests\Assignment;

use App\Models\Client;
use App\Models\Vehicle;
use App\Models\ExpertiseType;
use App\Models\AssignmentType;
use App\Enums\AssignmentTypeEnum;
use App\Models\AssignmentRequest;
use App\Models\DocumentTransmitted;
use App\Models\InsurerRelationship;
use App\Models\RepairerRelationship;
use Illuminate\Foundation\Http\FormRequest;

class ValidateWorkSheetByExpertAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'required_for_repairer_quote_validation' => 'required|boolean',
            
        ];
    }

    public function messages(): array
    {
        return [
            'required_for_repairer_quote_validation.required' => 'Le champ est requis.',
            'required_for_repairer_quote_validation.boolean' => 'Le champ doit être un boolean.',
        ];
    }
}
