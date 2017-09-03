<?php

use Illuminate\Http\Request;

Route::post('freedom/auth/register', 'AuthController@register');
Route::post('freedom/auth/login', 'AuthController@login');
Route::post('freedom/auth/logout', 'AuthController@logout')->middleware('auth:api');
