<?php

namespace App\Http\Requests\DepreciationTable;

use Illuminate\Foundation\Http\FormRequest;

class CreateTheoricalMarketValueRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'vehicle_genre_id' => 'required|exists:vehicle_genres,id',
            'vehicle_energy_id' => 'required|exists:vehicle_energies,id',
            'vehicle_new_value' => 'required|integer|min:0',
            'vehicle_mileage' => 'required|integer|min:0',
            'first_entry_into_circulation_date' => 'required|date_format:Y-m-d|before:tomorrow',
            'expertise_date' => 'required|date_format:Y-m-d|after:first_entry_into_circulation_date|before:tomorrow',
        ];
    }

    public function messages(): array
    {
        return [
            'first_entry_into_circulation_date.date' => 'La date est invalide.',
            'first_entry_into_circulation_date.date_format' => 'Le format de la date est invalide.',
            'expertise_date.date' => 'La date est invalide.',
            'expertise_date.date_format' => 'Le format de la date est invalide.',
        ];
    }
}
