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

class DeleteAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'deletion_reason' => 'nullable',
            
        ];
    }

    public function messages(): array
    {
        return [
            'deletion_reason.required' => 'Le motif de suppression est requis.',
        ];
    }
}
