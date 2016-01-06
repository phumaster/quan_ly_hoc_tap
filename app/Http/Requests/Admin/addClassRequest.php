<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class addClassRequest extends Request
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
            'class_name' => 'required|between:3,255',
            'class_info' => 'required'
        ];
    }
}
