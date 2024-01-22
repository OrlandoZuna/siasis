<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'guest'], function () {
      Route::get('/', 'WelcomeController@index');
      Route::get('login', function () {
        return view('login');
      })->name('login');
    });
    Route::get('inicio', 'WelcomeController@index')->name('admin.inicio');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout');



    Auth::routes();
    Route::group(["middleware" => 'auth'], function () {
      Route::get('/home', 'HomeController@index')->name('home');
        // Route::resource("users", "UserController"); ingresar.usuarios
          Route::get('ussiadsis','UserController@index')->name('admin.users')->middleware('permission:ingresar.usuarios');
          Route::post('ussiadsis','UserController@store')->name('admin.save.users');
          Route::get('destroy/{us}','UserController@status')->name('admin.users.destroy');
          //unidades
    });
    //Nuevos controladores publicos

    Route::get('/realprueba', 'HomeController@realprueba');
    Route::get('portalweb', 'WelcomeController@portal')->name('home.portalweb');
    Route::get('portalapp', 'WelcomeController@portalapp')->name('home.appweb');
    Route::get('downloadapk/{id}', 'WelcomeController@downloadapk')->name('home.dowload.apk');





