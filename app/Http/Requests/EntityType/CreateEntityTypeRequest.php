<?php

namespace App\Http\Requests\EntityType;

use Illuminate\Foundation\Http\FormRequest;

class CreateEntityTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:entity_types,label',
            'description' => 'nullable|string'
        ];
    }
}
