<?php

namespace App\Http\Requests\Check;

use App\Models\Payment;
use App\Models\Bank;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCheckRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'payment_id' => $this->payment_id ? Payment::keyFromHashId($this->payment_id) : null,
            'bank_id' => $this->bank_id ? Bank::keyFromHashId($this->bank_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'payment_id' => 'required|exists:payments,id',
            'bank_id' => 'required|exists:banks,id',
            'date' => 'required|date_format:Y-m-d',
            'amount' => 'required|numeric',
            'photo' => 'required|file|mimes:png,jpg,jpeg,pdf|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'date.date' => 'La date est invalide.',
            'date.date_format' => 'Le format de la date est invalide.',
        ];
    }
}
