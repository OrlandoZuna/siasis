<?php

use Illuminate\Http\Request;

  Route::group(['middleware' => 'cors'], function () {

    Route::get('personal/{ci}', 'RestController@personal');
    Route::get('personalexi/{ci}', 'RestController@personalexi');
    Route::get('personalpad/{ci}','RestController@personalpad');
    Route::get('restconvoint/{id}','RestController@convoint');//id detalles
    Route::get('interna','RestController@interna')->name('rrhh.service.conv.interna');
    Route::get('externa','RestController@externa');
    Route::get('allconv','RestController@allconv');
    ////super role that serves to control the other systems of siadsis///
    Route::get('yunarole/{ci}','RestController@yuna');

    Route::get('query','RestController@preguntas');
    Route::get('my_key/{id}','RestController@keyuser');
    //apis para asistencia
    /////////////apis del sistema de control de asitencia////////////////////////////////////////////////
    Route::get('/asistencia', 'AsistenciasController@index');
    Route::post('/asistencia', 'AsistenciasController@store');
    Route::get('hour', 'HorariosController@getHorario');
    Route::get('/personal', 'AsistenciasController@personalget');
  });
    //Route::get('asistenciasii', 'AsistenciasController@index');
    // Route::get('/asistencia', 'AsistenciasController@index');
    // Route::post('/asistencia', 'AsistenciasController@store');
    // Route::get('hour', 'HorariosController@getHorario'); 

