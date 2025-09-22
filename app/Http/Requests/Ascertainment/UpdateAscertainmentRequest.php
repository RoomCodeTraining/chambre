<?php

namespace App\Http\Requests\Ascertainment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAscertainmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'ascertainment_type_id' => 'required|exists:ascertainment_types,id',
            'very_good' => 'required|boolean',
            'good' => 'required|boolean',
            'acceptable' => 'required|boolean',
            'less_good' => 'required|boolean',
            'bad' => 'required|boolean',
            'very_bad' => 'required|boolean',
            'comment' => 'required|string|max:255',
        ];
    }
}
