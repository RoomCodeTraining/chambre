<?php

namespace App\Http\Requests\Shock;

use App\Models\Assignment;
use App\Models\ShockPoint;
use App\Models\PaintType;
use App\Models\HourlyRate;
use App\Models\WorkforceType;
use App\Models\Supply;
use Illuminate\Foundation\Http\FormRequest;

class CreateShockRequest extends FormRequest
{
    public function prepareForValidation()
    {
        if($this->shocks){
            $shocks = [];
            foreach ($this->shocks as $shock) {
                $shock['shock_point_id'] = isset($shock['shock_point_id']) && $shock['shock_point_id'] ? ShockPoint::keyFromHashId($shock['shock_point_id']) : null;
                $shock['paint_type_id'] = isset($shock['paint_type_id']) && $shock['paint_type_id'] ? PaintType::keyFromHashId($shock['paint_type_id']) : null;
                $shock['hourly_rate_id'] = isset($shock['hourly_rate_id']) && $shock['hourly_rate_id'] ? HourlyRate::keyFromHashId($shock['hourly_rate_id']) : null;
                
                $shock_works = [];
                if (isset($shock['shock_works']) && is_array($shock['shock_works'])) {
                    foreach ($shock['shock_works'] as $shock_work) {
                        $shock_work['supply_id'] = isset($shock_work['supply_id']) && $shock_work['supply_id'] ? Supply::keyFromHashId($shock_work['supply_id']) : null;
                        $shock_works[] = $shock_work;
                    }
                }
                $shock['shock_works'] = $shock_works;

                $workforces = [];
                if (isset($shock['workforces']) && is_array($shock['workforces'])) {
                    foreach ($shock['workforces'] as $workforce) {
                        $workforce['workforce_type_id'] = isset($workforce['workforce_type_id']) && $workforce['workforce_type_id'] ? WorkforceType::keyFromHashId($workforce['workforce_type_id']) : null;
                        $workforces[] = $workforce;
                    }
                }
                $shock['workforces'] = $workforces;
                
                $shocks[] = $shock;
            }
        }
        $this->merge([
            'assignment_id' => $this->assignment_id ? Assignment::keyFromHashId($this->assignment_id) : null,
            'shocks' => $shocks ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'assignment_id' => 'required|exists:assignments,id',
            'shocks' => 'required|array',
            'shocks.*.shock_point_id' => 'required|exists:shock_points,id|unique:shocks,shock_point_id,NULL,id,assignment_id,' . $this->route('assignment'),
            'shocks.*.shock_works' => 'nullable|array',
            'shocks.*.shock_works.*.supply_id' => 'required|exists:supplies,id|unique:shock_works,supply_id,NULL,id,shock_id,' . $this->route('shock'),
            'shocks.*.shock_works.*.disassembly' => 'required|boolean',
            'shocks.*.shock_works.*.replacement' => 'required|boolean',
            'shocks.*.shock_works.*.repair' => 'required|boolean',
            'shocks.*.shock_works.*.paint' => 'required|boolean',
            'shocks.*.shock_works.*.control' => 'required|boolean',
            'shocks.*.shock_works.*.comment' => 'nullable|string',
            'shocks.*.shock_works.*.obsolescence_rate' => 'required|numeric',
            'shocks.*.shock_works.*.recovery_amount' => 'required|numeric',
            'shocks.*.shock_works.*.amount' => 'required|numeric',
            'shocks.*.shock_works.*.discount' => 'required|numeric',

            'shocks.*.paint_type_id' => 'nullable|exists:paint_types,id',
            'shocks.*.hourly_rate_id' => 'nullable|exists:hourly_rates,id',
            'shocks.*.with_tax' => 'nullable|boolean',

            'shocks.*.workforces' => 'nullable|array',
            'shocks.*.workforces.*.workforce_type_id' => 'required|exists:workforce_types,id|unique:workforces,workforce_type_id,NULL,id,shock_id,' . $this->route('shock'),
            'shocks.*.workforces.*.nb_hours' => 'required|numeric',
            'shocks.*.workforces.*.discount' => 'required|numeric',
            'shocks.*.workforces.*.all_paint' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'shocks.*.shock_point_id.unique' => 'Le point d\'impact est déjà utilisé pour cette affectation.',
            'shocks.*.shock_point_id.exists' => 'Le point d\'impact est invalide.',
            'shocks.*.shock_point_id.required' => 'Le point d\'impact est requis.',
        ];
    }
}
