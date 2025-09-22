<?php

namespace App\Http\Requests\AscertainmentType;

use Illuminate\Foundation\Http\FormRequest;

class CreateAscertainmentTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:assignment_types,label',
            'description' => 'nullable|string',
        ];
    }
}
