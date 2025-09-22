<?php

namespace App\Http\Requests\PhotoType;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePhotoTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('photo_types', 'label')->ignore($this->label, 'label')],
            'description' => 'nullable|string|max:255',
        ];
    }
}
