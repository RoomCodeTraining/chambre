<?php

namespace App\Http\Requests\Receipt;

use Illuminate\Foundation\Http\FormRequest;

class CalculateReceiptRequest extends FormRequest
{
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
