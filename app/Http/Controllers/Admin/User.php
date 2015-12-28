<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\addUser;

class User extends Controller
{
    public function getAdd(){
    	return view('admin.user.add');
    }

    public function postAdd(addUser $request){
    	$resource = $request->except(['_token','confPassword','r']);
    	$image = $request->file('profile_picture');
    	$fileName = date("Y-m-d_H-i-s")."-".$image->getClientOriginalName();
    	$pw['password'] = bcrypt($request->input('password'));
    	$pw['avatar_url'] = "";
    	$pw['class_id'] = 1234567890;
    	$pw['grades_id'] = 16;
    	if($user = \App\User::create(array_merge($resource,$pw))){
    		$id = $user->id;
    		$path = base_path()."/public/upload/avatars/".$id;
    		mkdir($path);
    		$image->move($path,$fileName);
    		$user->update(['avatar_url' => "upload/avatars/".$id."/".$fileName]);
    		return "Create success!";
    	}
    	return "Cann't create user!";
    }

    public function listAll(){
    	$data['users'] = \App\User::paginate(10);
    	return view('admin.user.list', $data);
    }
}
