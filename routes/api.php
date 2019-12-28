<?php

Route::post('/register', 'RegisterController@store');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::get('/user', 'UsersController@show');


Route::group(['prefix' => 'topics'], function() {

	Route::get('/', 'TopicsController@index');
	Route::get('/{topic}', 'TopicsController@show');
	Route::patch('/{topic}', 'TopicsController@update')->middleware('auth:api');
	Route::delete('/{topic}', 'TopicsController@destroy')->middleware('auth:api');
	Route::post('/', 'TopicsController@store')->middleware('auth:api');

	Route::group(['prefix' => '/{topic}/posts'], function() {

		Route::get('/', 'PostsController@index');
		Route::get('/{post}', 'PostsController@show');
		Route::post('/', 'PostsController@store')->middleware('auth:api');
		Route::patch('/{post}', 'PostsController@update')->middleware('auth:api');
		Route::delete('/{post}', 'PostsController@destroy')->middleware('auth:api');

	});


});
