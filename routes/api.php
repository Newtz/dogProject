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

Route::group(['namespace'=> 'API'], function(){
    Route::post('login', 'APIController@login');
	Route::post('register', 'APIController@register');
	Route::post('password/email','ForgotPasswordController@sendResetLinkEmail');
	Route::post('password/reset','ResetPasswordController@reset');
});

Route::group(['middleware' => ['auth.jwt', 'cors'], 'namespace'=> 'API'], function(){
	Route::get('posts'			   		   , 'PostController@index'  );
	Route::post('post'			   		   , 'PostController@store'  );
	Route::get('posts/{postId}'	   		   , 'PostController@show'   );
	Route::post('posts/{postId}/like'	   , 'PostController@like'   );
	Route::post('posts/{postId}/dislike'   , 'PostController@dislike');
	Route::post('posts/update/{postId}'	   , 'PostController@update' );
	Route::post('posts/delete/{postId}'	   , 'PostController@destroy');
	Route::get('posts-users'	   	   , 'PostController@authUserPosts');

    Route::get('comments/{postId}'			   	   , 'CommentController@index'  );
	Route::post('comment'			   		       , 'CommentController@store'  );
	Route::get('comments/{commentId}'	   		   , 'CommentController@show'   );
	Route::post('comments/update/{commentId}'	   , 'CommentController@update' );
    Route::post('comments/delete/{commentId}'	   , 'CommentController@destroy');
    Route::post('comments/delete/all/{postId}'	   , 'CommentController@destroyAll');
});
