<?php

namespace App\Http\Requests\EntityType;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEntityTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('entity_types', 'label')->ignore($this->label, 'label')],
            'description' => ['nullable', 'string'],
        ];
    }
}
