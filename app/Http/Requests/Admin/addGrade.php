<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class addGrade extends Request
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
            'grade_name' => 'required|between:2,50|unique:grades,grade_name',
            'grade_info' => 'required'
        ];
    }
}
