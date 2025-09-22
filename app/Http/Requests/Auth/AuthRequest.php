<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
        // $currentRoute = $this->route()->getName();
        // return match ($currentRoute) {
        //     'auth.login' => $this->getLoginRules(),
        //     'auth.password.forgot' => $this->getForgotPasswordRules(),
        //     'auth.password.reset' => $this->getResetPasswordRules(),
        //     'auth.logout' => true,
        //     default => [],
        // };
    }

    private function getLoginRules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    private function getForgotPasswordRules(): array
    {
        return [
            'email' => 'required|email',
        ];
    }

    private function getResetPasswordRules(): array
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ];
    }
}
