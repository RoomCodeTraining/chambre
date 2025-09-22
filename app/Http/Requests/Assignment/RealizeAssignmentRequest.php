<?php

namespace App\Http\Requests\Assignment;

use Illuminate\Foundation\Http\FormRequest;

class RealizeAssignmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'expertise_date' => 'nullable|date_format:Y-m-d',
            'expertise_place' => 'nullable|string',
            'point_noted' => 'nullable|string',
            'directed_by' => 'required|exists:users,id',
            'repairer_id' => 'nullable|exists:entities,id',
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
