<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'price' => ['required', 'number'],
            'old_price' => ['nullable', 'number'],
            'availability' => ['required', 'string'],
            'quantity' => ['required', 'number'],
            'vendor_code' => ['string', 'nullable'],
            'category_id' => ['number', 'nullable'],
            'manufacturer_id' => ['number', 'nullable'],
            'preview' => ['string', 'nullable'],
            'status' => ['required', 'boolean']
        ];
    }
}
