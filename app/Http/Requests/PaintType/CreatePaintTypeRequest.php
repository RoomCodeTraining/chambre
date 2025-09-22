<?php

namespace App\Http\Requests\PaintType;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaintTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:paint_types,label',
            'description' => 'nullable|string',
        ];
    }
}
