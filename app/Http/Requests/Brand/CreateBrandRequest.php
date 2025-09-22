<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class CreateBrandRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
