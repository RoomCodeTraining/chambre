<?php

namespace App\Http\Requests\VehicleGenre;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehicleGenreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => 'required|string|max:255|unique:vehicle_genres,code',
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
            'max_mileage_essence_per_year' => 'required|numeric',
            'max_mileage_diesel_per_year' => 'required|numeric',
        ];
    }
}
