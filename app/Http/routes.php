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

Route::get('/', [

	'uses' => 'TodoController@index',
	'as' => 'todo'

]);

Route::get('/todo', [

	'uses' => 'TodoController@index',
	'as' => 'todo1'

]);

Route::post('/todo/create',[

	'uses' => 'TodoController@store',
	'as' => 'todo.create'

]);

Route::get('/todo/edit/{id}',[

	'uses' => 'TodoController@edit',
	'as' => 'todo.edit'
	
]);

Route::get('/todo/update/{id}',[

	'uses' => 'TodoController@update',
	'as' => 'todo.update'
	
]);

Route::get('/todo/delete',[

	'uses' => 'TodoController@destroy',
	'as' => 'todo.delete'
	
]);

Route::get('/todo/complete/{id}',[

	'uses' => 'TodoController@complete',
	'as' => 'todo.complete'
	
]);



// Route::post('/posttodo','TodoController@store');

// Route::get('/edittodo/{id}','TodoController@edit');

// Route::get('/updatetodo/{id}','TodoController@update');

// Route::get('/deletetodo/{id}','TodoController@destroy');

// Route::get('/completedtodo/{id}','TodoController@completedTodo');