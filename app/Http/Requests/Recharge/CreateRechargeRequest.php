<?php

namespace App\Http\Requests\Recharge;

use App\Models\PaymentMethod;
use Illuminate\Foundation\Http\FormRequest;

class CreateRechargeRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'payment_method_id' => $this->payment_method_id ? PaymentMethod::keyFromHashId($this->payment_method_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'amount' => 'required|numeric|min:5000',
            'user_first_name' => 'required|string|max:255',
            'user_last_name' => 'required|string|max:255',
            'user_phone_number' => 'required|string|max:255',
            'payment_method_id' => 'required|exists:payment_methods,id',
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => 'Le montant est requise.',
            'amount.numeric' => 'Le montant doit être un nombre.',
            'amount.min' => 'Le montant doit être supérieur à 5000.',
            'user_first_name.required' => 'Le prénom est requis.',
            'user_first_name.string' => 'Le prénom doit être une chaîne de caractères.',
            'user_first_name.max' => 'Le prénom doit contenir au maximum 255 caractères.',
            'user_last_name.required' => 'Le nom est requis.',
            'user_last_name.string' => 'Le nom doit être une chaîne de caractères.',
            'user_last_name.max' => 'Le nom doit contenir au maximum 255 caractères.',
            'user_phone_number.required' => 'Le numéro de téléphone est requis.',
            'user_phone_number.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'user_phone_number.max' => 'Le numéro de téléphone doit contenir au maximum 255 caractères.',
            'payment_method_id.required' => 'Le moyen de paiement est requis.',
            'payment_method_id.exists' => 'Le moyen de paiement n\'existe pas.',
        ];
    }
}
