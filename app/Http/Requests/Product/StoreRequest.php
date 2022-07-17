<?php

namespace App\Http\Requests\Product;

use App\Models\Product\Product;
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
            'price' => ['required', 'numeric'],
            'old_price' => ['nullable', 'numeric'],
            'availability' => ['required', 'string'],
            'quantity' => ['required', 'numeric'],
            'vendor_code' => ['string', 'nullable'],
            'category_id' => ['numeric', 'nullable'],
            'manufacturer_id' => ['numeric', 'nullable'],
            'preview' => ['string', 'nullable'],
            'status' => ['required', 'boolean']
        ];
    }

    protected function prepareForValidation()
    {
        $merge = [];
        $product = $this->request->get('product');

        $merge['name'] = $product['name'];
        $merge['vendor_code'] = $product['vendor_code'];
        $merge['price'] = $product['price'];
        $merge['old_price'] = $product['old_price'];
        $merge['quantity'] = $product['quantity'];
        $merge['availability'] = ($product['quantity'] > 0 && $product['status'] == "on")
            ? Product::AVAILABILITY_IN_STOCK
            : Product::AVAILABILITY_OUT_OF_STOCK;

        $merge['category_id'] = $product['category_id'] == "-1" ? null : $product['category_id'];
        $merge['manufacturer_id'] = $product['manufacturer_id'] == "-1" ? null : $product['manufacturer_id'];

        $merge['status'] = $product['status'] == "on" ? true : false;

        $this->merge($merge);
    }
}
