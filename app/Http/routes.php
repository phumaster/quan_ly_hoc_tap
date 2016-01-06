<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Admin router */

Route::group(['prefix' => 'admin'], function(){

	/* login into admin */

	get('/',[
		'as' => 'admin.login',
		'uses' => 'Admin\Authentication@getLogin'
	]);

	post('/',[
		'uses' => 'Admin\Authentication@postLogin'
	]);

	/* logout */

	get('/logout',[
		'as' => 'admin.logout',
		'uses' => 'Admin\Authentication@logout'
	]);

	/* route user */

	get('/user',[
		'as' => 'list.user',
		'uses' => 'Admin\User@listAll'
	]);

	get('/user/add',[
		'as' => 'add.user',
		'uses' => 'Admin\User@getAdd'
	]);

	post('/user/add',[
		'uses' => 'Admin\User@postAdd'
	]);

	get('/user/del/{id}',[
		'as' => 'delete.user', 
		'uses' => 'Admin\User@destroy'
	])->where(['id' => '[0-9]+']);

	/* route score */

	get('/score',[
		'as' => 'score',
		'uses' => 'Admin\Score@setting'
	]);

	//

	/* route grade */

	get('/grades/add',[
		'as' => 'add.grade',
		'uses' => 'Admin\Grade@getAdd'
	]);

	post('/grades/add',[
		'uses' => 'Admin\Grade@postAdd'
	]);

	/* route class */

	get('/class/add',[
		'as' => 'add.class',
		'uses' => 'Admin\ClassControl@getAdd'
	]);

	post('/class/add',[
		'uses' => 'Admin\ClassControl@postAdd'
	]);
});

/* Index page */

Route::get('/', function () {
    return view('welcome');
});