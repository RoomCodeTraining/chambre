<?php

namespace App\Http\Requests\PhotoType;

use Illuminate\Foundation\Http\FormRequest;

class CreatePhotoTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:photo_types,label',
            'description' => 'nullable|string|max:255',
        ];
    }
}
