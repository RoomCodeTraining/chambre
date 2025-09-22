<?php

namespace App\Http\Requests\Assignment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRealizedAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'repairer_id' => 'nullable|exists:entities,id',
            'directed_by' => 'required|exists:users,id',
            'expertise_date' => 'nullable|date_format:Y-m-d',
            'expertise_place' => 'nullable|string',
            'point_noted' => 'nullable|string',
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
