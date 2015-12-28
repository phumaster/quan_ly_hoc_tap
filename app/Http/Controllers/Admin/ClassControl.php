<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ClassControl extends Controller
{
    public function getAdd() {
        $data['grades'] = \App\Grade::all();
        return view('admin.class.add', $data);
    }

    public function postAdd(){
        return "Post class";
    }
}
