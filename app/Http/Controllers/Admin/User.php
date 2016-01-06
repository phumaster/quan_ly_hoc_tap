<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\addUser;


class User extends Controller
{
    public function getAdd(){
        $data['roles'] = \App\RoleModel::groupBy('roles.role_title')->get();
    	return view('admin.user.add',$data);
    }

    public function postAdd(addUser $request){
    	$resource = $request->except(['_token','confPassword','r', 'roles']);
        $role = strlen($request->get('roles')) == 0 ? 'user' : $request->get('roles');
    	$pw['password'] = bcrypt($request->input('password'));
    	$pw['avatar_url'] = "";
    	$pw['class_id'] = 1234567890;
    	$pw['grades_id'] = 16;
    	if($user = \App\User::create(array_merge($resource,$pw))){
            $id = $user->id;
            if($request->hasFile('profile_picture')){
                $image = $request->file('profile_picture');
                $fileName = date("Y-m-d_H-i-s")."-".$image->getClientOriginalName();
                $path = base_path()."/public/upload/avatars/".$id;
                mkdir($path);
                $image->move($path,$fileName);
                $user->update(['avatar_url' => "upload/avatars/".$id."/".$fileName]);
            }
            \App\RoleModel::create([
                'role_title' => $role,
                'role_except_url' => '',
                'users_id' => $id
            ]);
    		return "Create success!";
    	}
    	return "Cann't create user!";
    }

    public function listAll(){
    	$data['users'] = \App\User::paginate(10);
    	return view('admin.user.list', $data);
    }

    public function destroy(Request $request, $id) {
        if(count(\App\User::find($id)) == 0) {
            return $request->ajax() ? 'User does not exist!' : redirect()->route('list.user');
        }
        \App\User::destroy($id);
        return redirect()->route('list.user')->with(['msg' => 'Delete user success!']);
    }
}
