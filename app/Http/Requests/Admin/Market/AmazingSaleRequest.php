<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class AmazingSaleRequest extends FormRequest
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
            'product_id' => ['required', 'numeric','exists:products,id'],
            'percentage' => ['required','numeric','max:100'],
            'start_date' => ['required','numeric'],
            'end_date' => ['required','numeric'],
            'status' => ['required','numeric','in:0,1'],
        ];
    }
}
