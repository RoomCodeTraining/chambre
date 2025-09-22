<?php

namespace App\Http\Requests\WorkforceType;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkforceTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
