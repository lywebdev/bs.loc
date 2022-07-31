<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'seo_keywords' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],

            'status' => ['required', 'boolean'],
            'category_id' => ['numeric', 'nullable'],
        ];
    }

    protected function prepareForValidation()
    {
        $merge = [];
        $post = $this->request->get('post');

        $merge['title'] = $post['title'];
        $merge['content'] = $post['content'];
        $merge['seo_keywords'] = $post['seo_keywords'] ?? null;
        $merge['seo_description'] = $post['seo_description'] ?? null;

        $merge['status'] = $post['status'] == "on" ? true : false;
        $merge['category_id'] = $post['category_id'] == "-1" ? null : $post['category_id'];

        $this->merge($merge);
    }
}
