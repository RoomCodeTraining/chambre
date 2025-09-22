<?php

namespace App\Http\Requests\Receipt;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReceiptRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'receipt_type_id' => ['required', 'exists:receipt_types,id'],
            'amount' => ['required', 'numeric'],
        ];
    }
}
