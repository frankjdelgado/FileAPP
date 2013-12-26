<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'HomeController@showWelcome');
Route::any('/usuario','HomeController@hellofucker');

Route::get('/login','HomeController@login');
// Route::post('/authenticate','HomeController@authenticate');
Route::post('/authenticate', array(
		'uses' => 'HomeController@authenticate',
		'after' => 'count-access'
	));

// Filtro before se aplicara antes de ir a main
Route::get('/main', array(
	'uses' => 'HomeController@main',
	'before' => 'auth'
	));

Route::get('/logout',array(
	'uses' => 'HomeController@logout',
	'before' => 'auth'
	));

//Resource Controllers
// Indica que UserController es el controlador del recurso user de la bd
Route::resource('user','UserController');
Route::resource('file','FileController');