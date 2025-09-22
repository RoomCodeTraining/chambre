<?php

namespace App\Http\Requests\ReceiptType;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReceiptTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('receipt_types', 'label')->ignore($this->label, 'label')],
            'description' => ['nullable', 'string'],
        ];
    }
}
