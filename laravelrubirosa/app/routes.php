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
	
	
	Route::get('/get_all_jaskes', ['as' => 'get_all_jaskes', 'uses' => 'PasienController@get_all_jaskes']);
	Route::get('/get_satu_jaskes/{id_jaskes}', ['as' => 'get_satu_jaskes/{id_jaskes}', 'uses' => 'PasienController@get_satu_jaskes']);
	
	Route::get('/get_all_kantor', ['as' => 'get_all_kantor', 'uses' => 'PasienController@get_all_kantor']);
	Route::get('/get_satu_kantor/{id_kantor}', ['as' => 'get_all_kantor.{id_kantor}', 'uses' => 'PasienController@get_satu_kantor']);
	
	Route::get('/get_ugd_terdekat/{long}/{lat}', ['as' => 'get_ugd_terdekat.{long}.{lat}', 'uses' => 'PasienController@get_ugd_terdekat']);
	
	
	Route::get('/get_all_review/{id_fasilitas}', ['as' => 'get_all_review.{id_fasilitas}', 'uses' => 'PasienController@get_all_review']);
	
	Route::get('/get_all_rekam/{id_pasien}', ['as' => 'get_all_rekam.{id_pasien}', 'uses' => 'PasienController@get_all_rekam_medis']);
	
	Route::get('/get_all_dokter_di/{id_fasilitas}', ['as' => 'get_all_dokter_di.{id_fasilitas}', 'uses' => 'JadwalDokterController@get_all_dokter_di_jakes']);
	
	Route::get('/get_antrian/{id_dokter}', ['as' => 'get_antrian.{id_dokter}', 'uses' => 'JadwalDokterController@get_antrian']);
	
	
	
	
	
});

//admin panel route sementara
Route::group(['prefix' => 'admingate'], function()
{
	
	Route::get('/', ['as' => '', 'uses' => 'ViewDokterController@view_index']);
	
	
	Route::get('/detail_pasien/{id_pasien}', ['as' => 'admingate.detail_pasien.{id_pasien}', 'uses' => 'ViewDokterController@view_detail_pasien']);
	Route::get('/form_pemeriksaan', ['uses' => 'ViewDokterController@view_form_pemeriksaan']);
	
	Route::post('/add_rekam', ['uses' => 'ViewDokterController@set_rekam_medis']);
	
	

});

//Route::get('adminpanel', function()
//{
//	return View::make('pages.admin.dashboard');
//});