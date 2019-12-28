<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api', 'namespace'=> 'API'], function(){
	

	Route::get('post'			 , 'PostController@index'  );
	Route::get('post/create'	 , 'PostController@create' );
	Route::post('post'			 , 'PostController@store'  );
	Route::get('post/{post}'	 , 'PostController@show'   );
	Route::get('post/{post}/edit', 'PostController@edit'   );
	Route::post('post/{post}'	 , 'PostController@update' );
	Route::post('post/{post}'	 , 'PostController@destroy');
	
	Route::post('details', 'UserController@details');
});
