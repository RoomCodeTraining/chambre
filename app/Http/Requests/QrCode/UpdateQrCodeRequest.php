<?php

namespace App\Http\Requests\QrCode;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateQrCodeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', Rule::unique('qr_codes', 'code')->ignore($this->code, 'code')],
        ];
    }
}
