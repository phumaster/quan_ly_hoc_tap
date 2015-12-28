<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class addUser extends Request
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
            'email' => 'required|between:6,255|email|unique:users',
            'firstName' => 'required|between:3,255',
            'lastName' => 'required|between:3,255',
            'password' => 'required|between:6,60',
            'confPassword' => 'required|between:6,60|same:password',
            'birthday' => 'required|regex:/^([0-9]{2})\/([0-9]{1,2})\/([0-9]{2,4})/',
            'cmnd' => 'regex:/[0-9]/',
            'address' => 'max:255',
            'profile_picture' => 'image',
        ];
    }
}
