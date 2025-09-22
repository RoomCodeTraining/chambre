<?php

namespace App\Http\Requests\AppSetting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppSettingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ];
    }
}
