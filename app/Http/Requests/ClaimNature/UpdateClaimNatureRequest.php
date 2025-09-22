<?php

namespace App\Http\Requests\ClaimNature;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClaimNatureRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('claim_natures', 'label')->ignore($this->label, 'label')],
            'description' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Le code est requis',
            'code.string' => 'Le code doit être une chaîne de caractères',
            'code.max' => 'Le code ne doit pas dépasser 255 caractères',
            'code.unique' => 'Le code existe déjà',
            'label.required' => 'Le libellé est requis',
            'label.string' => 'Le libellé doit être une chaîne de caractères',
            'label.max' => 'Le libellé ne doit pas dépasser 255 caractères',
            'label.unique' => 'Le libellé existe déjà',
            'description.string' => 'La description doit être une chaîne de caractères',
            'description.max' => 'La description ne doit pas dépasser 255 caractères',
        ];
    }
}
