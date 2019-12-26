<?php

Route::post('/register', 'Auth\RegisterController@store');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/user', 'UsersController@show');


