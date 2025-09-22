<?php

namespace App\Http\Requests\PaintingPrice;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaintingPriceRequest extends FormRequest
{
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
