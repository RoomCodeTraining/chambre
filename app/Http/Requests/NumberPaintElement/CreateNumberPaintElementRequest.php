<?php

namespace App\Http\Requests\NumberPaintElement;

use Illuminate\Foundation\Http\FormRequest;

class CreateNumberPaintElementRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:number_paint_elements,label',
            'description' => 'nullable|string',
            'value' => 'required|numeric|min:0',
        ];
    }
}
