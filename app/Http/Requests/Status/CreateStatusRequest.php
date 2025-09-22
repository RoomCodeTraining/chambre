<?php

namespace App\Http\Requests\Status;

use Illuminate\Foundation\Http\FormRequest;

class CreateStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'unique:statuses,code', 'max:255'],
            'label' => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255'],
        ];
    }
}
