<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'heimdall'], function(){
  Route::prefix('valhalla')->group(function () {
    Route::get('/', 'ValhallaController@index');
    Route::get('portal', 'PortadaController@index')->name('admin.valhalla.portal');
    Route::put('create', 'PortadaController@create')->name('admin.valhalla.portalsave');
    Route::put('store', 'PortadaController@store')->name('admin.valhala.putlogo');
    Route::get('publicar', 'PortadaController@show')->name('admin.valhala.publicar');
    Route::post('savepubli', 'PortadaController@edit')->name('admin.valh.savepubli');
  });
});
