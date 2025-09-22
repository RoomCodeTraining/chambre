<?php

namespace App\Http\Requests\Workforce;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkforceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'shock_id' => 'required|exists:shocks,id',
            'hourly_rate_id' => 'required|exists:hourly_rates,id',
            'with_tax' => 'required|boolean',
            'paint_type_id' => 'required|exists:paint_types,id',
            'workforces' => 'required|array',
            'workforces.*.workforce_type_id' => 'required',
            // 'workforces.*.workforce_type_id' => 'required|exists:workforce_types,id|unique:workforce_types,id,NULL,id,workforce_id,' . $this->route('workforce'),
            'workforces.*.nb_hours' => 'required|numeric',
            'workforces.*.discount' => 'required|numeric|min:0|max:100',
            'workforces.*.all_paint' => 'nullable|boolean',
        ];
    }

    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //         $shockId = $this->input('workforce_id');
    //         $workforces = $this->input('workforces', []);

    //         // Collect all workforce_type_ids from the request
    //         $workforceTypeIds = array_column($workforces, 'workforce_type_id');

    //         // Check for duplicates in the request itself
    //         if (count($workforceTypeIds) !== count(array_unique($workforceTypeIds))) {
    //             $validator->errors()->add('workforces', 'Vous ne pouvez pas ajouter deux main-d\'œuvre du même type pour le même choc.');
    //             return;
    //         }

    //         // Check for existing workforce_types in DB for this shock
    //         $existingWorkforceTypeIds = \App\Models\Workforce::where('shock_id', $shockId)
    //             ->whereIn('workforce_type_id', $workforceTypeIds)
    //             ->pluck('workforce_type_id')
    //             ->toArray();

    //         if (!empty($existingWorkforceTypeIds)) {
    //             $validator->errors()->add('workforces', 'Une ou plusieurs main-d\'œuvres existent déjà pour ce choc.');
    //         }
    //     });
    // }
}
