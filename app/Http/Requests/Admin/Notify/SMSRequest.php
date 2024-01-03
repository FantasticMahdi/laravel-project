<?php

namespace App\Http\Requests\Admin\Notify;

use Illuminate\Foundation\Http\FormRequest;

class SMSRequest extends FormRequest
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
            'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.٬ ]+$/u',
            'status' => 'required|numeric|in:0,1',
            'body' => 'required|min:5|max:600|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.٬ <>\/;\n\r& ]+$/u',
            'published_at' => 'required|numeric',
        ];
    }
}
