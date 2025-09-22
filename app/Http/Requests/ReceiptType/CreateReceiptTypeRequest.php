<?php

namespace App\Http\Requests\ReceiptType;

use Illuminate\Foundation\Http\FormRequest;

class CreateReceiptTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:receipt_types,label',
            'description' => 'nullable|string',
        ];
    }
}
