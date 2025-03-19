<?php

namespace App\Http\Requests\Admin\Market;

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
        if ($this->isMethod('post')){
            return [
                'receiver' => ['required','string'],
                'deliverer' => ['required','string'],
                'description' => ['required','string' ,'max:500'],
                'marketable_number' => ['required','numeric'],
            ];
        }
        else{
            return [
                'frozen_number' => ['required','numeric'],
                'sold_number' => ['required','numeric'],
                'marketable_number' => ['required','numeric'],
            ];
        }
    }
}
