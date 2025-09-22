<?php

namespace App\Http\Requests\Receipt;

use Illuminate\Foundation\Http\FormRequest;

class CreateReceiptRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'assignment_id' => 'required|exists:assignments,id',
            'receipts' => 'required|array',
            'receipts.*.receipt_type_id' => 'required|exists:receipt_types,id|unique:receipts,receipt_type_id,NULL,id,assignment_id,' . $this->route('assignment'),
            'receipts.*.amount' => 'required|numeric',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $assignmentId = $this->input('assignment_id');
            $receipts = $this->input('receipts', []);

            // Collect all receipt_type_ids from the request
            $receiptTypeIds = array_column($receipts, 'receipt_type_id');

            // Check for duplicates in the request itself
            if (count($receiptTypeIds) !== count(array_unique($receiptTypeIds))) {
                $validator->errors()->add('receipts', 'Vous ne pouvez pas ajouter deux quittances du même type pour le même dossier.');
                return;
            }

            // Check for existing receipts in DB for this assignment
            $existingReceiptTypeIds = \App\Models\Receipt::where('assignment_id', $assignmentId)
                ->whereIn('receipt_type_id', $receiptTypeIds)
                ->pluck('receipt_type_id')
                ->toArray();

            if (!empty($existingReceiptTypeIds)) {
                $validator->errors()->add('receipts', 'Une ou plusieurs quittances existent déjà pour ce dossier.');
            }
        });
    }
}
