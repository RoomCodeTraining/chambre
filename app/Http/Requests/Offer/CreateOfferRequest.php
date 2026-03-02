<?php

namespace App\Http\Requests\Offer;

use App\Models\Comparison;
use App\Models\Entity;
use Illuminate\Foundation\Http\FormRequest;

class CreateOfferRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'comparison_id' => $this->comparison_id ? Comparison::keyFromHashId($this->comparison_id) : null,
            'repairer_id' => $this->repairer_id ? Entity::keyFromHashId($this->repairer_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'comparison_id' => ['required', 'exists:comparisons,id'],
            'repairer_id' => ['required', 'exists:entities,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'comparison_id.required' => 'La comparaison est requise.',
            'comparison_id.exists' => 'La comparaison n\'existe pas.',
            'repairer_id.required' => 'Le réparateur est requise.',
            'repairer_id.exists' => 'Le réparateur n\'existe pas.',
        ];
    }
}
