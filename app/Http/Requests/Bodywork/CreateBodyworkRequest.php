<?php

namespace App\Http\Requests\Bodywork;

use Illuminate\Foundation\Http\FormRequest;

class CreateBodyworkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
