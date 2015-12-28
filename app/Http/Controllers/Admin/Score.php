<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Score extends Controller
{
    public function setting(){
    	return view('admin.score.setting');
    }
}
