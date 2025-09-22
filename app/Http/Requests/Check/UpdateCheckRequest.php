<?php

namespace App\Http\Requests\Check;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCheckRequest extends FormRequest
{
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
