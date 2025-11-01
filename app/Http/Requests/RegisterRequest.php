<?php

namespace App\Http\Requests;

use App\Rules\UnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Get register user rules
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:100', Password::default()->min(12)->mixedCase()->numbers()->uncompromised()],
        ];
    }

    /**
     * Custom validation messages
     */
    public function messages(): array
    {
        return [
            'email.required' => 'L\'email est requis',
            'email.email' => 'L\'email doit être une adresse email valide',
            'first_name.required' => 'Le prénom est requis',
            'first_name.string' => 'Le prénom doit être une chaîne de caractères',
            'first_name.max' => 'Le prénom doit contenir au maximum 255 caractères',
            'last_name.required' => 'Le nom est requis',
            'last_name.string' => 'Le nom doit être une chaîne de caractères',
            'last_name.max' => 'Le nom doit contenir au maximum 255 caractères',
            'telephone.required' => 'Le téléphone est requis',
            'telephone.string' => 'Le téléphone doit être une chaîne de caractères',
            'telephone.max' => 'Le téléphone doit contenir au maximum 255 caractères',
            'password.required' => 'Le mot de passe est requis',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères',
            'password.confirmed' => 'Le mot de passe et la confirmation du mot de passe doivent être identiques',
            'password.max' => 'Le mot de passe doit contenir au maximum 100 caractères',
            'password.min' => 'Le mot de passe doit contenir au moins 12 caractères',
            'password.mixed_case' => 'Le mot de passe doit contenir au moins une lettre majuscule et une lettre minuscule',
            'password.numbers' => 'Le mot de passe doit contenir au moins un chiffre',
            'password.uncompromised' => 'Le mot de passe est trop simple',
            'password_confirmation.required' => 'La confirmation du mot de passe est requise',
            'password_confirmation.string' => 'La confirmation du mot de passe doit être une chaîne de caractères',
            'password_confirmation.confirmed' => 'La confirmation du mot de passe et le mot de passe doivent être identiques',
            'password_confirmation.max' => 'La confirmation du mot de passe doit contenir au maximum 100 caractères',
            'password_confirmation.min' => 'La confirmation du mot de passe doit contenir au moins 12 caractères',
            'password_confirmation.mixed_case' => 'La confirmation du mot de passe doit contenir au moins une lettre majuscule et une lettre minuscule',
            'password_confirmation.numbers' => 'La confirmation du mot de passe doit contenir au moins un chiffre',
            'password_confirmation.uncompromised' => 'La confirmation du mot de passe est trop simple',
        ];
    }
}
