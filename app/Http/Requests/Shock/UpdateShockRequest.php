<?php

namespace App\Http\Requests\Shock;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShockRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'shock_point_id' => 'required|exists:shock_points,id|unique:shocks,shock_point_id,NULL,id,assignment_id,' . $this->route('assignment'),
        ];
    }
}
