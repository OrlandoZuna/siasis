<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Horario;

use Illuminate\Http\Request;
use Carbon\Carbon;
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ciii = "13229219";
        $tipo_aa = "en hora";
        $asistenciass = Asistencia::where('ci_a', '=', $ciii)->get();
        $horario = Horario::where('id', '=', '1')->where('name', '=', 'turno mañana')->get();
        //dd($asistenciass, $asistenciass->where('tipo_a','=', "salida"));
       // dd(Asistencia::all());
        //return Horario::all();
        //return $horario;
       
      return Asistencia::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Asistencia $asistencia, Horario $horario)
    {
        //
        $hour = Horario::find($request->id_horario);
       // $hour->fill($request->all());
       //dd($hour);
       $hourComparar= Carbon:: create($hour->start_input);
       $compAtraso=$hourComparar->addMinutes($hour->late_minutes)->format('H:i:s');
       //dd($compAtraso);
        //dd($hour->start_time);
        $fecha = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        //$hora_c = Carbon::now()->hour;
        //$minuto = Carbon::now()->minute;

        //dd($hora);

        $error_schedule = false;
        $message = "errorr";
        $tipo_a = "prueba";
        $estado_a = "falta";
        $turno_a="mañana";
        
        if ($hora >=$hour->start_time&& $hora<=$hour->end_output) {
          $error_schedule=true;
        }
        else{
          return response()->json($message="horas de registro no activos del: $hour->name");
        }
        if ($error_schedule == true) {
          if ($hora >=$hour->start_time&& $hora<=$hour->end_output) {
            $turno_a=$hour->name;
            $message="agregado  $hour->name";

            if ($hora>=$hour->start_time&&$hora<=$hour->end_time){
              $tipo_a = "entrada";
              if ($hora>=$hour->start_time&&$hora<=$compAtraso) {
                $estado_a="en hora";
              }
              if($hora>$compAtraso&& $hora<=$hour->end_input){
                $estado_a="atrasado";
              }
              if($hora>$hour->end_input) {
                return response()->json($message ="horas de registro entradas $hour->name ya cerradas");
              }

            }elseif($hora>=$hour->start_output&&$hora<=$hour->end_output){
                $tipo_a = "salida";
                $message="agregado asistenciA salida  $hour->name";
                $estado_a="salida $hour->name";
              }
              else {
                return response()->json($message="horas de registro $hour->name ya cerradas");
              }
          }
        }

        $asistenciass = Asistencia::where('ci_a', '=', $request->ci_a)->where('turno_a','=', $turno_a)->where('tipo_a','=', $tipo_a)->where('fecha','=', $fecha)->first();
        
         if ($asistenciass!=null) {
           return response()->json($message="el ci $request->ci_a  ya esta registrado en la $tipo_a y en el turno de: $turno_a.");
           //dd($asistenciass);
         }

        //dd($request->all());
        $new=new Asistencia();
        $new->id_horario=$request->id_horario;
        $new->id_persona=$request->id_persona;
        $new->ci_a=$request->ci_a;
        $new->turno_a=$turno_a;
        $new->tipo_a=$tipo_a;
        $new->estado_a=$estado_a;
        $new->fecha=$fecha;
        $new->hora=$hora;
        //dd($new);
        $new->save();
        return response()->json([$new,$message, $turno_a]);
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
        return Asistencia::find($id);
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
        return Asistencia::find($id)->update($request->all());
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
        return Asistencia::destroy($id);
    }
}
