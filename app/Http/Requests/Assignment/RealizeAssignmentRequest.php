<?php

namespace App\Http\Requests\Assignment;

use App\Models\RepairerRelationship;
use Illuminate\Foundation\Http\FormRequest;

class RealizeAssignmentRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'repairer_relationship_id' => $this->repairer_relationship_id ? RepairerRelationship::keyFromHashId($this->repairer_relationship_id) : null,
        ]);
    }
    public function rules(): array
    {
        return [
            'expertise_date' => 'nullable|date_format:Y-m-d',
            'expertise_place' => 'nullable|string',
            'point_noted' => 'nullable|string',
            'directed_by' => 'required|exists:users,id',
            'repairer_relationship_id' => 'nullable|exists:repairer_relationships,id',
        ];
    }

    public function messages(): array
    {
        return [
            'expertise_date.date' => 'La date est invalide.',
            'expertise_date.date_format' => 'Le format de la date est invalide.',
        ];
    }
}
