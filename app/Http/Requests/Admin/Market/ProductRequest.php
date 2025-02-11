<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->isMethod('post')) {
            return [
                'name' => ['required', 'string'],
                'introduction' => ['required', 'string', 'min:10', 'max:1000'],
                'image' => ['required','image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'weight' => ['required', 'integer', 'min:0', 'max:10000'],
                'length' => ['required', 'integer', 'min:0'],
                'width' => ['required', 'integer', 'min:0'],
                'height' => ['required', 'integer', 'min:0'],
                'price' => ['required', 'integer', 'min:0', 'regex:/^[0-9]+$/u'],
                'status' => ['required', 'numeric', 'in:0,1'],
                'marketable' => ['required', 'numeric', 'in:0,1'],
                'tags' => ['required', 'string'],
                'brand_id' => ['required', 'integer', 'exists:brands,id'],
                'category_id' => ['required', 'integer', 'exists:product_categories,id'],
                'published_at' => ['required', 'numeric'],
            ];
        } else {
            return [
                'name' => ['required', 'string'],
                'introduction' => ['required', 'string', 'min:10', 'max:1000'],
                'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'weight' => ['required', 'integer', 'min:0', 'max:10000'],
                'length' => ['required', 'integer', 'min:0'],
                'width' => ['required', 'integer', 'min:0'],
                'height' => ['required', 'integer', 'min:0'],
                'price' => ['required', 'integer', 'min:0', 'regex:/^[0-9]+$/u'],
                'status' => ['required', 'numeric', 'in:0,1'],
                'marketable' => ['required', 'numeric', 'in:0,1'],
                'tags' => ['required', 'string'],
                'brand_id' => ['required', 'integer', 'exists:brands,id'],
                'category_id' => ['required', 'integer', 'exists:product_categories,id'],
                'published_at' => ['required', 'numeric'],
            ];
        }
    }
}
