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

Route::get('/', 'TodoController@index');

Route::post('/posttodo','TodoController@store');

Route::get('/edittodo/{id}','TodoController@edit');

Route::get('/updatetodo/{id}','TodoController@update');

Route::get('/deletetodo/{id}','TodoController@destroy');

Route::get('/completedtodo/{id}','TodoController@completedTodo');