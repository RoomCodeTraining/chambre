<?php

namespace App\Http\Requests\Shock;

use App\Models\ShockPoint;
use Illuminate\Foundation\Http\FormRequest;

class UpdateShockRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'shock_point_id' => $this->shock_point_id ? ShockPoint::keyFromHashId($this->shock_point_id) : null,
        ]);
    }

    public function rules(): array
    {
        return [
            'shock_point_id' => 'required|exists:shock_points,id|unique:shocks,shock_point_id,NULL,id,assignment_id,' . $this->route('assignment'),
        ];
    }
}
