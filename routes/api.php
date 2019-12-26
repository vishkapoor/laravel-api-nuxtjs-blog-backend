<?php

Route::post('/register', 'RegisterController@store');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::get('/user', 'UsersController@show');



