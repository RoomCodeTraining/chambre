<?php

namespace App\Http\Requests\PaintingPrice;

use App\Models\HourlyRate;
use App\Models\PaintType;
use App\Models\NumberPaintElement;
use Illuminate\Foundation\Http\FormRequest;

class CreatePaintingPriceRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'hourly_rate_id' => $this->hourly_rate_id ? HourlyRate::keyFromHashId($this->hourly_rate_id) : null,
            'paint_type_id' => $this->paint_type_id ? PaintType::keyFromHashId($this->paint_type_id) : null,
            'number_paint_element_id' => $this->number_paint_element_id ? NumberPaintElement::keyFromHashId($this->number_paint_element_id) : null,
        ]);
    }
    public function rules(): array
    {
        return [
            'param_1' => 'required|numeric',
            'param_2' => 'required|numeric',
            'hourly_rate_id' => 'required|exists:hourly_rates,id',
            'paint_type_id' => 'required|exists:paint_types,id',
            'number_paint_element_id' => 'required|exists:number_paint_elements,id',
        ];
    }
}
