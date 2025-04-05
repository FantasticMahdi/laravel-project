<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
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
            'user_id' => ['required_if:type,1', 'numeric', 'exists:users,id'],
            'code' => ['required', 'string', 'max:255', Rule::unique('coupons', 'code')->ignore($this->coupon->id)],
            'discount_ceiling' => ['required', 'numeric', 'max:10000000'],
            'start_date' => ['required', 'numeric'],
            'end_date' => ['required', 'numeric'],
            'amount' => [(request()->amount_type == 0) ? 'max:100' : '', 'required', 'numeric'],
            'amount_type' => ['required', 'numeric', 'in:0,1'],
            'type' => ['required', 'numeric', 'in:0,1'],
            'status' => ['required', 'numeric', 'in:1,0'],
        ];
    }
}
