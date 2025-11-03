<?php

namespace App\Http\Requests\Receipt;

use App\Models\Assignment;
use App\Models\ReceiptType;
use Illuminate\Foundation\Http\FormRequest;

class CalculateReceiptRequest extends FormRequest
{
    public function prepareForValidation()
    {
        if(isset($this->receipts) && is_array($this->receipts)){
            $receipts = [];
            foreach ($this->receipts as $receipt) {
                $receipt['receipt_type_id'] = isset($receipt['receipt_type_id']) && $receipt['receipt_type_id'] ? ReceiptType::keyFromHashId($receipt['receipt_type_id']) : null;
                $receipts[] = $receipt;
            }
        }
        
        $this->merge([
            'assignment_id' => $this->assignment_id ? Assignment::keyFromHashId($this->assignment_id) : null,
            'receipts' => $receipts ?? null,
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
