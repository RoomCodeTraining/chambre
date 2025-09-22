<?php

namespace App\Http\Requests\GeneralState;

use Illuminate\Foundation\Http\FormRequest;

class CreateGeneralStateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:general_states,label',
            'description' => 'nullable|string',
        ];
    }
}
