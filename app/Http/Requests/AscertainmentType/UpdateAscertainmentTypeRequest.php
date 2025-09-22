<?php

namespace App\Http\Requests\AscertainmentType;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAscertainmentTypeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => 'required|string|max:255|unique:ascertainment_types,label,' . $this->route('ascertainment_type'),
            'description' => 'nullable|string|max:255',
        ];
    }
}
