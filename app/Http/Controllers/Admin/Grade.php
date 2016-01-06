<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\addGrade;

class Grade extends Controller
{
    public function getAdd() {
    	return view('admin.grade.add');
    }

    public function postAdd(addGrade $request){
    	if(\App\Grade::create($request->only(['grade_name','grade_info']))) {
    		return view('admin.grade.add')->with(['msg' => 'Add grade success!']);
    	}
    }
}
