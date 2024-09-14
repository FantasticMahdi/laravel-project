<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
            'first_name' => ['required','max:120','min:2','regex:/^[ا-یa-zA-Zء-ي ]+$/u'],
            'last_name' => ['required','max:120','min:2','regex:/^[ا-یa-zA-Zء-ي ]+$/u'],
            'mobile' => ['required','digits:11','unique:users'],
            'email' => ['required','email','unique:users'],
            'password' => ['required',Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised(),'confirmed'],
            'image' => ['nullable','image','mimes:png,jpg,jpeg,gif'],
            'activation' => ['required','numeric','in:0,1'],
        ];
    }
}
