<?php

namespace App\Http\Requests\ClaimNature;

use Illuminate\Foundation\Http\FormRequest;

class CreateClaimNatureRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'max:255', 'unique:claim_natures,code'],
            'label' => ['required', 'string', 'max:255', 'unique:claim_natures,label'],
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
