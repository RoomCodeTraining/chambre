<?php

namespace App\Http\Requests\Receipt;

use App\Models\Assignment;
use App\Models\ReceiptType;
use Illuminate\Foundation\Http\FormRequest;

class CalculateReceiptRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'assignment_id' => $this->assignment_id ? Assignment::keyFromHashId($this->assignment_id) : null,
            'receipts.*.receipt_type_id' => $this->receipt_type_id ? ReceiptType::keyFromHashId($this->receipt_type_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'assignment_id' => 'required|exists:assignments,id',
            'receipts' => 'required|array',
            'receipts.*.receipt_type_id' => 'required|exists:receipt_types,id',
            'receipts.*.amount' => 'required|numeric',
        ];
    }
}
