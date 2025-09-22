<?php

namespace App\Http\Requests\User;

use App\Models\Office;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ResetUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            
        ];
    }
}
