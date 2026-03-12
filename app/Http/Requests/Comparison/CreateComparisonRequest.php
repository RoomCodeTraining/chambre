<?php

namespace App\Http\Requests\Comparison;

use App\Models\Assignment;
use Illuminate\Foundation\Http\FormRequest;

class CreateComparisonRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'assignment_id' => $this->assignment_id ? Assignment::keyFromHashId($this->assignment_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'assignment_id' => ['required', 'exists:assignments,id'],
            'starts_at' => ['required', 'date_format:Y-m-d H:i:s'],
            'ends_at' => ['required', 'date_format:Y-m-d H:i:s'],
        ];
    }

    public function messages(): array
    {
        return [
            'assignment_id.required' => 'L\'affectation est requise.',
            'assignment_id.exists' => 'Le dossier n\'existe pas.',
            'starts_at.required' => 'La date de début est requise.',
            'starts_at.date_format' => 'La date de début doit être au format YYYY-MM-DD HH:MM:SS.',
            'ends_at.required' => 'La date de fin est requise.',
            'ends_at.date_format' => 'La date de fin doit être au format YYYY-MM-DD HH:MM:SS.',
        ];
    }
}
