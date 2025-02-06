<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
                'original_name' => ['required','string','max:120','min:2'],
                'persian_name' => ['required','string','max:120','min:2'],
                'logo' => ['required','image','mimes:jpeg,png,jpg,gif'],
                'status' => ['required','numeric','in:0,1'],
                'tags' => ['required'],
            ];
        } else {
            return [
                'original_name' => ['required','string','max:120','min:2'],
                'persian_name' => ['required','string','max:120','min:2'],
                'logo' => ['image','mimes:jpeg,png,jpg,gif'],
                'status' => ['required','numeric','in:0,1'],
                'tags' => ['required','string'],
            ];
        }
    }
}
