<?php

namespace App\Http\Requests\Receipt;

use App\Models\ReceiptType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReceiptRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'receipt_type_id' => $this->receipt_type_id ? ReceiptType::keyFromHashId($this->receipt_type_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'receipt_type_id' => ['required', 'exists:receipt_types,id'],
            'amount' => ['required', 'numeric'],
        ];
    }
}
