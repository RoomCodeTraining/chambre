<?php

namespace App\Http\Requests\VehicleGenre;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleGenreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'label' => ['required', 'string', 'max:255', Rule::unique('vehicle_genres', 'label')->ignore($this->label, 'label')],
            'description' => ['nullable', 'string'],
            'max_mileage_essence_per_year' => ['required', 'numeric'],
            'max_mileage_diesel_per_year' => ['required', 'numeric'],
        ];
    }
}
