<?php

namespace App\Http\Requests\ExpertiseType;

use Illuminate\Foundation\Http\FormRequest;

class CreateExpertiseTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:expertise_types,label',
            'description' => 'nullable|string',
        ];
    }
}
