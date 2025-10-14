<?php

namespace App\Http\Requests\PaintProductPrice;

use App\Models\PaintType;
use App\Models\NumberPaintElement;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePaintProductPriceRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'paint_type_id' => $this->paint_type_id ? PaintType::keyFromHashId($this->paint_type_id) : null,
            'number_paint_element_id' => $this->number_paint_element_id ? NumberPaintElement::keyFromHashId($this->number_paint_element_id) : null,
        ]);
    }
    
    public function rules(): array
    {
        return [
            'value' => ['required', 'numeric', Rule::unique('paint_product_prices', 'value')->ignore($this->value, 'value')],
            'paint_type_id' => ['required', 'exists:paint_types,id'],
            'number_paint_element_id' => ['required', 'exists:number_paint_elements,id'],
        ];
    }
}
