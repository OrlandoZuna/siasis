<?php

namespace Modules\Rrhh\Http\Controllers;

use Modules\Rrhh\Entities\EventoAsistecia;
use Modules\Rrhh\Entities\GrupoHorario;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\Horario;
use Modules\Rrhh\Entities\TipoSalida;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

//use App\Horario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;
use Date;

class EventoAsisteciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("rrhh::scarrhh.eventos.eventoAsistencia.index");
    }

    public function meses(Request $request)
    {
        $hoursi=Horario::all();

        $tiposalidas = TipoSalida ::all();
        $fecha = Carbon::now()->format('Y-m-d H:i:s');
        $now = Carbon::now()->format('day');
        $date = Carbon::parse($fecha)
            ->addSeconds(16)
            ->format('Y-m-d H:i:s');
            $id_persona = $request->idPer;
        $persona = Personal::find($id_persona);

        $permisos = 0;
        $perMT = 0;
        $perTC = 0;
        $perH = 0;
        $perFS = 0;

        $perMTT = 0;
        $perTCT = 0;
        $perHT = 0;
        $perFST = 0;
        $perTP = 0;

        $actuals = EventoAsistecia::where('id_persona', '=', $id_persona)->orderBy('start', 'asc')->get();
        $total_permisos = Count($actuals);
        if ($total_permisos > 0) {

            foreach ($actuals as $permiso){
                if(Carbon::createFromDate($permiso->start)->month == now()->month){

                    $permisos ++;
                    $difhora = Carbon::create($permiso->inicio_time)->diffInHours(Carbon::create($permiso->fin_evento));
                    $intervaloMm= DATE::CreateFromFormat('H:i:s', $permiso->inicio_time)->diffInMinutes(DATE::createFromFormat('H:i:s', $permiso->fin_evento));
                    $intervaloM=gmdate('H:i', $intervaloMm * 60);
                    $dia = DATE::create($permiso->start)->format('w');

                    if ($difhora == 4 && $dia != 6  && $dia != 0) {
                        $perMT ++;
                        $perMTT = $perMTT + floatval($intervaloM);
                    }
                    elseif ($difhora > 7 && $dia != 6  && $dia != 0){
                        $perTC ++;
                        $perTCT = $perTCT + floatval($intervaloM);
                    }
                    elseif ($difhora < 4 && $dia != 6  && $dia != 0) {
                        $perH ++;
                        $perHT = $perHT + floatval($intervaloM);
                    }
                    else{
                        $perFS ++;
                        $perFST = $perFST + floatval($intervaloM);
                    }
                }
            }
            $perTP=$perMTT + $perHT + $perFST + $perTCT;
        }
        $title="PERMISOS Y SALIDAS DE: ";
        if ($request->ajax()) {
            return response()->json(view('rrhh::scarrhh.vistasHojaCalculo.meses',
                compact('title', 'fecha', 'hoursi', 'id_persona', 'tiposalidas', 'persona', 'perH', 'perMT', 'perTC', 'perHT', 'perFS', 'perFST', 'perMTT', 'perTCT', 'permisos', 'perTP'))->render());
        }
    }

    public function permisoscalcular(Request $request)
    {
        $fecha1 = $request->fecha1;
        $fecha2 = $request->fecha2;
        $id_persona =$request->id_persona;
        $fecha11= Carbon::create($fecha2)->addDay(1)->format('Y-m-d');

        $permisos = 0;
        $perMT = 0;
        $perTC = 0;
        $perH = 0;
        $perFS = 0;

        $perMTT = 0;
        $perTCT = 0;
        $perHT = 0;
        $perFST = 0;
        $perTP = 0;

        $actuals = EventoAsistecia::where('id_persona', '=', $id_persona)->where('start', '>=', $fecha1)->where('end', '<=', $fecha11)->orderBy('start', 'asc')->get();
        //dd(count($actuals), $actuals);
        $total_permisos = Count($actuals);
        $permisos = $total_permisos;
        if ($total_permisos > 0) {

            foreach ($actuals as $permiso){

                $difhora = Carbon::create($permiso->inicio_time)->diffInHours(Carbon::create($permiso->fin_evento));
                $intervaloMm= DATE::CreateFromFormat('H:i:s', $permiso->inicio_time)->diffInMinutes(DATE::createFromFormat('H:i:s', $permiso->fin_evento));
                $intervaloM=gmdate('H:i', $intervaloMm * 60);
                $dia = DATE::create($permiso->start)->format('w');

                if ($difhora == 4 && $dia != 6  && $dia != 0) {
                    $perMT ++;
                    $perMTT = $perMTT + floatval($intervaloM);
                }
                elseif ($difhora > 7 && $dia != 6  && $dia != 0){
                    $perTC ++;
                    $perTCT = $perTCT + floatval($intervaloM);
                }
                elseif ($difhora < 4 && $dia != 6  && $dia != 0) {
                    $perH ++;
                    $perHT = $perHT + floatval($intervaloM);
                }
                else{
                    $perFS ++;
                    $perFST = floatVal($perFST) + floatval($intervaloM);
                }
            }
            $perTP=$perMTT + $perHT + $perFST + $perTCT;

            return response()->json([
                "resp"=>200,
                "permisos"=>view("rrhh::scarrhh.vistasHojaCalculo.vista-renderper", compact('id_persona', 'perH', 'perMT', 'perTC', 'perFS', 'perFST', 'perHT', 'perMTT', 'perTCT', 'permisos', 'perTP'))->render()
            ]);
        }
        else{
            return response()->json([
                "resp"=>2050
            ]);
        }
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $tiposalida_id = $request->tiposalida;
        $inicio_time = $request->inicio_time;
        $fin_evento= $request->fin_evento;
        $start = $request->start;
        $end = $request->end;
        $id_horario = $request->id_horario;
        $id_persona = $request->id_persona;
        $color = $request->color;
        //dd($inicio_time, $end);
        if ($title== null || $tiposalida_id == null || $inicio_time == null || $fin_evento == null ||$color == null ) {
            return response()->json(["resp"=>250]);
        }
        else {

            $eventosalida = new EventoAsistecia();
            $eventosalida->title = $title;
            $eventosalida->tiposalida_id = $tiposalida_id;
            $eventosalida->inicio_time = $inicio_time;
            $eventosalida->fin_evento = $fin_evento;
            $eventosalida->start = $start;
            $eventosalida->end = $end;
            $eventosalida->id_horario = $id_horario;
            $eventosalida->id_persona = $id_persona;
            $eventosalida->color = $color;

            $eventosalida->save();

            return response()->json(["resp"=>200]);
        }

        //return response()->json(["resp"=>250]);
    }

    public function show(EventoAsistecia $eventoAsistecia, Request $request)
    {
        $id=$request->id;

        $events=EventoAsistecia::where('id_persona', '=', $id)->get();
        //$events=EventoAsistecia::All();
        return response()->json($events);
    }

    public function update(Request $request)
    {
        $id_permiso = $request->id_p;
        $inicio_time= $request->inicio;
        $fin_evento = $request->fin;
        $color = $request->color;
        $fecha1 = $request->fecha1;
        $fecha2 = $request->fecha2;
        $id_horario = $request->id_horario;
        $id_tiposalida = $request->id_tiposalida;


        $permiso = EventoAsistecia::find($id_permiso);

        $permiso->inicio_time = $inicio_time;
        $permiso->fin_evento = $fin_evento;
        $permiso->start = $fecha1;
        $permiso->end = $fecha2;
        $permiso->id_horario = $id_horario;
        $permiso->tiposalida_id = $id_tiposalida;
        $permiso->color = $color;

        $permiso->save();

        return response()->json(["resp"=>200, "permiso"=>$permiso->title]);

    }

    public function getEnvento(Request $request){
        $id=$request->id;
        //dd($id_p);
        $evento=EventoAsistecia::find($id);

        $json[]=[
            "id" => $evento->id,
            "title" => $evento->title,
            "tiposalida_id" => $evento->tiposalida_id,
            "inicio_time" => $evento->inicio_time,
            "fin_evento" => $evento->fin_evento,
            "start" => $evento->start,
            "end" => $evento->end,
            "id_horario" => $evento->id_horario,
            "id_persona" => $evento->id_persona,
            "color" => $evento->color
        ];

        //return $json;
        return response()->json($json);
        //return response()->json(view('rrhh::scarrhh.vistasHojaCalculo.meses', compact('title', 'fecha', 'meses', 'hoursi','id_persona'))->render());

    }

    public function deleteEvento(Request $request){
        $id=$request->id;
        $evento=EventoAsistecia::find($id);
        $evento->delete();
        return response()->json(["resp"=>200]);
    }
}
