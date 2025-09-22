<?php

namespace App\Http\Requests\NumberMonth;

use Illuminate\Foundation\Http\FormRequest;

class CreateNumberMonthRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => 'required|integer',
            'vehicle_genre_id' => 'required|exists:vehicle_genres,id',
            'vehicle_age_id' => 'required|exists:vehicle_ages,id',
        ];
    }
}
