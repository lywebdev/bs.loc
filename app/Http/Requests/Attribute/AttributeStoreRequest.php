<?php

namespace App\Http\Requests\Attribute;

use Illuminate\Foundation\Http\FormRequest;

class AttributeStoreRequest extends FormRequest
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
            'frontend_type' => ['required', 'string'],
        ];
    }

    protected function prepareForValidation()
    {
        $merge = [];
        $attribute = $this->request->get('attribute');

        $merge['name'] = $attribute['name'];
        $merge['frontend_type'] = $attribute['frontend_type'];

        $this->merge($merge);
    }
}
