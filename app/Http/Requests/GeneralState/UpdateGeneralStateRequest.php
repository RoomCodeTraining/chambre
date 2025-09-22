<?php

namespace App\Http\Requests\GeneralState;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGeneralStateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('general_states', 'label')->ignore($this->label, 'label')],
            'description' => ['nullable', 'string'],
        ];
    }
}
