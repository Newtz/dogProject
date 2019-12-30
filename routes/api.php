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
	Route::get('post'			   		   , 'PostController@index'  );
	Route::post('post'			   		   , 'PostController@store'  );
	Route::get('post/{postId}'	   		   , 'PostController@show'   );
	Route::get('post/{postId}/edit'		   , 'PostController@edit'   );
	Route::post('post/update/{postId}'	   , 'PostController@update' );
	Route::post('post/delete/{postId}'	   , 'PostController@destroy');
});
