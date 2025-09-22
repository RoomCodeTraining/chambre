<?php

namespace App\Http\Requests\Remark;

use Illuminate\Foundation\Http\FormRequest;

class CreateRemarkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
