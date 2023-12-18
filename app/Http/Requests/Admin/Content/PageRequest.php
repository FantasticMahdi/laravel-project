<?php

namespace App\Http\Requests\admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title' => 'required|max:500|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.٬ <>\/;&?؟ ]+$/u',
            'url' => 'required|max:500|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.٬ <>\/;\n\r& ]+$/u',
            'body' => 'required|max:500|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.٬ <>\/;\n\r& ]+$/u',
            'tags' => 'required|regex:/^[a-zA-Z0-9,.ا-ی۰-۹\\/ ]+$/u',
        ];
    }
}
