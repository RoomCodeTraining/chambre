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

class AddInformationToAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'damage_declared' => 'nullable',
            'mission_source' => 'nullable',
            'circumstance' => 'nullable',
            'shock_point_conformity' => 'nullable|boolean',
            'approximate_amount' => 'nullable|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'shock_point_conformity.boolean' => 'La conformité du point de choc doit être un boolean.',
            'approximate_amount.numeric' => 'Le montant approximatif doit être un nombre.',
        ];
    }
}
