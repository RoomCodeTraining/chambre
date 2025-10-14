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
        $this->merge([
            'assignment_id' => $this->assignment_id ? Assignment::keyFromHashId($this->assignment_id) : null,
            'shocks.*.shock_point_id' => $this->shock_point_id ? ShockPoint::keyFromHashId($this->shock_point_id) : null,
            'shocks.*.paint_type_id' => $this->paint_type_id ? PaintType::keyFromHashId($this->paint_type_id) : null,
            'shocks.*.hourly_rate_id' => $this->hourly_rate_id ? HourlyRate::keyFromHashId($this->hourly_rate_id) : null,
            'shocks.*.workforces.*.workforce_type_id' => $this->workforce_type_id ? WorkforceType::keyFromHashId($this->workforce_type_id) : null,
            'shocks.*.shock_works.*.supply_id' => $this->supply_id ? Supply::keyFromHashId($this->supply_id) : null,
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
}
