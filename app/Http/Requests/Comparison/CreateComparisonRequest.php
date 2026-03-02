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
        ];
    }

    public function messages(): array
    {
        return [
            'assignment_id.required' => 'L\'affectation est requise.',
            'assignment_id.exists' => 'Le dossier n\'existe pas.',
        ];
    }
}
