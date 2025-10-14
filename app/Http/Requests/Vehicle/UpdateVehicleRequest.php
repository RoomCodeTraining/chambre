<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Bodywork;
use App\Models\VehicleGenre;
use App\Models\VehicleEnergy;
use App\Models\Brand;
use App\Models\VehicleModel;
use App\Models\Color;

class UpdateVehicleRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'bodywork_id' => $this->bodywork_id ? Bodywork::keyFromHashId($this->bodywork_id) : null,
            'vehicle_genre_id' => $this->vehicle_genre_id ? VehicleGenre::keyFromHashId($this->vehicle_genre_id) : null,
            'vehicle_energy_id' => $this->vehicle_energy_id ? VehicleEnergy::keyFromHashId($this->vehicle_energy_id) : null,
            'brand_id' => $this->brand_id ? Brand::keyFromHashId($this->brand_id) : null,
            'vehicle_model_id' => $this->vehicle_model_id ? VehicleModel::keyFromHashId($this->vehicle_model_id) : null,
            'color_id' => $this->color_id ? Color::keyFromHashId($this->color_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'license_plate' => ['required', 'string', 'max:255', Rule::unique('vehicles', 'license_plate')->ignore($this->license_plate, 'license_plate')],
            'type' => 'nullable|string|max:255',
            'option' => 'nullable|string|max:255',
            'bodywork_id' => 'nullable|exists:bodyworks,id',
            'vehicle_genre_id' => 'nullable|exists:vehicle_genres,id',
            'vehicle_energy_id' => 'nullable|exists:vehicle_energies,id',
            'mileage' => 'nullable|numeric|min:0',
            'new_market_value' => 'nullable|integer|min:0',
            'serial_number' => 'nullable|string|max:255',
            'first_entry_into_circulation_date' => 'nullable|date_format:Y-m-d|before:tomorrow',
            'technical_visit_date' => 'nullable|date_format:Y-m-d|after_or_equal:first_entry_into_circulation_date',
            'fiscal_power' => 'nullable|integer',
            'nb_seats' => 'nullable|integer',
            'payload' => 'nullable|integer',
            'vehicle_model_id' => 'nullable|exists:vehicle_models,id',
            'color_id' => 'nullable|exists:colors,id',
        ];
    }

    public function messages(): array
    {
        return [
            'first_entry_into_circulation_date.date' => 'La date de première mise en circulation est invalide.',
            'first_entry_into_circulation_date.date_format' => 'L e format de la date de première mise en circulation est invalide',
            'first_entry_into_circulation_date.before' => 'La date de première mise en circulation doit être antérieure à demain.',
            'technical_visit_date.date' => 'La date de visite technique est invalide.',
            'technical_visit_date.date_format' => 'L e format de la date de visite technique est invalide',
            'technical_visit_date.after_or_equal' => 'La date de visite technique doit être postérieure ou égale à la date de première mise en circulation.',
        ];
    }
}
