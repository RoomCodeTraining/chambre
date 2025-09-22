<?php

namespace App\Http\Requests\DepreciationTable;

use Illuminate\Foundation\Http\FormRequest;

class CreateDepreciationTableRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'vehicle_genre_id' => 'required|exists:vehicle_genres,id',
            'vehicle_age_id' => 'required|exists:vehicle_ages,id',
            'value' => 'required|integer|min:0',
        ];
    }
}
