<?php

namespace App\Http\Requests\Invoice;

use App\Models\Assignment;
use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'assignment_id' => $this->assignment_id ? Assignment::keyFromHashId($this->assignment_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            // 'assignment_id' => 'required|exists:assignments,id|unique:invoices,assignment_id',
            'assignment_id' => 'required|exists:assignments,id',
            'date' => 'required|date_format:Y-m-d',
            'object' => 'required|string',
            'type' => 'required|in:sale,credit_bill',
            'payment_method' => 'required|in:cash,bank_transfer,check,credit_card,other',
            'template' => 'required|in:B2C,B2B',
            'foreign_currency' => 'nullable|string',
            'foreign_currency_rate' => 'nullable|numeric|min:0|max:100',
            'discount' => 'nullable|numeric|min:0|max:100',
            'invoice_reference' => 'nullable|required_if:type,credit_bill|exists:invoices,reference|string',
            'address' => 'nullable|string',
            'taxpayer_account_number' => 'nullable|string|required_if:template,B2B',
        ];
    }

    public function messages(): array
    {
        return [
            'date.date' => 'La date est invalide.',
            'date.date_format' => 'Le format de la date est invalide.',
            'address.string' => 'L\'adresse est invalide.',
            'taxpayer_account_number.string' => 'Le numéro de compte contribuable est invalide.',
        ];
    }
}
