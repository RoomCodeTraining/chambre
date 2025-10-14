<?php

namespace App\Http\Requests\DepreciationTable;

use App\Models\VehicleGenre;
use App\Models\VehicleAge;
use Illuminate\Foundation\Http\FormRequest;

class CreateDepreciationTableRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'vehicle_genre_id' => $this->vehicle_genre_id ? VehicleGenre::keyFromHashId($this->vehicle_genre_id) : null,
            'vehicle_age_id' => $this->vehicle_age_id ? VehicleAge::keyFromHashId($this->vehicle_age_id) : null,
        ]);
    }
    public function rules(): array
    {
        return [
            'vehicle_genre_id' => 'required|exists:vehicle_genres,id',
            'vehicle_age_id' => 'required|exists:vehicle_ages,id',
            'value' => 'required|integer|min:0',
        ];
    }
}
