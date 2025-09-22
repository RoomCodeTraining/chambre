<?php

namespace App\Http\Requests\ShockPoint;

use Illuminate\Foundation\Http\FormRequest;

class CreateShockPointRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
