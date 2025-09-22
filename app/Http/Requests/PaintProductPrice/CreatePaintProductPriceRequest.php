<?php

namespace App\Http\Requests\PaintProductPrice;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaintProductPriceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => ['required', 'numeric', 'min:0'],
            'paint_type_id' => ['required', 'exists:paint_types,id'],
            'number_paint_element_id' => ['required', 'exists:number_paint_elements,id'],
        ];
    }
}
