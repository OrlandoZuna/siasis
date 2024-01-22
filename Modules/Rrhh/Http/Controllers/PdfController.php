<?php

namespace Modules\Rrhh\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\EventoAsistecia;
use Modules\Rrhh\Entities\AssiteciaActual;
use Modules\Rrhh\Entities\GrupoPersona;
use Modules\Rrhh\Entities\GrupoTrabajo;
use Modules\Rrhh\Entities\TipoContrato;
use Modules\Rrhh\Entities\TipoSalida;
use Modules\Rrhh\Entities\GrupoHorario;
use Modules\Rrhh\Entities\Horario;
use App\Unidad;
use Jenssegers\Date\Date as DATE;
use App\Pedido;
use Modules\Presupuestos\Entities\Bitacora;
use App\Gestion;
use App\AdmiFlujo;
use App\Detalle;
use Modules\Almacen\Entities\File;
use Modules\Almacen\Entities\Control;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use App\User;
use App\FLujo;
use App\Flujodetalle;
use Carbon\Carbon;
use DB;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public $pdfgrupo='HOLA';
    public function pdfprueba() {
        $pdf = PDF::loadView('rrhh::scarrhh.eventos.eventoAsistencia.pdfevento')
            ->setPaper('b6','landscape');
        return $pdf->stream('prueba.pdf');
    }

    public function pdfevento(Request $request) {
        $eventos = EventoAsistecia::all();
        $ultimoevento = $eventos->get(count($eventos)-1);
        $dia=Carbon::create($ultimoevento->start)->format('d');
        $mes=Carbon::create($ultimoevento->start)->format('m');
        $year=Carbon::create($ultimoevento->start)->format('Y');
        $id_persona = $ultimoevento->id_persona;
        //dd($id_persona);
        $persona= Personal::find($id_persona);
        //dd($ultimoevento, $persona);
        $pdf = PDF::loadView('rrhh::scarrhh.eventos.eventoAsistencia.pdfAutorizacion', compact('ultimoevento', 'persona', 'dia', 'mes', 'year'))
            ->setPaper('letter');
       // ->setPaper('b6', 'landscape');

        return $pdf->stream('AutorizacionSalida.pdf');
    }

    ///////////////////////desde aqui reportes////////////// de asistencias //////////////////////
    public function pdfpersonalasistencia(Request $request) {
        $date = new DATE('last monday');
        $fecha1 = $request->fecha1;
        $fecha2 = $request->fecha2;
        $cadena = [];
        $dif = Carbon::create($fecha1)->diffInDays(Carbon::create($fecha2));
        $mes = DATE::create($fecha1)->format('M').' '.DATE::create($fecha2)->format('M');
        $año = DATE::create($fecha1)->format('Y');
        $id_persona =$request->id_persona;
        $persona= Personal::find($id_persona);
        $nombres = $persona->apellido_paterno.' '.$persona->apellido_materno.' '.$persona->nombres;
        $ci = $persona->ci;
        $cargo = $persona->profecion;
        if($cargo==null){
            $cargo = "sin designar";
        }
        $grupos = GrupoPersona::where('personal_id','=',$id_persona)->first();
        $grupo = "sin designar";
        $grupo = $grupos->nonbre_grupotrabajo;
        $valor = 0;
        $faltas = 0;
        $atrasos = 0;
        $abandonos = 0;
        $permisos = 0;
        $now = Carbon::now();
        $asistencias = AssiteciaActual::where('id_persona', '=', $id_persona)->where('start', '>=', $fecha1)->where('end', '<=', $fecha2)->orderBy('start', 'asc')->get();
        $asisentradas = AssiteciaActual::where('id_persona', '=', $id_persona)->where('start', '>=', $fecha1)->where('end', '<=', $fecha2)->orderBy('start', 'asc')->where('tipo_a', '=', "entrada")->get();
        $asissalidas = AssiteciaActual::where('id_persona', '=', $id_persona)->where('start', '>=', $fecha1)->where('end', '<=', $fecha2)->orderBy('start', 'asc')->where('tipo_a', '=', "salida")->get();
        foreach ($asistencias as $actual){
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
        for ($i=0; $i <= $dif; $i++) {
            $aux = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
            $cadena [] = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
        }
        $asistencia = array();
        foreach ($cadena as $fech){
            $desig = GrupoHorario::where('persona_id', '=', $id_persona)->where('start', '=', $fech)->get();
            if (Count($desig) == 2){
                $asistenci = AssiteciaActual::where('id_persona', '=', $id_persona)->where('start', '=', $fech)->get();
                if (count($asistenci) == 4){
                    $asistencia = $asistenci;
                }
                elseif (count($asistenci) == 3) {
                    for ($i=0; $i < 3; $i++) {
                        $asistencia[] = $asistenci[$i];
                    }
                }
            }
        }
        $pdf = PDF::loadView('rrhh::scarrhh.reportes.pdfs.pdfPersonal',
            compact(['asistencias', 'mes', 'año', 'nombres', 'ci', 'cargo', 'grupo', 'fecha1', 'fecha2', 'asisentradas', 'asissalidas', 'valor', 'faltas', 'atrasos','cadena', 'permisos', 'abandonos']))
            ->setPaper('legal');
        return $pdf->stream('asistencia.pdf');
    }

    public function pdfgrupo(Request $request)
    {
        // ->setPaper('letter');$date = new Carbon('next monday');
        $date = new DATE('last monday');

        $fecha1 = $request->fecha1;
        $fecha11= Carbon::create($fecha1)->addDay(1)->format('Y-m-d');
        $fecha2 = $request->fecha2;
        $grupo_id = $request->grupo;

        $cadena = [];
        $sinasistencia = [];
        $entradasgrupo = [];
        $salidasgrupo = [];
        $dif = Carbon::create($fecha1)->diffInDays(Carbon::create($fecha2));
        $mes = DATE::create($fecha1)->format('M').' '.DATE::create($fecha2)->format('M');
        $año = DATE::create($fecha1)->format('Y');

        $valor = 0;
        $faltas = 0;
        $atrasos = 0;
        $abandonos = 0;
        $permisos = 0;

        $grupotrabajo = GrupoTrabajo::find($grupo_id);
        $grupo = $grupotrabajo->nombre_trabajo;

        $grupohorario = DB::table('rrhh.personas')
            ->join('rrhh.grupo_persona', 'rrhh.grupo_persona.personal_id', '=', 'rrhh.personas.id')
            ->join('rrhh.asistenciasactual','rrhh.asistenciasactual.id_persona', '=', 'rrhh.personas.id')
            ->where('rrhh.grupo_persona.grupo_trabajo_id', '=', $grupo_id)
            ->where('rrhh.asistenciasactual.start', '>=', $fecha1)->where('rrhh.asistenciasactual.end', '<=', $fecha2)->orderBy('id_persona', 'asc')
            ->get();

        $grupohorarioentradas = DB::table('rrhh.personas')
            ->join('rrhh.grupo_persona', 'rrhh.grupo_persona.personal_id', '=', 'rrhh.personas.id')
            ->join('rrhh.asistenciasactual','rrhh.asistenciasactual.id_persona', '=', 'rrhh.personas.id')
            ->where('rrhh.grupo_persona.grupo_trabajo_id', '=', $grupo_id)
            ->where('rrhh.asistenciasactual.start', '>=', $fecha1)->where('rrhh.asistenciasactual.end', '<=', $fecha2)
            ->where('rrhh.asistenciasactual.tipo_a', '=', "entrada")->orderBy('id_persona', 'asc')->orderBy('start', 'asc')
            ->get();

        $grupohorariosalidas = DB::table('rrhh.personas')
            ->join('rrhh.grupo_persona', 'rrhh.grupo_persona.personal_id', '=', 'rrhh.personas.id')
            ->join('rrhh.asistenciasactual','rrhh.asistenciasactual.id_persona', '=', 'rrhh.personas.id')
            ->where('rrhh.grupo_persona.grupo_trabajo_id', '=', $grupo_id)
            ->where('rrhh.asistenciasactual.start', '>=', $fecha1)->where('rrhh.asistenciasactual.end', '<=', $fecha2)
            ->where('rrhh.asistenciasactual.tipo_a', '=', "salida")->orderBy('id_persona', 'asc')->orderBy('start', 'asc')
            ->get();

        //dd(Count($grupohorario), $grupohorarioentradas, Count($grupohorariosalidas));
        //dd($mes, $año, $nombres, $ci, $cargo, $grupo);

        foreach ($grupohorario as $actual){
            //dd($grupo);
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
        $grupper = DB::table('rrhh.personas')
            ->join('rrhh.grupo_persona', 'rrhh.personas.id', '=', 'rrhh.grupo_persona.personal_id')
            ->where('rrhh.grupo_persona.grupo_trabajo_id', '=', $grupo_id)->orderBy('personal_id', 'asc')
            ->get();

        foreach ($grupper as $gru){
           // dd($gru);
            $existe = AssiteciaActual::where('id_persona', '=', $gru->personal_id)->where('start', '>=', $fecha1)->where('end', '<=', $fecha2)->orderBy('id_persona', 'asc')->get();
            if(Count($existe)< 1){
                $sinasistencia [] = $gru;
            }
        }
        //dd($faltas, $valor, $atrasos);
        for ($i=1; $i <= $dif; $i++) {
            $aux = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
            $cadena [] = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
        }
        $cantidad=Count($grupper);
        //dd($cadena);
        //view()->share('asistencias', $asistencias, 'mes', $mes, 'año', $año, 'nombres', $nombres, 'ci', $ci, 'cargo', $cargo, 'grupo', $grupo);
        $pdf = PDF::loadView('rrhh::scarrhh.reportes.pdfs.pdfGrupo',
            compact(['mes', 'año', 'grupo', 'fecha1', 'fecha2', 'grupohorarioentradas', 'grupohorariosalidas', 'valor', 'faltas', 'atrasos', 'permisos', 'abandonos', 'sinasistencia', 'grupper', 'grupohorario', 'cadena', 'cantidad']))
            ->setPaper('legal');
              //// para descargar
        // $path = public_path('pdf/');
        // $fileName = time().'.'. 'pdf' ;
        // $pdf->save($path . '/' . $fileName);
        // $pdf = Public_path('pdf/'.$fileName);
        /////tambien hasta aqui......////

        //return response()->download($pdf);
        ini_set('memory_limit','-1');
        set_time_limit(3000000);
        // $this->pdfgrupo->stream('grupo.pdf');


        // return response()->json(["resp"=>200]);
        return $pdf->stream('grupo.pdf');

    }
    public function DesG (){
        dd($this->pdfgrupo);
    }

    public function pdftc(Request $request)
    {
        // ->setPaper('letter');$date = new Carbon('next monday');
        $date = new DATE('last monday');

        $fecha1 = $request->fecha1;
        $fecha11= Carbon::create($fecha1)->addDay(1)->format('Y-m-d');
        $fecha2 = $request->fecha2;
        $tc_id = $request->grupo;

        $cadena = [];
        $sinasistencia = [];
        $entradasgrupo = [];
        $salidasgrupo = [];
        $actualllenado = [];
        $actualAsistencias = [];

        $dif = Carbon::create($fecha1)->diffInDays(Carbon::create($fecha2));
        $mes = DATE::create($fecha1)->format('M').' '.DATE::create($fecha2)->format('M');
        $año = DATE::create($fecha1)->format('Y');

        $valor = 0;
        $faltas = 0;
        $atrasos = 0;
        $abandonos = 0;
        $permisos = 0;

        $tipocontrato = TipoContrato::find($tc_id);
        $nombre_tc = $tipocontrato->nombre_tipo_contrato;
        $per_tc = Personal::where('id_tipo_contrato', '=', $tc_id)->orderBy('id', 'asc')->get()
        $grupohorario = DB::table('rrhh.personas')
            ->join('rrhh.asistenciasactual','rrhh.asistenciasactual.id_persona', '=', 'rrhh.personas.id')
            ->where('rrhh.personas.id_tipo_contrato', '=', $tc_id)
            ->where('rrhh.asistenciasactual.start', '>=', $fecha1)->where('rrhh.asistenciasactual.end', '<=', $fecha2)->orderBy('id_persona', 'asc')
            ->get();

        $grupohorarioentradas = DB::table('rrhh.personas')
            ->join('rrhh.asistenciasactual','rrhh.asistenciasactual.id_persona', '=', 'rrhh.personas.id')
            ->where('rrhh.personas.id_tipo_contrato', '=', $tc_id)
            ->where('rrhh.asistenciasactual.start', '>=', $fecha1)->where('rrhh.asistenciasactual.end', '<=', $fecha2)
            ->where('rrhh.asistenciasactual.tipo_a', '=', "entrada")->orderBy('id_persona', 'asc')->orderBy('start', 'asc')
            ->get();

        $grupohorariosalidas = DB::table('rrhh.personas')
            ->join('rrhh.asistenciasactual','rrhh.asistenciasactual.id_persona', '=', 'rrhh.personas.id')
            ->where('rrhh.personas.id_tipo_contrato', '=', $tc_id)
            ->where('rrhh.asistenciasactual.start', '>=', $fecha1)->where('rrhh.asistenciasactual.end', '<=', $fecha2)
            ->where('rrhh.asistenciasactual.tipo_a', '=', "salida")->orderBy('id_persona', 'asc')->orderBy('start', 'asc')
            ->get();
        //dd($grupohorarioentradas, $grupohorariosalidas );
        for ($i=1; $i <= $dif; $i++) {
            $aux = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
            $cadena [] = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
        }
        $cantidad=Count($per_tc);
        $con= 0;
        $existe= 0;
        // foreach ($per_tc as $tc)
        // {
        //   $f_asis = '';
        //   $diaA = '';
        //   $ci_asis = '';
        //   $n_horario = '';
        //   $tipo1 = '';
        //   $hora1 = '';
        //   $e_asis1 = '';
        //   $tipo2 = '';
        //   $hora2 = '';
        //   $e_asis2 = '';
        //   $h_trabajado = '';
        //   $bonote= 0;
        //   $dt= 0;
        //   $no= 0;
        //   $dia = '';
        //   foreach ($cadena as $fecha)
        //   {
        //     $existe= 0;
        //     $dia = DATE::create($fecha)->format('w');
        //     foreach ($grupohorarioentradas as $asistencias){
        //         if ($asistencias->start == $fecha && $asistencias->id_persona == $tc->id){
        //             $existe++;
        //         }
        //     }
        //     //dd($existe, Count($cadena));
        //     if($existe == 0)
        //     {
        //       $f_asis = $fecha;
        //       $diaA = DATE::create($fecha)->format('D');
        //       $ci_asis= $tc->ci;
        //       $n_horario = 0;
        //       $tipo1 = 0;
        //       $hora1 = 0;
        //       $e_asis1 = 0;
        //       $tipo2 = 0;
        //       $hora2 = 0;
        //       $e_asis2 = 0;
        //       $h_trabajado = 0;
        //       $actualllenado = ['fecha' => $f_asis, 'dia' => $diaA, 'ci'=>$ci_asis, 'horario'=>$n_horario, 'tipo1'=>$tipo1, 'hora1'=>$hora1, 'estado1'=>$e_asis1,'tipo2'=>$tipo2, 'hora2'=>$hora2, 'estado2'=> $e_asis2, 'horatra'=>$h_trabajado, 'diatra'=>$dia];
        //       $actualAsistencias [] = $actualllenado;
        //     }
        //     else
        //     {
        //       if ((int)$dia != 6 && (int)$dia != 0) {
        //           $bonote ++;
        //       }
        //       $dt ++;
        //       $t_h = "00:00";
        //       foreach ($grupohorarioentradas as $asistencia)
        //       {
        //         if ($asistencia->start == $fecha && $asistencia->id_persona == $tc->id)
        //         {
        //           $f_asis  = $asistencia->start;
        //           $diaA  = DATE::create($asistencia->start)->format('D');
        //           $ci_asis  = $asistencia->ci_a;
        //           $n_horario  = $asistencia->turno_a;
        //           $tipo1  = $asistencia->tipo_a;
        //           $hora1  = $asistencia->hora;
        //           $e_asis1  = $asistencia->estado_a;
        //           foreach ($grupohorariosalidas as $asis)
        //           {
        //             if($asis->turno_a == $asistencia->turno_a && $asis->start == $fecha && $asis->id_persona == $tc->id)
        //             {
        //               $tipo2 = $asis->tipo_a;
        //               $hora2 = $asis->hora;
        //               $e_asis2 = $asis->estado_a;
        //                 // $intervaloH= DATE::CreateFromFormat('Y-m-d H:i:s', $asis->start.' '.$asis->hora)->diffInHours(DATE::createFromFormat('Y-m-d H:i:s', $asistencia->start.' '.$asistencia->hora));
        //                 $intervaloMm= DATE::CreateFromFormat('H:i:s', $asis->hora)->diffInMinutes(DATE::createFromFormat('H:i:s', $asistencia->hora));
        //                 $intervaloM=gmdate('H:i', $intervaloMm * 60);
        //                 //$t_h = DATE('H:i', strtotime($t_h)+ strtotime($intervaloM)-strtotime('midnight'))
        //               $h_trabajado = $intervaloM;
        //             }
        //           }
        //           $actualllenado = ['fecha' => $f_asis, 'dia' => $diaA, 'ci'=>$ci_asis, 'horario'=>$n_horario, 'tipo1'=>$tipo1, 'hora1'=>$hora1, 'estado1'=>$e_asis1,'tipo2'=>$tipo2, 'hora2'=>$hora2, 'estado2'=> $e_asis2, 'horatra'=>$h_trabajado, 'diatra'=>$dia];
        //           $actualAsistencias [] = $actualllenado;
        //         }
        //       }
        //     }
        //   }
        // }
        // dd($per_tc);
        //dd(Count($grupohorarioentradas), Count($grupohorarioentradas), Count($actualAsistencias), Count($grupohorario), $actualAsistencias);
        //dd($actualAsistencias);
        //dd($mes, $año, $nombre_tc, $fecha1, $fecha2, $grupohorarioentradas, $grupohorariosalidas, $valor, $faltas, $atrasos, $permisos, $abandonos, $per_tc, $grupohorario, $cadena, $cantidad);
        // //view()->share('asistencias', $asistencias, 'mes', $mes, 'año', $año, 'nombres', $nombres, 'ci', $ci, 'cargo', $cargo, 'grupo', $grupo);
        $pdf = PDF::loadView('rrhh::scarrhh.reportes.pdfs.pdfTc',
            compact(['mes', 'año', 'nombre_tc', 'fecha1', 'fecha2', 'grupohorarioentradas', 'grupohorariosalidas', 'per_tc', 'grupohorario', 'cadena', 'cantidad']))
            ->setPaper('legal');

        // $pdf = PDF::loadView('rrhh::scarrhh.reportes.pdfs.pdfprueba',
        //     compact(['mes', 'año', 'nombre_tc', 'fecha1', 'fecha2', 'per_tc', 'actualAsistencias', 'cantidad', 'grupohorario', 'cadena']))
        //     ->setPaper('legal');
              //// para descargar
        // $path = public_path('pdf/');
        // $fileName = time().'.'. 'pdf' ;
        // $pdf->save($path . '/' . $fileName);
        // $pdf = Public_path('pdf/'.$fileName);
        /////tambien hasta aqui......////
        // // ini_set('memory_limit','-1');
        // // set_time_limit(3000000);

        //return response()->download($pdf);
        return $pdf->stream('tc.pdf');

    }


    ////////////////////////////////permiossssss pdfs.....//////////////
    public function pdfpersonalapermisos(Request $request) {
        $date = new DATE('last monday');
        $fecha1 = $request->fecha1;
        $fecha2 = $request->fecha2;
        $cadena = [];
        $dif = Carbon::create($fecha1)->diffInDays(Carbon::create($fecha2));
        $mes = DATE::create($fecha1)->format('M').' '.DATE::create($fecha2)->format('M');
        $año = DATE::create($fecha1)->format('Y');
        $id_persona =$request->id_persona;
        $persona= Personal::find($id_persona);
        $nombres = $persona->apellido_paterno.' '.$persona->apellido_materno.' '.$persona->nombres;
        $ci = $persona->ci;
        $cargo = $persona->profecion;
        if($cargo==null){
            $cargo = "sin designar";
        }
        $grupos = GrupoPersona::where('personal_id','=',$id_persona)->first();
        $grupo = "sin designar";
        $grupo = $grupos->nonbre_grupotrabajo;
        $perMT = 0;
        $perTC = 0;
        $perH = 0;
        $hours = Horario::all();
        $now = Carbon::now();
        $tipo_c = TipoContrato::find($persona->id_tipo_contrato);
        $nombre_tc = $tipo_c->nombre_tipo_contrato;
        $permisos= EventoAsistecia::where('id_persona', '=', $id_persona)->where('start', '>=', $fecha1)->where('end', '<=', $fecha2)->orderBy('start', 'asc')->get();
        if (Count($permisos)>0){
            foreach($permisos as $permiso){
                $hour = Horario::find($permiso->id_horario);
                $nombre_h=$hour->name;
                $tipo_s = TipoSalida:: find($permiso->tiposalida_id);
                $nombre_ts = $tipo_s->nombre_tiposalida;
                $difhora = Carbon::create($permiso->inicio_time)->diffInHours(Carbon::create($permiso->fin_evento));
                if ($difhora == 4 ) {
                    $perMT ++;
                }
                elseif ($difhora > 7){
                    $perTC ++;
                }
                else {
                    $perH ++;
                }
            }
        }
        for ($i=0; $i <= $dif; $i++) {
            $aux = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
            $cadena [] = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
        }
        $pdf = PDF::loadView('rrhh::scarrhh.reportes.pdfs.pdfPersonalpermisos',
            compact(['permisos', 'mes', 'año', 'nombres', 'ci', 'cargo', 'grupo', 'fecha1', 'fecha2', 'perMT', 'perTC', 'perH','cadena', 'nombre_tc', 'hours']))
            ->setPaper('letter');

        return $pdf->stream('permisos.pdf');
    }

    public function pdfps(Request $request)
    {
        $date = new DATE('last monday');

        $fecha1 = $request->fecha1;
        $fecha11= Carbon::create($fecha1)->addDay(1)->format('Y-m-d');
        $fecha2 = $request->fecha2;
        $ps_id = $request->grupo;

        $cadena = [];
        $dif = Carbon::create($fecha1)->diffInDays(Carbon::create($fecha2));
        $mes = DATE::create($fecha1)->format('M').' '.DATE::create($fecha2)->format('M');
        $año = DATE::create($fecha1)->format('Y');

        $tipocontrato = TipoContrato::find($ps_id);
        $nombre_tc = $tipocontrato->nombre_tipo_contrato;
        $per_tc = Personal::where('id_tipo_contrato', '=', $ps_id)->orderBy('id', 'asc')->get();

        $grupohorario = DB::table('rrhh.personas')
            ->join('rrhh.evento','rrhh.evento.id_persona', '=', 'rrhh.personas.id')
            ->where('rrhh.personas.id_tipo_contrato', '=', $ps_id)
            ->where('rrhh.evento.start', '>=', $fecha1)->where('rrhh.evento.end', '<=', $fecha2)->orderBy('id_persona', 'asc')->orderBy('start', 'asc')
            ->get();

        for ($i=0; $i <= $dif; $i++) {
            $aux = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
            $cadena [] = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
        }
        $cantidad=Count($per_tc);
        // //view()->share('asistencias', $asistencias, 'mes', $mes, 'año', $año, 'nombres', $nombres, 'ci', $ci, 'cargo', $cargo, 'grupo', $grupo);
        $pdf = PDF::loadView('rrhh::scarrhh.reportes.pdfs.pdfps',
            compact(['mes', 'año', 'nombre_tc', 'fecha1', 'fecha2', 'per_tc', 'grupohorario', 'cadena', 'cantidad']))
            ->setPaper('legal');
              //// para descargar
        // $path = public_path('pdf/');
        // $fileName = time().'.'. 'pdf' ;
        // $pdf->save($path . '/' . $fileName);
        // $pdf = Public_path('pdf/'.$fileName);
        /////tambien hasta aqui......////
        ini_set('memory_limit','-1');
        set_time_limit(3000000);

        //return response()->download($pdf);
        return $pdf->stream('ps.pdf');

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
