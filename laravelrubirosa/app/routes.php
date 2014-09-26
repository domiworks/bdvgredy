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



Route::get('/login', function()
{
	return View::make('pages.login');
});

//bagian depan website yang dilihat oleh tamu
Route::group(['prefix' => ''], function()
{
	Route::get('/install', ['as' => 'install', 'uses' => 'PreinstallController@install']);
});

//admin panel route sementara
Route::group(['prefix' => 'admingate'], function()
{


});

//Route::get('adminpanel', function()
//{
//	return View::make('pages.admin.dashboard');
//});