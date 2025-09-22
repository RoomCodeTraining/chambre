<?php

namespace App\Http\Requests\TechnicalConclusion;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTechnicalConclusionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', 'unique:technical_conclusions,label'],
            'description' => ['nullable', 'string'],
        ];
    }
}
