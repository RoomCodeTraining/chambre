<?php

namespace App\Http\Requests\PaintProductPrice;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePaintProductPriceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'value' => ['required', 'numeric', Rule::unique('paint_product_prices', 'value')->ignore($this->value, 'value')],
            'paint_type_id' => ['required', 'exists:paint_types,id'],
            'number_paint_element_id' => ['required', 'exists:number_paint_elements,id'],
        ];
    }
}
