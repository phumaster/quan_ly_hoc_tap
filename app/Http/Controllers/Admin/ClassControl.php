<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\addClassRequest;

class ClassControl extends Controller
{
    public function getAdd() {
        $data['grades'] = \App\Grade::all();
        return view('admin.class.add', $data);
    }

    public function postAdd(addClassRequest $request){
        if(\App\ClassModel::create($request->except(['_token']))){
            return redirect()->route('add.class')->with(['msg' => 'Add class success!']);
        }
        return redirect()->route('add.class')->withErrors('Errors database!'); 
    }
}
