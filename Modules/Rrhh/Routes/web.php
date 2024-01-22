<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your rrhhlication. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

  Route::group(["middleware" => 'auth'], function () {
    Route::prefix('rrhh')->middleware('permission:subsistemarrhhpersonal.acceso')->group(function () {

      // Route::get('/meses', function () {
      //     return view('rrhh::scarrhh.vistasHojaCalculo.meses'); OpenModEditedP OpenModCreateP
      // });

      Route::get('/', 'RrhhController@index');
      Route::get('form_create', 'RrhhcontrolController@create')->name('rrhh.form_create')->middleware('permission:administracion.crearpersonal');
      Route::post('savepers', 'RrhhcontrolController@store')->name('rrhh.savepers');
      Route::get('form_edit/{id}', 'RrhhcontrolController@edit')->name('rrhh.form_edit')->middleware('permission:administracion.editpersonal');
      Route::put('putper/{id}', 'RrhhcontrolController@putper')->name('rrhh.putper');
      Route::get('personals', 'RrhhcontrolController@index')->name('rrhh.personals')->middleware('permission:administracion.personalrrhh');
      //personal
      Route::get('/personal', 'PersonalController@index')->name('rrhh.personal');
      Route::get('/darbaja', 'PersonalController@darbaja');
      Route::get('/nodarbaja', 'PersonalController@nodarbaja');
      Route::get('/searching', 'PersonalController@searchingpersonal')->name('rrhh.personalsearch');

      Route::get('/getpersonal/{id}', 'PersonalController@getpersonal')->name('rrhh.getpersonal');
      Route::post('/personalsav', 'PersonalController@store')->name('rrhh.personalstore');
//
      Route::post('/personalg', 'PersonalController@store1')->name('rrhh.personalstore1');
//
      Route::post('/uppersonal/{id}', 'PersonalController@update')->name('rrhh.personalupdate');

      //biometric
      Route::get('bioconect','BioController@index')->name('admin.biometricos.lista');
      Route::get('biometricos','BioController@indexbiometrico')->name('admin.biometricos.lis');
      Route::get('bioconect2','BioController@indexi')->name('biome.lis');

      Route::post('storebiometrico','BioController@store')->name('biometrico.save');
      Route::post('editbiometrico','BioController@updateb')->name('biometrico-Editar.save');
      Route::get('getBiometrico','BioController@getbiometrico');
      Route::get('deletebiometrico','BioController@deletebiometrico');
      Route::get('mostrarAsisBio','BioController@mostrarAsisB');

      Route::get('bioconectImport','BioController@ImportandoAsistenciasBiometrico');
      Route::get('bioconectDatosBiometrico','BioController@ImportandoDatosBiometricos');
      Route::get('bioconectUpdate','BioController@update');
      Route::get('mostrarAsistenciasBio','BioController@show');
      Route::get('pdftoimge','BioController@pdf')->name('rrhh.pdf');
      Route::post('pdforimg','BioController@pdftoimage')->name('rrhh.pdfimag');
      Route::get('bioconectDelete','BioController@delete');
      Route::get('bioconectAgregarUsuario','BioController@registrarUsuario');
      Route::get('paginaciondepermisos', 'BioController@indexrendera');
      Route::get('paginacionasistenciasbiometrico', 'BioController@rendertablaasistencias');
      Route::get('paginacionusersbiometrico', 'BioController@rendertablausuarios');



      ////////modals----vistas Asistencias de ventana Biometrico////////////////////////////////
      Route::get('openmodal', 'BioController@pruebamodal');
      Route::get('openmodal2', 'BioController@pruebamodal2');
      Route::get('paginacionpruebamodal', 'BioController@pruebamodalrender');
      Route::get('paginacionpruebamodal2', 'BioController@pruebamodal2render');
      Route::get('openmodal3', 'BioController@pruebamodal3');

      /////////////////////////////////////////////////////////

      //horario   ImportandoAsistenciasBiometrico
      Route::get('schedule','HorariosController@index')->name('admin.horarios.lista');
      Route::post('store','HorariosController@store')->name('admin.save.horario');
      Route::put('updatedata','HorariosController@update')->name('admin.update.horario');
      Route::get('getSchedule', 'HorariosController@getSchedule');
      Route::get('deleteShedules', 'HorariosController@deleteShedule');
      // fin horarios
      //grupo de trbajo/////
      Route::get('grupotrabajo','GrupoTrabajoController@index')->name('admin.grupotrabajo.lista');
      Route::post('grupoguardar','GrupoTrabajoController@store')->name('save.trabajo');
      Route::put('grupoactualizar','GrupoTrabajoController@update')->name('update.trabajo');
      Route::get('getgrupo','GrupoTrabajoController@getGrupo');
      Route::get('deletegrupo','GrupoTrabajoController@deleteGrupo');

      // tipo salidas permisos/////
      Route::get('tiposalida','TipoSalidaController@index')->name('admin.tiposalida.lista');
      Route::post('tiposalidaguardar','TipoSalidaController@store')->name('save.tiposalida');
      Route::put('tiposalidaactualizar','TipoSalidaController@update')->name('update.tiposalida');
      Route::get('gettiposalida','TipoSalidaController@gettiposalida');
      Route::get('deletetiposalida','TipoSalidaController@deletetiposalida');

      // tipo salidas permisos/////
      Route::get('tipocontrato','TipoContratoController@index')->name('admin.tipocontrato.lista');
      Route::post('tipocontratoguardar','TipoContratoController@store')->name('save.tipocontrato');
      Route::put('tipocontratoactualizar','TipoContratoController@update')->name('update.tipocontrato');
      Route::get('gettipocontrato','TipoContratoController@gettipocontrato');
      Route::get('deletetipocontrato','TipoContratoController@deletetipocontrato');

      //// designacion de grupo de trabajo////
      Route::get('designaciongrupo','DesignacionGrupoController@index')->name('admin.designaciongrupotrabajo.lista');
      Route::get('createdesignaciongrupo','DesignacionGrupoController@store');
      Route::get('getdesignaciongrupo','DesignacionGrupoController@getDeGrupo');
      Route::get('updatedesignaciongrupo','DesignacionGrupoController@update')->name('update.designaciontrabajo');
      Route::get('deletedesignaciongrupo','DesignacionGrupoController@deleteDeGrupo');
      Route::get('guardarengrupo','DesignacionGrupoController@designargrupodesdeindexpersonal');



      // inicio de hojas de calculo save.trabajo  update.trabajo
      //Route::get('/meses/create', 'HorariosController@create');

      //Route::get('hora', 'HorariosController@getHorario');

                //end hoarios
                // rutas calendario
      Route::get('Calendar/event/{mes}','ControllerCalendar@index_month');
      Route::get('Calendar/event','ControllerCalendar@index');
      ///////asitencia actual////////////////////////////////////////////////////////////////
      Route::get('AsisActual', 'AsistenciaActualController@index')->name('admin.asistenciaspositivos.lista');
      Route::get('paginaciondeasistenciasbiometrico', 'AsistenciaActualController@indexrender');
      //Route::get('tablaasistenciaapp', 'AsistenciaActualController@indexrenderapptable');
      Route::get('asistenciasPersonal', 'AsistenciaActualController@asistenciasporPersona');
      Route::get('updateAsistenciaAc', 'AsistenciaActualController@update')->name('editar.asistenciaactual');
      Route::get('mostrarasistencias', 'AsistenciaActualController@show');
      Route::get('getAsistenciaActual', 'AsistenciaActualController@getAsistenciaActual');
      Route::get('importarApp', 'AsistenciaActualController@importarasistenciasaplicacion');
      Route::get('importarBiom', 'AsistenciaActualController@importarasistenciasbiometrico');
      Route::get('deleteAsistencia', 'AsistenciaActualController@destroy');
      Route::get('diastrabajo', 'AsistenciaActualController@diastrabajo');
      Route::get('paginacionasistenciaspersonal', 'AsistenciaActualController@paginarasistenciaspersonales');


      //////////////////////////////////////////////////////

      /// eventosAsistencia////
      Route::get('eventoAsistencia','EventoAsisteciaController@index');
      Route::get('storeevento','EventoAsisteciaController@store');
      Route::get('mostrar','EventoAsisteciaController@show');
      Route::get('updateevento','EventoAsisteciaController@update');
      Route::post('editare','EventoAsisteciaController@edit');
      Route::get('getevento', 'EventoAsisteciaController@getEnvento');
      Route::get('deleteEvento', 'EventoAsisteciaController@deleteEvento');
      Route::get('eventossalida', 'EventoAsisteciaController@meses')->name('calculo.meses');
      Route::get('permisos', 'EventoAsisteciaController@permisoscalcular');

      ///////////////horarioPersonas///////
      Route::get('horariopersona','HorarioPersonaController@index');
      Route::get('desiganarh','HorarioPersonaController@create');
      Route::get('asistenciasDesignacion', 'HorarioPersonaController@designacionesPersonal');
      Route::get('mostrardesignaciones', 'HorarioPersonaController@showdesiganaciones');
      Route::get('getdesignaciones', 'HorarioPersonaController@getDesignaciones');
      Route::put('updateDesigancion', 'HorarioPersonaController@update')->name('editar.desigancionpersonal');
      Route::get('updateDes', 'HorarioPersonaController@updateDesignaciones');
      Route::get('deletedesignacion', 'HorarioPersonaController@delete');
      Route::get('createdesignacioPersonal', 'HorarioPersonaController@createDesignacionpersonal');
      Route::get('updateGeneral', 'HorarioPersonaController@updategeneral');
      Route::get('deleteteGeneral', 'HorarioPersonaController@deletetegeneral');

    //////////grupoHorarios/////////////////////////
      Route::get('grupohorario','GrupoHorarioController@index');
      Route::get('desiganarg','GrupoHorarioController@creategrupo');
      Route::get('mostrardesignacionesg','GrupoHorarioController@showgruposdesignados');
      Route::get('createdesignacioPersonalgrupo','GrupoHorarioController@createDesignacionpersonal');
      Route::get('getdesignacionesgrupo', 'GrupoHorarioController@getDesignaciones');
      Route::get('updateDesgpersonalgrupo', 'GrupoHorarioController@updateDesignacionesgrupopersonal');
      Route::get('updateGeneralgrupoverificacion', 'GrupoHorarioController@updategeneralverifi');
      Route::get('updateGeneralgrupo', 'GrupoHorarioController@updategeneral');
      Route::get('deleteteGeneralgrupo', 'GrupoHorarioController@deletetegeneral');
      Route::get('deletetedesignacionpersonalgrupo', 'GrupoHorarioController@delete');


      /////////////pdfs asistencias/////////////
      Route::get('pdf', 'PdfController@pdfprueba')->name('descargarPDF');
      Route::get('pdfautorizacion', 'PdfController@pdfevento')->name('descargarAutorizacionPDF');
      Route::get('pdfasistenciapersonal', 'PdfController@pdfpersonalasistencia')->name('descargarasistenciaPDF');
      Route::get('reportegrupo', 'PdfController@pdfgrupo')->name('pdfGrupo');
      Route::get('reportetc', 'PdfController@pdftc')->name('pdfTc');
      Route::get('Desp', 'PdfController@DesG')->name('Des');
      //////////permisos//////////
      Route::get('pdfpermisos', 'PdfController@pdfpersonalapermisos')->name('descargarpermisosPDF');
      Route::get('reporteps', 'PdfController@pdfps')->name('pdfps');


      /////////////////// excel///////////
      Route::get('exceldes', 'ExcelController@Exceldes')->name('descargarexcel');
      Route::get('ejemplodes', 'ExcelController@Ejemplodes')->name('descargarEjemplo');
      Route::post('importarasist', 'ExcelController@store')->name('admin.save.import');
      // Route::post('importass', 'ExcelController@importarAss')->name('admin.save.importass');
    });

  });


