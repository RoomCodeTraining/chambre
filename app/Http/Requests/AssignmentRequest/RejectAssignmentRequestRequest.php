<?php

namespace App\Http\Requests\AssignmentRequest;

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

class RejectAssignmentRequestRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'rejection_reason' => 'nullable',
            
        ];
    }

    public function messages(): array
    {
        return [
            'rejection_reason.required' => 'Le motif de rejet est requis.',
        ];
    }
}
