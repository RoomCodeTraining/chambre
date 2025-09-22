<?php

namespace App\Http\Requests\NumberPaintElement;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNumberPaintElementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('number_paint_elements', 'label')->ignore($this->label, 'label')],
            'description' => ['nullable', 'string'],
            'value' => ['required', 'numeric'],
        ];
    }
}
