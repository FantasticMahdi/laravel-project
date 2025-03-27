<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class CommonDiscounRequest extends FormRequest
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
            'title' => ['required','string','max:255'],
            'percentage' => ['required','numeric','max:100'],
            'discount_ceiling' => ['required','numeric','max:100000000'],
            'minimal_order_amount' => ['required','numeric','max:100000000'],
            'status' => ['required','numeric','in:0,1'],
            'start_date' => ['required','numeric'],
            'end_date' => ['required','numeric'],
        ];
    }
}
