<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class Login extends Request
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
            'email' => 'required|between:4,255',
            'password' => 'required|between:6,60'
        ];
    }

    public function messages(){
        return [];
    }
}
