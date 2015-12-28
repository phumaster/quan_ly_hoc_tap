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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function(){

	Route::get('/',[
		'as' => 'admin.login',
		'uses' => 'Admin\Authentication@getLogin'
	]);

	Route::post('/',[
		'uses' => 'Admin\Authentication@postLogin'
	]);

	Route::get('/logout',[
		'as' => 'admin.logout',
		'uses' => 'Admin\Authentication@logout'
	]);

	Route::get('/user/add',[
		'as' => 'add.user',
		'uses' => 'Admin\User@getAdd'
	]);

	Route::post('/user/add',[
		'uses' => 'Admin\User@postAdd'
	]);

	Route::get('/user/all',[
		'as' => 'list.user',
		'uses' => 'Admin\User@listAll'
	]);

	Route::get('/score',[
		'as' => 'score',
		'uses' => 'Admin\Score@setting'
	]);

	Route::get('/grades/add',[
		'as' => 'add.grade',
		'uses' => 'Admin\Grade@getAdd'
	]);

	Route::post('/grades/add',[
		'uses' => 'Admin\Grade@postAdd'
	]);

	Route::get('/class/add',[
		'as' => 'add.class',
		'uses' => 'Admin\ClassControl@getAdd'
	]);

	Route::post('/class/add',[
		'uses' => 'Admin\ClassControl@postAdd'
	]);
});