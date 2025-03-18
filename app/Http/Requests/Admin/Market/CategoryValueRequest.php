<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValueRequest extends FormRequest
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
            'value' => ['required', 'string'],
            'price_increase' => ['required', 'string'],
            'product_id' => ['required', 'numeric','exists:products,id'],
            'type' => ['required', 'numeric','in:0,1'],
        ];
    }
}
