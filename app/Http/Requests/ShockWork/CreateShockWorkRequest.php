<?php

namespace App\Http\Requests\ShockWork;

use Illuminate\Foundation\Http\FormRequest;

class CreateShockWorkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'paint_type_id' => 'required|exists:paint_types,id',
            'shock_id' => 'required|exists:shocks,id',
            'shock_works' => 'required|array',
            // 'shock_works.*.supply_id' => 'required|exists:supplies,id|unique:shock_works,supply_id,NULL,id,shock_id,' . $this->route('shock'),
            'shock_works.*.supply_id' => 'required',
            'shock_works.*.disassembly' => 'required|boolean',
            'shock_works.*.replacement' => 'required|boolean',
            'shock_works.*.repair' => 'required|boolean',
            'shock_works.*.paint' => 'required|boolean',
            'shock_works.*.obsolescence' => 'required|boolean',
            'shock_works.*.control' => 'required|boolean',
            'shock_works.*.comment' => 'nullable|string',
            'shock_works.*.obsolescence_rate' => 'required|numeric',
            'shock_works.*.recovery_amount' => 'required|numeric',
            'shock_works.*.discount' => 'required|numeric|min:0|max:100',
            'shock_works.*.amount' => 'required|numeric',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $shockId = $this->input('shock_id');
            $shockWorks = $this->input('shock_works', []);

            // Collect all supply_ids from the request
            $supplyIds = array_column($shockWorks, 'supply_id');

            // Check for duplicates in the request itself
            if (count($supplyIds) !== count(array_unique($supplyIds))) {
                $validator->errors()->add('shock_works', 'Vous ne pouvez pas ajouter deux fournitures du même type pour le même choc.');
                return;
            }

            // Check for existing shock_works in DB for this shock
            $existingSupplyIds = \App\Models\ShockWork::where('shock_id', $shockId)
                ->whereIn('supply_id', $supplyIds)
                ->pluck('supply_id')
                ->toArray();

            if (!empty($existingSupplyIds)) {
                $validator->errors()->add('shock_works', 'Une ou plusieurs fournitures existent déjà pour ce choc.');
            }
        });
    }
}
