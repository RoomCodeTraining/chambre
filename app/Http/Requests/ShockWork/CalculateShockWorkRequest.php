<?php

namespace App\Http\Requests\ShockWork;

use Illuminate\Foundation\Http\FormRequest;

class CalculateShockWorkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'shock_id' => 'required|exists:shocks,id',
            'shock_works' => 'required|array',
            'shock_works.*.obsolescence_rate' => 'required|numeric',
            'shock_works.*.recovery_amount' => 'required|numeric',
            'shock_works.*.discount' => 'required|numeric|min:0|max:100',
            'shock_works.*.amount' => 'required|numeric',
        ];
    }
}
