<?php

namespace App\Http\Requests\QrCode;

use Illuminate\Foundation\Http\FormRequest;

class CreateQrCodeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', 'unique:qr_codes,code'],
        ];
    }
}
