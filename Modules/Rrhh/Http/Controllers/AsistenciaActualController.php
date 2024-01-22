<?php

namespace Modules\Rrhh\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\ResponseFactory;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Rats\Zkteco\Lib\ZKTeco;
use \ZKLib\ZKLib;
use \ZKLib\User;
use App\Unidad;
use  Spatie\PdfToImage\Pdf;
use Modules\Rrhh\Entities\AsistenciaBiometrico;
use Modules\Rrhh\Entities\Asistencia;
use Modules\Rrhh\Entities\Biometrico;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\Horario;
use Modules\Rrhh\Entities\TipoSalida;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Modules\Rrhh\Entities\AssiteciaActual;
use Modules\Rrhh\Entities\EventoAsistecia;
use Modules\Rrhh\Entities\HorarioPersona;
use Modules\Rrhh\Entities\GrupoHorario;
use DB;

class AsistenciaActualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $s1=Horario::find(4);
        $s2=Horario::find(6);

        $horas= Carbon::now()->format( 'H:i:s');
        if($s2->work_day==1){
            dd($po,$s2->work_day);
        }

        $data1=Asistencia::paginate(8);
        $data = AsistenciaBiometrico::paginate(10);
        $id_persona = $request->idPer;
        $title="ASISTENCIAS DE: ";
        if ($request->ajax()) {
            return [
                'list_personal' => view('rrhh::scarrhh.AsistenciasActuales.paginaciones.pagination_dataapp')->with(compact('data1', 'data'))->render(),
                'next_page' => $data1->nextPageUrl()
              ];
        }
        else {
            return view('rrhh::scarrhh.AsistenciasActuales.index', compact('title', 'data1', 'id_persona', 'data'));
        }
        return view('rrhh::scarrhh.AsistenciasActuales.index', compact('title', 'data1', 'id_persona', 'data'));
    }
    function indexrender(Request $request)
    {
        if($request->ajax())
        {
            $data = AsistenciaBiometrico::paginate(10);
            return view('rrhh::scarrhh.AsistenciasActuales.paginaciones.pagination_data', compact('data'))->render();
        }
    }

    public function diastrabajo( Request $request)
    {
        $fecha1 = $request->fecha1;
        $fecha2 = $request->fecha2;
        $id_persona =$request->id_persona;
        //dd($id_persona, $fecha1, $fecha2);
        $valor = 0;
        $faltas = 0;
        $atrasos = 0;
        $abandonos = 0;
        $permisos = 0;

        $actuals = AssiteciaActual::where('id_persona', '=', $id_persona)->where('start', '>=', $fecha1)->where('end', '<=', $fecha2)->orderBy('start', 'asc')->get();
        //dd(count($actuals), $actuals);
        if (Count($actuals)>0) {

            foreach ($actuals as $actual){

                if ($actual->estado_a == "en hora" || $actual->estado_a == "atrasado" || $actual->estado_a == "salida" || $actual->estado_a == 'abandono' || $actual->estado_a == 'permiso'){
                    $valor = $valor + $actual->valor_asistencia;
                }
                if ($actual->estado_a == "atrasado"){
                    $atrasos = $atrasos + 1;
                }
                if ($actual->estado_a == "abandono"){
                    $abandonos = $abandonos + 1;
                }
                if ($actual->estado_a == "permiso"){
                    $permisos = $permisos + 1;
                }
                else{
                    if ($actual->estado_a == "falta"){
                        $faltas = $faltas + $actual->valor_asistencia;
                    }
                }

            }
            return response()->json([
                "resp"=>200,
                "diastrabajo"=>view("rrhh::scarrhh.AsistenciasActuales.modals.modal-render-dcalcular", compact('id_persona', 'valor', 'faltas', 'atrasos', 'abandonos', 'permisos'))->render()
            ]);
        }
        else{
            return response()->json([
                "resp"=>2050
            ]);
        }
    }

    public function asistenciasporPersona( request $request) {
        $hoursi=Horario::all();
        $id_persona = $request->idPer;
        $persona = Personal::find($id_persona);
        $fecha = Carbon::now()->format('Y-m');
        $actuals = [];
        $actualss=AssiteciaActual::where('id_persona', '=', $id_persona)->orderBy('start', 'asc')->orderBy('hora', 'asc')->paginate(15);
        $valor = 0;
        $faltas = 0;
        $atrasos = 0;
        $abandonos = 0;
        $permisos = 0;

        foreach ($actualss as $actual){
                if (Carbon::createFromDate($actual->start)->month == now()->month) {
                $actuals[]=$actual;
                if ($actual->estado_a == "en hora" || $actual->estado_a == "atrasado" || $actual->estado_a == "salida" || $actual->estado_a == 'abandono' || $actual->estado_a == 'permiso'){
                    $valor = $valor + $actual->valor_asistencia;
                }
                if ($actual->estado_a == "atrasado"){
                    $atrasos = $atrasos + 1;
                }
                if ($actual->estado_a == "abandono"){
                    $abandonos = $abandonos + 1;
                }
                if ($actual->estado_a == "permiso"){
                    $permisos = $permisos + 1;
                }
                else{
                    if ($actual->estado_a == "falta"){
                        $faltas = $faltas + $actual->valor_asistencia;
                    }
                }
            }
        }
        $fecha= Carbon::now()->format('Y-m-d');
        $title="ASISTENCIAS DE: ";
        return response()->json(view('rrhh::scarrhh.AsistenciasActuales.vistaAsistencias ',
            compact('title', 'fecha', 'hoursi', 'id_persona', 'actualss', 'valor', 'faltas', 'atrasos', 'abandonos', 'permisos', 'persona'))->render());
    }
    function paginarasistenciaspersonales(Request $request)
    {
        $actualss=AssiteciaActual::where('id_persona', '=', $request->id_persona)->orderBy('start')->orderBy('hora', 'asc')->paginate(15);
        if($request->ajax())
        {
            if (Count($actualss)>0) {
                return response()->json( [
                    'asistencias_personal'=> view('rrhh::scarrhh.AsistenciasActuales.vistaAsistenciasrender ', compact('actualss'))->render(),
                    'next_page' => $actualss->nextPageUrl(),
                    'resp' => 200
                ]);
            }
            else {
               return response()->json(['resp' => 250]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importarasistenciasaplicacion()
    {
        $asitenciasaplicacion = Asistencia::all();
        $color='#57d4cc';
        $nombre = "App Movil";
        $descripcion = "Contraseña";

        foreach ($asitenciasaplicacion as $aplicacion){
            $idPerso = Personal::where('id','=', $aplicacion->id_persona)->first();
            $idapp= GrupoHorario::where('persona_id','=',$aplicacion->id_persona)->where('horario_id', '=', $aplicacion->id_horario)->whereDate('start', '<=', $aplicacion->fecha)->whereDate('end', '>=', $aplicacion->fecha)->first();
            if ($idapp != null && $idPerso->ci == $aplicacion->ci_a) {
                $hour= Horario::find($aplicacion->id_horario);
                $permisosturno = EventoAsistecia::where('id_persona', '=', $aplicacion->id_persona)->where('start', '=', $aplicacion->fecha)->where('inicio_time', '<=', $hour->start_input)->where('fin_evento', '>=', $hour->end_time)->first();
                $permisosentrada = EventoAsistecia::where('id_persona', '=', $aplicacion->id_persona)->where('start', '=', $aplicacion->fecha)->where('inicio_time', '>=', $hour->start_time)->where('inicio_time', '<=', $hour->start_input)->where('fin_evento', '<', $hour->end_time)->first();
                $exisentradafal = AssiteciaActual::where('ci_a', '=', $aplicacion->ci_a)->where('id_horario','=', $hour->id)->where('turno_a','=', $aplicacion->turno_a)->where('tipo_a','=', 'entrada')
                ->where('hora','<=', $hour->end_input)->where('estado_a','=', 'falta')->where('start','=', $aplicacion->fecha)->first();
                $exisentrada = AssiteciaActual::where('ci_a', '=', $aplicacion->ci_a)->where('id_horario','=', $hour->id)->where('turno_a','=', $aplicacion->turno_a)->where('tipo_a','=', 'entrada')
                ->where('hora','<=', $hour->end_input)->where('estado_a','!=', 'falta')->where('start','=', $aplicacion->fecha)->first();
                $entradaAs = Asistencia::where('ci_a', '=', $aplicacion->ci_a)->where('fecha', '=', $aplicacion->fecha)->where('id_horario', '=', $hour->id)->where('tipo_a', '=', 'entrada')->first();
                $entrada = AsistenciaBiometrico::where('id_user_b', '=', $aplicacion->ci_a)->whereDate('timestamp', '=', $aplicacion->fecha)->whereTime('timestamp', '>=', $hour->start_time)->whereTime('timestamp', '<=', $hour->end_input)->first();

                if ($permisosturno == null) {
                    if ($aplicacion->tipo_a == "salida") {
                        if ($exisentrada != null || $entrada != null || $permisosentrada != null || $entradaAs != null) {

                            if ($aplicacion->estado_a == "en hora") {
                                $color='#51dbaa';
                            }
                            elseif ($aplicacion->estado_a == "atrasado") {
                             $color='#ced149';
                            }
                            elseif ($aplicacion->estado_a == "salida") {
                             //dd('sera color rojo');
                             $color ='#3c28b8';
                            }
                            $asis = AssiteciaActual::where('ci_a', '=', $aplicacion->ci_a)->where('turno_a','=', $aplicacion->turno_a)
                            ->where('tipo_a','=', $aplicacion->tipo_a)->where('start','=', $aplicacion->fecha)->first();
                            if ($asis == null){
                             $actual = new AssiteciaActual();

                             $actual->title = $aplicacion->turno_a.' '.$aplicacion->tipo_a;
                             $actual->nombre = $nombre;
                             $actual->ci_a = $aplicacion->ci_a;
                             $actual->id_horario = $aplicacion->id_horario;
                             $actual->id_persona = $aplicacion->id_persona;
                             $actual->descripcion = $descripcion;
                             $actual->start = $aplicacion->fecha;
                             $actual->end = $aplicacion->fecha;
                             $actual->hora = $aplicacion->hora;
                             $actual->turno_a = $aplicacion->turno_a;
                             $actual->tipo_a = $aplicacion->tipo_a;
                             $actual->estado_a = $aplicacion->estado_a;
                             $actual->valor_asistencia = ($idapp->work_day)/2;
                             $actual->color = $color;

                             $actual->save();
                            }
                        }
                        else{
                            $tipo_a = "salida";
                            $estado_a = "falta";
                            $hora = "00:00:00";
                            $color ='#cb0000';
                            $asisis = AssiteciaActual::where('ci_a', '=', $aplicacion->ci_a)->where('turno_a','=',$aplicacion->turno_a)->where('tipo_a','=', $aplicacion->tipo_a)->where('start','=', $aplicacion->fecha)->first();
                            if ($asisis == null) {
                                $actual = new AssiteciaActual();
                                $actual->title = $aplicacion->turno_a.' '.$aplicacion->tipo_a;
                                $actual->nombre = $nombre;
                                $actual->ci_a = $aplicacion->ci_a;
                                $actual->id_horario = $aplicacion->id_horario;
                                $actual->id_persona = $aplicacion->id_persona;
                                $actual->descripcion = "no tiqueo";
                                $actual->start = $aplicacion->fecha;
                                $actual->end = $aplicacion->fecha;
                                $actual->hora = $hora;
                                $actual->turno_a = $aplicacion->turno_a;
                                $actual->tipo_a = $tipo_a;
                                $actual->estado_a = $estado_a;
                                $actual->valor_asistencia = ($idapp->work_day)/2;
                                $actual->color = $color;

                                $actual->save();
                            }
                        }
                    }
                    else {
                        if ($aplicacion->estado_a == "en hora") {
                            $color='#51dbaa';
                        }
                        elseif ($aplicacion->estado_a == "atrasado") {
                         $color='#ced149';
                        }
                        elseif ($aplicacion->estado_a == "salida") {
                         $color ='#3c28b8';
                        }
                        $asis = AssiteciaActual::where('ci_a', '=', $aplicacion->ci_a)->where('turno_a','=', $aplicacion->turno_a)
                        ->where('tipo_a','=', $aplicacion->tipo_a)->where('start','=', $aplicacion->fecha)->first();
                        if ($asis == null){
                         $actual = new AssiteciaActual();

                         $actual->title = $aplicacion->turno_a.' '.$aplicacion->tipo_a;
                         $actual->nombre = $nombre;
                         $actual->ci_a = $aplicacion->ci_a;
                         $actual->id_horario = $aplicacion->id_horario;
                         $actual->id_persona = $aplicacion->id_persona;
                         $actual->descripcion = $descripcion;
                         $actual->start = $aplicacion->fecha;
                         $actual->end = $aplicacion->fecha;
                         $actual->hora = $aplicacion->hora;
                         $actual->turno_a = $aplicacion->turno_a;
                         $actual->tipo_a = $aplicacion->tipo_a;
                         $actual->estado_a = $aplicacion->estado_a;
                         $actual->valor_asistencia = ($idapp->work_day)/2;
                         $actual->color = $color;

                         $actual->save();
                        }
                    }
                }
            }
            else{
            }
        }
        return response()->json(["resp"=>200]);
    }

    public function importarasistenciasbiometrico()
    {
        $actual = AssiteciaActual::Where('nombre', '=', "biometrico")-> get();
        $actualbio=$actual->get(count($actual)-1);
        $horas= Carbon::now();
        $m = $horas->month;
        $semana = $horas->week;
        $date = "2021-5-14";
        $day  = new Carbon($date);
        $dayOfWeek = $day->format('w');
        $AsistenciasBiometricos=AsistenciaBiometrico::all();
        $color='#cb0000';
        $nombre="biometrico";
        $turno_a='defecto';
        $tipo_a='defecto';
        $estado_a='defecto';
        $horario_id = 0;
        $fechaactual= Carbon::now()->format('Y-m-d');
        $perhorario = DB::table('rrhh.personas')
            ->join('rrhh.grupo_horario', 'rrhh.grupo_horario.persona_id', '=', 'rrhh.personas.id')
            // ->where('rrhh.horario_persona.personal_id', '=', 1)
            ->get();
        $con = 0;
        $permisossalida = "";
        $permisosentrada= "";
        $permisosturno = "";
        foreach ($perhorario as $persona ){
            //dd($persona->start, $persona->end, $persona->ci);
            $cadena = array();
            $dif = Carbon::create($persona->start)->diffInDays(Carbon::create($persona->end));
            //dd(Count($asip), $persona);
            //dd($dif);
            for ($i=0; $i < $dif; $i++) {
                $aux = Carbon::create($persona->start)->addDay($i)->format('Y-m-d');
                $cadena [] = Carbon::create($persona->start)->addDay($i)->format('Y-m-d');
            }

            $asisap = Asistencia::where('ci_a', '=', $persona->ci)->whereDate('fecha', '>=', $persona->start)->whereDate('fecha', '<=', $persona->end)->get();
            $asisbi= AsistenciaBiometrico::where('id_user_b', '=', $persona->ci)->whereDate('timestamp', '>=', $persona->start)->whereDate('timestamp', '<=', $persona->end)->get();
            foreach ($cadena as $fech)  {
                $hour= Horario::find($persona->horario_id);
                $horario_id=$hour->id;
                $turno_a=$hour->name;
                $valor_asistencia= ($hour->work_day)/2;
                $idp=$persona->persona_id;
                if (Count($asisbi)>0 || Count($asisap)>0) {
                    //dd($cadena, $persona, $fech, $persona->start, $persona->end);
                    $hour= Horario::find($persona->horario_id);
                    $horario_id=$hour->id;
                    $turno_a=$hour->name;
                    $valor_asistencia= ($hour->work_day)/2;
                    $idp=$persona->persona_id;
                    $permisosturno = EventoAsistecia::where('id_persona', '=', $persona->persona_id)->where('start', '=', $fech)->where('inicio_time', '<=', $hour->start_input)->where('fin_evento', '>=', $hour->end_time)->get();
                    $permisosentrada = EventoAsistecia::where('id_persona', '=', $persona->persona_id)->where('start', '=', $fech)->where('inicio_time', '>=', $hour->start_time)->where('inicio_time', '<=', $hour->start_input)->where('fin_evento', '<', $hour->end_time)->get();
                    if (Count($permisosturno)>0 && $fech < $fechaactual) {
                        foreach ($permisosturno as $key => $turno) {
                            $fecha = Carbon::create($turno->start)->format('Y-m-d');
                            $hora = Carbon::create($turno->inicio_time)->format('H:i:s');
                            $hora1 = Carbon::create($turno->fin_evento)->format('H:i:s');
                             $salida = TipoSalida::find($turno->tiposalida_id);
                             $horario_id=$hour->id;
                             $hourComparar= Carbon:: create($hour->start_input);
                             $compAtraso=$hourComparar->addMinutes($hour->late_minutes)->format('H:i:s');
                             $tipo_a = "entrada";
                             if ($hora>=$hour->start_time && $hora <= $hour->end_input) {
                                $tipo_a = "entrada";
                                $estado_a="permiso";
                                $color = $turno->color;
                                $asis = AssiteciaActual::where('id_persona', '=', $turno->id_persona)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fecha)->first();

                                if ($asis == null && $turno_a !='defecto') {
                                    $actual = new AssiteciaActual();

                                    $actual->title = $turno_a.' '.$tipo_a;
                                    $actual->nombre = $turno->title;
                                    $actual->ci_a = $persona->ci;
                                    $actual->id_horario = $horario_id;
                                    $actual->id_persona = $idp;
                                    $actual->descripcion = $salida->nombre_tiposalida;
                                    $actual->start = $fecha;
                                    $actual->end = $fecha;
                                    $actual->hora = $hora;
                                    $actual->turno_a = $turno_a;
                                    $actual->tipo_a = $tipo_a;
                                    $actual->estado_a = $estado_a;
                                    $actual->valor_asistencia = $valor_asistencia;
                                    $actual->color = $color;

                                    $actual->save();
                                }
                            }
                            if ($hora1>=$hour->end_time && $hora1 <= $hour->end_output) {
                                    $valor_asistencia= ($hour->work_day)/2;
                                    $tipo_a = "salida";
                                    $estado_a="permiso";
                                    $color = $turno->color;

                                    $salida = TipoSalida::find($turno->tiposalida_id);

                                    $asis = AssiteciaActual::where('id_persona', '=', $turno->id_persona)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fecha)->first();

                                    if ($asis == null && $turno_a !='defecto') {
                                        $actual = new AssiteciaActual();

                                        $actual->title = $turno_a.' '.$tipo_a;
                                        $actual->nombre = $turno->title;
                                        $actual->ci_a = $persona->ci;
                                        $actual->id_horario = $horario_id;
                                        $actual->id_persona = $idp;
                                        $actual->descripcion = $salida->nombre_tiposalida;
                                        $actual->start = $fecha;
                                        $actual->end = $fecha;
                                        $actual->hora = $hora1;
                                        $actual->turno_a = $turno_a;
                                        $actual->tipo_a = $tipo_a;
                                        $actual->estado_a = $estado_a;
                                        $actual->valor_asistencia = $valor_asistencia;
                                        $actual->color = $color;

                                        $actual->save();
                                    }
                            }
                        }
                    }
                    $entrada = AsistenciaBiometrico::where('id_user_b', '=', $persona->ci)->whereDate('timestamp', '=', $fech)->whereTime('timestamp', '>=', $hour->start_time)->whereTime('timestamp', '<=', $hour->end_input)->get();
                    if (Count($entrada)>0 && $fech < $fechaactual) {
                        foreach ($entrada as $biometrico){
                            $fecha = Carbon::create($biometrico->timestamp)->format('Y-m-d');
                            $hora = Carbon::create($biometrico->timestamp)->format('H:i:s');

                             $horario_id=$hour->id;
                             $hourComparar= Carbon:: create($hour->start_input);
                             $compAtraso=$hourComparar->addMinutes($hour->late_minutes)->format('H:i:s');
                             $tipo_a = "entrada";

                             if ($hora>=$hour->start_time && $hora <= $hour->end_time) {
                                $tipo_a = "entrada";

                                if ($hora>=$hour->start_time && $hora <= $compAtraso) {
                                    $estado_a="en hora";
                                    $color='#51dbaa';
                                }
                                if ($hora > $compAtraso && $hora<=$hour->end_input) {
                                    $estado_a="atrasado";
                                    $color='#ced149';
                                }
                            }
                            $asis = AssiteciaActual::where('ci_a', '=', $biometrico->id_user_b)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fecha)->first();

                            if ($asis == null && $turno_a !='defecto') {
                                $actual = new AssiteciaActual();

                                $actual->title = $turno_a.' '.$tipo_a;
                                $actual->nombre = $nombre;
                                $actual->ci_a = $biometrico->id_user_b;
                                $actual->id_horario = $horario_id;
                                $actual->id_persona = $idp;
                                $actual->descripcion = $biometrico->state;
                                $actual->start = $fecha;
                                $actual->end = $fecha;
                                $actual->hora = $hora;
                                $actual->turno_a = $turno_a;
                                $actual->tipo_a = $tipo_a;
                                $actual->estado_a = $estado_a;
                                $actual->valor_asistencia = $valor_asistencia;
                                $actual->color = $color;

                                $actual->save();
                            }
                        }
                    }
                    elseif (Count($entrada)==0 && Count($permisosentrada)>0 && $fech < $fechaactual) {
                        foreach ($permisosentrada as $perentrada){
                            //dd($biometrico);
                            $fecha = Carbon::create($perentrada->start)->format('Y-m-d');
                            $hora = Carbon::create($hour->start_input)->format('H:i:s');

                             $salidas = TipoSalida::find($perentrada->tiposalida_id);

                             if ($hora>=$hour->start_time && $hora <= $hour->end_time && $persona->horario_id == $perentrada->id_horario) {
                                $tipo_a = "entrada";
                                $estado_a="permiso";
                                $color = $perentrada->color;
                            }
                            $asis = AssiteciaActual::where('id_persona', '=', $perentrada->id_persona)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fecha)->first();

                            if ($asis == null && $turno_a !='defecto' && $persona->horario_id == $perentrada->id_horario) {
                                $actual = new AssiteciaActual();

                                $actual->title = $turno_a.' '.$tipo_a;
                                $actual->nombre = $perentrada->title;
                                $actual->ci_a = $persona->ci;
                                $actual->id_horario = $hour->id;
                                $actual->id_persona = $idp;
                                $actual->descripcion = $salidas->nombre_tiposalida;
                                $actual->start = $fecha;
                                $actual->end = $fecha;
                                $actual->hora = $hora;
                                $actual->turno_a = $turno_a;
                                $actual->tipo_a = $tipo_a;
                                $actual->estado_a = $estado_a;
                                $actual->valor_asistencia = $valor_asistencia;
                                $actual->color = $color;

                                $actual->save();
                            }
                            else{
                                // $entrada = AsistenciaBiometrico::where('id_user_b', '=', $persona->ci)->whereDate('timestamp', '=', $fech)
                                //     ->whereTime('timestamp', '>=', $hour->start_time)->whereTime('timestamp', '<=', $hour->end_input)->get();
                                $tipo_a = "entrada";
                                $estado_a = "falta";
                                $hora = "00:00:00";
                                $color ='#cb0000';
                                $asis = AssiteciaActual::where('ci_a', '=', $persona->ci)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fech)->first();
                                if ($asis == null && $fech < $fechaactual) {
                                    $actual = new AssiteciaActual();
                                    $actual->title = $turno_a.' '.$tipo_a;
                                    $actual->nombre = $nombre;
                                    $actual->ci_a = $persona->ci;
                                    $actual->id_horario = $horario_id;
                                    $actual->id_persona = $idp;
                                    $actual->descripcion = "no tiqueo";
                                    $actual->start = $fech;
                                    $actual->end = $fech;
                                    $actual->hora = $hora;
                                    $actual->turno_a = $turno_a;
                                    $actual->tipo_a = $tipo_a;
                                    $actual->estado_a = $estado_a;
                                    $actual->valor_asistencia = $valor_asistencia;
                                    $actual->color = $color;

                                    $actual->save();
                                }

                            }
                        }
                        //dd($turno_a, $estado_a);
                    }
                    else{
                        // $entrada = AsistenciaBiometrico::where('id_user_b', '=', $persona->ci)->whereDate('timestamp', '=', $fech)
                        //     ->whereTime('timestamp', '>=', $hour->start_time)->whereTime('timestamp', '<=', $hour->end_input)->get();
                        $tipo_a = "entrada";
                        $estado_a = "falta";
                        $hora = "00:00:00";
                        $color ='#cb0000';
                        $asis = AssiteciaActual::where('ci_a', '=', $persona->ci)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fech)->first();
                        if ($asis == null && $fech < $fechaactual) {
                            $actual = new AssiteciaActual();
                            $actual->title = $turno_a.' '.$tipo_a;
                            $actual->nombre = $nombre;
                            $actual->ci_a = $persona->ci;
                            $actual->id_horario = $horario_id;
                            $actual->id_persona = $idp;
                            $actual->descripcion = "no tiqueo";
                            $actual->start = $fech;
                            $actual->end = $fech;
                            $actual->hora = $hora;
                            $actual->turno_a = $turno_a;
                            $actual->tipo_a = $tipo_a;
                            $actual->estado_a = $estado_a;
                            $actual->valor_asistencia = $valor_asistencia;
                            $actual->color = $color;

                            $actual->save();
                        }

                    }

                    //dd($turno_a, $estado_a);
                    $exisentrada = AssiteciaActual::where('ci_a', '=', $persona->ci)->where('id_horario','=', $hour->id)->where('turno_a','=', $turno_a)->where('tipo_a','=', 'entrada')
                        ->where('hora','<=', $hour->end_input)->where('estado_a','=', 'falta')->where('start','=', $fech)->first();
                    //dd($exisentrada);
                    //aqui verificamos si la entrada es falta o si existe
                    if ($exisentrada == null) {
                        $salida = AsistenciaBiometrico::where('id_user_b', '=', $persona->ci)->whereDate('timestamp', '=', $fech)->whereTime('timestamp', '>=', $hour->start_output)
                            ->whereTime('timestamp', '<=', $hour->end_output)->get();
                        //$permisossalida = EventoAsistecia::where('id_persona', '=', $persona->persona_id)->where('start', '=', $fech)->where('inicio_time', '>', $hour->end_input)->where('fin_evento', '>', $hour->end_time)->get();
                        $permisossalida = EventoAsistecia::where('id_persona', '=', $persona->persona_id)->where('start', '=', $fech)
                            ->where('inicio_time', '>', $hour->end_input)->where('fin_evento', '>=', $hour->end_time)->where('fin_evento', '<=', $hour->end_output)->orderBy('start')->get();
                        //dd($salida, $permisossalida);
                        ///////aqui estamos comparando si hay o no asistencia de salida de turno///
                        if (Count($salida) > 0 || Count($permisossalida) > 0 || Count($permisosturno) > 0 && $fech < $fechaactual ) {
                            //dd("hay para reistrar");

                            // else {
                            //     dd("abandono",$fech, $hour->id, $persona);
                            // }
                            if (Count($salida)>0 && $fech < $fechaactual) {
                                foreach($salida as $biometrico){
                                    $fecha = Carbon::create($biometrico->timestamp)->format('Y-m-d');
                                    $hora = Carbon::create($biometrico->timestamp)->format('H:i:s');
                                    //dd($fecha, $hora, $biometrico);

                                    //$hour= Horario::find($persona->horario_id);

                                    $valor_asistencia= ($hour->work_day)/2;
                                    $tipo_a = "salida";
                                    $estado_a="salida";
                                    $color ='#3c28b8';

                                    if ($hora>=$hour->start_output && $hora <= $hour->end_output) {
                                        $asis = AssiteciaActual::where('ci_a', '=', $biometrico->id_user_b)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fecha)->first();

                                        if ($asis == null && $turno_a !='defecto') {
                                            $actual = new AssiteciaActual();

                                            $actual->title = $turno_a.' '.$tipo_a;
                                            $actual->nombre = $nombre;
                                            $actual->ci_a = $biometrico->id_user_b;
                                            $actual->id_horario = $horario_id;
                                            $actual->id_persona = $idp;
                                            $actual->descripcion = $biometrico->state;
                                            $actual->start = $fecha;
                                            $actual->end = $fecha;
                                            $actual->hora = $hora;
                                            $actual->turno_a = $turno_a;
                                            $actual->tipo_a = $tipo_a;
                                            $actual->estado_a = $estado_a;
                                            $actual->valor_asistencia = $valor_asistencia;
                                            $actual->color = $color;

                                            $actual->save();
                                        }
                                    }
                                }
                            }

                            elseif (Count($salida)==0 && Count($permisossalida)>0 && $fech < $fechaactual) {
                                foreach ($permisossalida as $sa){
                                    //dd($sa, $hour);
                                    $fecha = Carbon::create($sa->start)->format('Y-m-d');
                                    $hora2 =$hour->start_output;

                                    $valor_asistencia= ($hour->work_day)/2;
                                    $tipo_a = "salida";
                                    $estado_a="permiso";
                                    $color = $sa->color;

                                    $salidass = TipoSalida::find($sa->tiposalida_id);
                                    //dd($persona);
                                    if ($hora2>=$hour->start_output && $hora2 <= $hour->end_output && $persona->horario_id == $sa->id_horario) {
                                        $asis = AssiteciaActual::where('id_persona', '=', $sa->id_persona)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fech)->first();

                                        if ($asis == null && $turno_a !='defecto') {
                                            $actual = new AssiteciaActual();

                                            //dd($sa);
                                            $actual->title = $turno_a.' '.$tipo_a;
                                            $actual->nombre = $sa->title;
                                            $actual->ci_a = $persona->ci;
                                            $actual->id_horario = $horario_id;
                                            $actual->id_persona = $idp;
                                            $actual->descripcion = $salidass->nombre_tiposalida;
                                            $actual->start = $fecha;
                                            $actual->end = $fecha;
                                            $actual->hora = $hora2;
                                            $actual->turno_a = $turno_a;
                                            $actual->tipo_a = $tipo_a;
                                            $actual->estado_a = $estado_a;
                                            $actual->valor_asistencia = $valor_asistencia;
                                            $actual->color = $color;

                                            $actual->save();
                                        }

                                    }
                                }
                                //dd($turno_a, $estado_a);
                            }
                            else {

                                $tipo_a = "salida";
                                $estado_a = "falta";
                                $hora = "00:00:00";
                                $color ='#cb0000';
                                $asisis = AssiteciaActual::where('ci_a', '=', $persona->ci)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fech)->first();
                                if ($asisis == null && $fech < $fechaactual) {
                                    $actual = new AssiteciaActual();
                                    $actual->title = $turno_a.' '.$tipo_a;
                                    $actual->nombre = $nombre;
                                    $actual->ci_a = $persona->ci;
                                    $actual->id_horario = $horario_id;
                                    $actual->id_persona = $idp;
                                    $actual->descripcion = "no tiqueo";
                                    $actual->start = $fech;
                                    $actual->end = $fech;
                                    $actual->hora = $hora;
                                    $actual->turno_a = $turno_a;
                                    $actual->tipo_a = $tipo_a;
                                    $actual->estado_a = $estado_a;
                                    $actual->valor_asistencia = $valor_asistencia;
                                    $actual->color = $color;

                                    $actual->save();
                                }

                            }
                        }
                        else {
                            $tipo_a = "salida";
                            $estado_a = "abandono";
                            $hora = $hour->end_time;
                            $color ='#78281F';
                            $asisis = AssiteciaActual::where('ci_a', '=', $persona->ci)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fech)->first();
                            if ($asisis == null && $fech < $fechaactual) {
                                $actual = new AssiteciaActual();
                                $actual->title = $turno_a.' '.$tipo_a;
                                $actual->nombre = $nombre;
                                $actual->ci_a = $persona->ci;
                                $actual->id_horario = $horario_id;
                                $actual->id_persona = $idp;
                                $actual->descripcion = "no tiqueo";
                                $actual->start = $fech;
                                $actual->end = $fech;
                                $actual->hora = $hora;
                                $actual->turno_a = $turno_a;
                                $actual->tipo_a = $tipo_a;
                                $actual->estado_a = $estado_a;
                                $actual->valor_asistencia = $valor_asistencia;
                                $actual->color = $color;

                                $actual->save();
                            }
                        }
                    }
                    //// aqui es cuando la entrada el falta
                    else {

                        $tipo_a = "salida";
                        $estado_a = "falta";
                        $hora = "00:00:00";
                        $color ='#cb0000';
                        $asisis = AssiteciaActual::where('ci_a', '=', $persona->ci)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fech)->first();
                        if ($asisis == null && $fech < $fechaactual) {
                            $actual = new AssiteciaActual();
                            $actual->title = $turno_a.' '.$tipo_a;
                            $actual->nombre = $nombre;
                            $actual->ci_a = $persona->ci;
                            $actual->id_horario = $horario_id;
                            $actual->id_persona = $idp;
                            $actual->descripcion = "no tiqueo";
                            $actual->start = $fech;
                            $actual->end = $fech;
                            $actual->hora = $hora;
                            $actual->turno_a = $turno_a;
                            $actual->tipo_a = $tipo_a;
                            $actual->estado_a = $estado_a;
                            $actual->valor_asistencia = $valor_asistencia;
                            $actual->color = $color;

                            $actual->save();
                        }

                    }
                }
                else {
                    //dd($persona, $fech);

                    $permisosturno = EventoAsistecia::where('id_persona', '=', $persona->persona_id)->where('start', '=', $fech)->where('inicio_time', '<=', $hour->start_input)->where('fin_evento', '>=', $hour->end_time)->get();
                    $permisosentrada = EventoAsistecia::where('id_persona', '=', $persona->persona_id)->where('start', '=', $fech)->where('inicio_time', '>=', $hour->start_time)->where('inicio_time', '<=', $hour->start_input)->where('fin_evento', '<', $hour->end_time)->get();
                    $permisossalida = EventoAsistecia::where('id_persona', '=', $persona->persona_id)->where('start', '=', $fech)
                        ->where('inicio_time', '>', $hour->end_input)->where('fin_evento', '>=', $hour->end_time)->where('fin_evento', '<=', $hour->end_output)->orderBy('start')->get();
                    //if (Count($permisosentrada) > 0 || Count($permisossalida) > 0 || Count($permisosturno) > 0 && $fech < $fechaactual ) {

                        if (Count($permisosturno)>0) {
                            foreach ($permisosturno as $key => $turno) {
                                $fecha = Carbon::create($turno->start)->format('Y-m-d');
                                $hora = Carbon::create($turno->inicio_time)->format('H:i:s');
                                $hora1 = Carbon::create($turno->fin_evento)->format('H:i:s');


                                //dd($fecha, $hora, $hora1);

                                //$hour= Horario::find($persona->horario_id);
                                $salida = TipoSalida::find($turno->tiposalida_id);
                                $horario_id=$hour->id;
                                $hourComparar= Carbon:: create($hour->start_input);
                                $compAtraso=$hourComparar->addMinutes($hour->late_minutes)->format('H:i:s');
                                //$valor_asistencia= ($hour->work_day)/2;
                                $tipo_a = "entrada";
                                //$turno_a=$hour->name;

                                if ($hora>=$hour->start_time && $hora <= $hour->end_input) {
                                    $tipo_a = "entrada";
                                    $estado_a="permiso";
                                    $color = $turno->color;

                                    // if ($hora>=$hour->start_time && $hora <= $compAtraso) {
                                    //     $estado_a="en hora";
                                    //     $color='#51dbaa';

                                    // }
                                    // if ($hora > $compAtraso && $hora<=$hour->end_input) {

                                    //     $estado_a="atrasado";
                                    //     $color='#ced149';
                                    // }
                                    $asis = AssiteciaActual::where('id_persona', '=', $turno->id_persona)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fecha)->first();

                                    if ($asis == null && $turno_a !='defecto') {
                                        $actual = new AssiteciaActual();

                                        $actual->title = $turno_a.' '.$tipo_a;
                                        $actual->nombre = $turno->title;
                                        $actual->ci_a = $persona->ci;
                                        $actual->id_horario = $horario_id;
                                        $actual->id_persona = $idp;
                                        $actual->descripcion = $salida->nombre_tiposalida;
                                        $actual->start = $fecha;
                                        $actual->end = $fecha;
                                        $actual->hora = $hora;
                                        $actual->turno_a = $turno_a;
                                        $actual->tipo_a = $tipo_a;
                                        $actual->estado_a = $estado_a;
                                        $actual->valor_asistencia = $valor_asistencia;
                                        $actual->color = $color;

                                        $actual->save();
                                    }

                                }
                                if ($hora1>=$hour->end_time && $hora1 <= $hour->end_output) {
                                        $valor_asistencia= ($hour->work_day)/2;
                                        $tipo_a = "salida";
                                        $estado_a="permiso";
                                        $color = $turno->color;

                                        $salida = TipoSalida::find($turno->tiposalida_id);

                                        $asis = AssiteciaActual::where('id_persona', '=', $turno->id_persona)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fecha)->first();

                                        if ($asis == null && $turno_a !='defecto') {
                                            $actual = new AssiteciaActual();

                                            $actual->title = $turno_a.' '.$tipo_a;
                                            $actual->nombre = $turno->title;
                                            $actual->ci_a = $persona->ci;
                                            $actual->id_horario = $horario_id;
                                            $actual->id_persona = $idp;
                                            $actual->descripcion = $salida->nombre_tiposalida;
                                            $actual->start = $fecha;
                                            $actual->end = $fecha;
                                            $actual->hora = $hora1;
                                            $actual->turno_a = $turno_a;
                                            $actual->tipo_a = $tipo_a;
                                            $actual->estado_a = $estado_a;
                                            $actual->valor_asistencia = $valor_asistencia;
                                            $actual->color = $color;

                                            $actual->save();
                                        }
                                }
                            }
                        }

                        elseif (Count($permisosturno) == 0 && Count($permisosentrada)>0 && $fech < $fechaactual) {
                            foreach ($permisosentrada as $perentrada){
                                //dd($biometrico);
                                $fecha = Carbon::create($perentrada->start)->format('Y-m-d');
                                $hora = Carbon::create($hour->start_input)->format('H:i:s');
                                 //dd($fecha, $hora, $biometrico);

                                 //$hour= Horario::find($persona->horario_id);
                                 $salidas = TipoSalida::find($perentrada->tiposalida_id);

                                //  $horario_id=$hour->id;
                                //  $hourComparar= Carbon:: create($hour->start_input);
                                //  $compAtraso=$hourComparar->addMinutes($hour->late_minutes)->format('H:i:s');
                                 //$valor_asistencia= ($hour->work_day)/2;
                                 //$turno_a=$hour->name;

                                 if ($hora>=$hour->start_time && $hora <= $hour->end_time && $persona->horario_id == $perentrada->id_horario) {
                                    $tipo_a = "entrada";
                                    $estado_a="permiso";
                                    $color = $perentrada->color;
                                }
                                $asis = AssiteciaActual::where('id_persona', '=', $perentrada->id_persona)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fecha)->first();

                                if ($asis == null && $turno_a !='defecto' && $persona->horario_id == $perentrada->id_horario) {
                                    $actual = new AssiteciaActual();

                                    $actual->title = $turno_a.' '.$tipo_a;
                                    $actual->nombre = $perentrada->title;
                                    $actual->ci_a = $persona->ci;
                                    $actual->id_horario = $hour->id;
                                    $actual->id_persona = $idp;
                                    $actual->descripcion = $salidas->nombre_tiposalida;
                                    $actual->start = $fecha;
                                    $actual->end = $fecha;
                                    $actual->hora = $hora;
                                    $actual->turno_a = $turno_a;
                                    $actual->tipo_a = $tipo_a;
                                    $actual->estado_a = $estado_a;
                                    $actual->valor_asistencia = $valor_asistencia;
                                    $actual->color = $color;

                                    $actual->save();
                                }
                                // else{
                                //     // $entrada = AsistenciaBiometrico::where('id_user_b', '=', $persona->ci)->whereDate('timestamp', '=', $fech)
                                //     //     ->whereTime('timestamp', '>=', $hour->start_time)->whereTime('timestamp', '<=', $hour->end_input)->get();
                                    $tipo_a = "entrada";
                                    $estado_a = "falta";
                                    $hora = "00:00:00";
                                    $color ='#cb0000';
                                    $asis = AssiteciaActual::where('ci_a', '=', $persona->ci)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fech)->first();
                                    if ($asis == null && $fech < $fechaactual) {
                                        $actual = new AssiteciaActual();
                                        $actual->title = $turno_a.' '.$tipo_a;
                                        $actual->nombre = $nombre;
                                        $actual->ci_a = $persona->ci;
                                        $actual->id_horario = $horario_id;
                                        $actual->id_persona = $idp;
                                        $actual->descripcion = "no tiqueo";
                                        $actual->start = $fech;
                                        $actual->end = $fech;
                                        $actual->hora = $hora;
                                        $actual->turno_a = $turno_a;
                                        $actual->tipo_a = $tipo_a;
                                        $actual->estado_a = $estado_a;
                                        $actual->valor_asistencia = $valor_asistencia;
                                        $actual->color = $color;

                                        $actual->save();
                                    }

                                // }
                            }
                            //dd($turno_a, $estado_a);
                        }
                        elseif (Count($permisossalida)>0 && $fech < $fechaactual) {
                            $exisen = AssiteciaActual::where('ci_a', '=', $persona->ci)->where('id_horario','=', $hour->id)->where('turno_a','=', $turno_a)->where('tipo_a','=', 'entrada')
                                ->where('hora','<=', $hour->end_input)->where('start','=', $fech)->first();
                            if ($exisen == null) {
                                $tipo_a = "entrada";
                                $estado_a = "falta";
                                $hora = "00:00:00";
                                $color ='#cb0000';
                                $asis = AssiteciaActual::where('ci_a', '=', $persona->ci)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fech)->first();
                                if ($asis == null && $fech < $fechaactual) {
                                    $actual = new AssiteciaActual();
                                    $actual->title = $turno_a.' '.$tipo_a;
                                    $actual->nombre = $nombre;
                                    $actual->ci_a = $persona->ci;
                                    $actual->id_horario = $horario_id;
                                    $actual->id_persona = $idp;
                                    $actual->descripcion = "no tiqueo";
                                    $actual->start = $fech;
                                    $actual->end = $fech;
                                    $actual->hora = $hora;
                                    $actual->turno_a = $turno_a;
                                    $actual->tipo_a = $tipo_a;
                                    $actual->estado_a = $estado_a;
                                    $actual->valor_asistencia = $valor_asistencia;
                                    $actual->color = $color;

                                    $actual->save();
                                }
                            }
                            foreach ($permisossalida as $sa){
                                //dd($sa, $hour);
                                $fecha = Carbon::create($sa->start)->format('Y-m-d');
                                $hora2 =$hour->start_output;

                                $valor_asistencia= ($hour->work_day)/2;
                                $tipo_a = "salida";
                                $estado_a="permiso";
                                $color = $sa->color;

                                $salidass = TipoSalida::find($sa->tiposalida_id);
                                //dd($persona);
                                if ($hora2>=$hour->start_output && $hora2 <= $hour->end_output && $persona->horario_id == $sa->id_horario) {
                                    $asis = AssiteciaActual::where('id_persona', '=', $sa->id_persona)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fech)->first();

                                    if ($asis == null && $turno_a !='defecto') {
                                        $actual = new AssiteciaActual();

                                        //dd($sa);
                                        $actual->title = $turno_a.' '.$tipo_a;
                                        $actual->nombre = $sa->title;
                                        $actual->ci_a = $persona->ci;
                                        $actual->id_horario = $horario_id;
                                        $actual->id_persona = $idp;
                                        $actual->descripcion = $salidass->nombre_tiposalida;
                                        $actual->start = $fecha;
                                        $actual->end = $fecha;
                                        $actual->hora = $hora2;
                                        $actual->turno_a = $turno_a;
                                        $actual->tipo_a = $tipo_a;
                                        $actual->estado_a = $estado_a;
                                        $actual->valor_asistencia = $valor_asistencia;
                                        $actual->color = $color;

                                        $actual->save();
                                    }

                                }
                            }
                            //dd($turno_a, $estado_a);
                        }
                    //}
                        else {
                            $tipo_a = "entrada";
                            $estado_a = "falta";
                            $hora = "00:00:00";
                            $color ='#cb0000';
                            $asis = AssiteciaActual::where('ci_a', '=', $persona->ci)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fech)->first();
                            if ($asis == null && $turno_a !='defecto' && $fech < $fechaactual) {
                                $actual = new AssiteciaActual();
                                $actual->title = $turno_a.' '.$tipo_a;
                                $actual->nombre = $nombre;
                                $actual->ci_a = $persona->ci;
                                $actual->id_horario = $horario_id;
                                $actual->id_persona = $idp;
                                $actual->descripcion = "no tiqueo";
                                $actual->start = $fech;
                                $actual->end = $fech;
                                $actual->hora = $hora;
                                $actual->turno_a = $turno_a;
                                $actual->tipo_a = $tipo_a;
                                $actual->estado_a = $estado_a;
                                $actual->valor_asistencia = $valor_asistencia;
                                $actual->color = $color;

                                $actual->save();
                            }

                            $tipo_a = "salida";
                            $estado_a = "falta";
                            $hora = "00:00:00";
                            $color ='#cb0000';
                            $asis = AssiteciaActual::where('ci_a', '=', $persona->ci)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('start','=', $fech)->first();
                            if ($asis == null && $turno_a !='defecto' && $fech < $fechaactual) {
                                $actual = new AssiteciaActual();
                                $actual->title = $turno_a.' '.$tipo_a;
                                $actual->nombre = $nombre;
                                $actual->ci_a = $persona->ci;
                                $actual->id_horario = $horario_id;
                                $actual->id_persona = $idp;
                                $actual->descripcion = "no tiqueo";
                                $actual->start = $fech;
                                $actual->end = $fech;
                                $actual->hora = $hora;
                                $actual->turno_a = $turno_a;
                                $actual->tipo_a = $tipo_a;
                                $actual->estado_a = $estado_a;
                                $actual->valor_asistencia = $valor_asistencia;
                                $actual->color = $color;

                                $actual->save();
                            }

                        }///////////finif
                }
            }
        }
        return response()->json(["resp"=>200]);
    }

    public function show(AssiteciaActual $assiteciaActual, Request $request)
    {
        $id=$request->id;
        //dd($id);
        $event = EventoAsistecia::All();


        $events=AssiteciaActual::where('id_persona', '=', $id)->get();
        //dd($events);
        return response()->json($events);
    }

    public function getAsistenciaActual(Request $request){
        $id=$request->id;
        //dd($id_p);
        $asis=AssiteciaActual::find($id);

        $json[]=[
            "id" => $asis->id,
            "title" => $asis->title,
            "nombre" => $asis->nombre,
            "ci_a" => $asis->ci_a,
            "id_horario" => $asis->id_horario,
            "id_persona" => $asis->id_persona,
            "descripcion" => $asis->descripcion,
            "start" => $asis->start,
            "end" => $asis->end,
            "hora" => $asis->hora,
            "turno_a" => $asis->turno_a,
            "tipo_a" => $asis->tipo_a,
            "estado_a" => $asis->estado_a,
            "color" => $asis->color,
        ];

        return response()->json($json);
        //return response()->json(view('rrhh::scarrhh.vistasHojaCalculo.meses', compact('title', 'fecha', 'meses', 'hoursi','id_persona'))->render());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id_a;
        $descripcion = $request->descripcion;
        $hora = $request->hora;
        $estado_a = $request->estado;
        $color = $request->color;

        $asistencias = AssiteciaActual::find($id);
        $asistencias->descripcion = $descripcion;
        $asistencias->hora = $hora;
        $asistencias->estado_a = $estado_a;
        $asistencias->color = $color;

        $asistencias->save();

        return response()->json(["resp"=>200, "asistencias"=>$asistencias->title]);
        //return redirect('rrhh/personals')->with("notify",$notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $asistencia=AssiteciaActual::find($id);
        $asistencia->delete();
        return response()->json(["resp"=>200]);
    }

}
