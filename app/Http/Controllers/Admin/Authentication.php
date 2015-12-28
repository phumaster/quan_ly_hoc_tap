<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login;

class Authentication extends Controller
{
    public function getLogin(){
    	return view('admin.login');
    }

    public function postLogin(Login $request){
    	$resource = $request->only(['email','password']);
    	if(Auth::attempt($resource)){
    		return redirect('admin/score');
    	}
    	return view('admin.login');
    }

    public function logout(){
    	return Auth::logout() ? back() : redirect()->route('admin.login');
    }
}
