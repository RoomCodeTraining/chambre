<?php

namespace App\Http\Requests\WorkFee;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkFeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'param_1' => 'required|numeric',
            'param_2' => 'required|numeric',
            'param_3' => 'required|numeric',
            'param_4' => 'required|numeric',
        ];
    }
}
