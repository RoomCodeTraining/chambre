<?php

namespace App\Http\Requests\AssignmentExpert;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssignmentExpertRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'expert_id' => 'required|exists:users,id',
            'date' => 'required|date_format:Y-m-d',
            'observation' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'date.date' => 'La date est invalide.',
            'date.date_format' => 'Le format de la date est invalide.',
        ];
    }
}
