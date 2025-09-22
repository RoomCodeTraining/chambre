<?php

namespace App\Http\Requests\ShockWork;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateShockWorkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'supply_id' => 'required|exists:supplies,id|unique:shock_works,supply_id,NULL,id,shock_id,' . $this->route('shock'),
            'disassembly' => 'required|boolean',
            'replacement' => 'required|boolean',
            'repair' => 'required|boolean',
            'paint' => 'required|boolean',
            'obsolescence' => 'required|boolean',
            'control' => 'required|boolean',
            'comment' => 'nullable|string',
            'obsolescence_rate' => 'required|numeric',
            'recovery_amount' => 'required|numeric',
            'discount' => 'required|numeric|min:0|max:100',
            'amount' => 'required|numeric',
        ];
    }
}
