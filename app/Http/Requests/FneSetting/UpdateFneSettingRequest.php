<?php

namespace App\Http\Requests\FneSetting;

use App\Models\Entity;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFneSettingRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'entity_id' => $this->entity_id ? Entity::keyFromHashId($this->entity_id) : null,
        ]);
    }
    public function rules(): array
    {
        return [
            'point_sale' => 'required',
            'establishment' => 'required',
            'commercial_message' => 'nullable',
            'footer' => 'nullable',
            'token' => 'required',
            'entity_id' => 'required|exists:entities,id',
        ];
    }

    public function messages(): array
    {
        return [
            'point_sale.required' => 'Le point de vente est requis.',
            'establishment.required' => 'L\'établissement est requis.',
            'token.required' => 'Le token est requis.',
            'entity_id.required' => 'L\'entité est requise.',
            'entity_id.exists' => 'L\'entité n\'existe pas.',
        ];
    }
}
