<?php

namespace App\Http\Requests\Color;

use Illuminate\Foundation\Http\FormRequest;

class CreateColorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:colors,label',
            'description' => 'nullable|string'
        ];
    }
}
