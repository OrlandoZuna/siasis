<?php

namespace Modules\Rrhh\Http\Controllers;

use Modules\Rrhh\Entities\Horario;
use Modules\Rrhh\Entities\HorarioPersona;
use Modules\Rrhh\Entities\GrupoHorario;
use Modules\Rrhh\Entities\GrupoTrabajo;
use Modules\Rrhh\Entities\GrupoPersona;
use Modules\Rrhh\Entities\AssiteciaActual;
use Modules\Rrhh\Entities\Personal;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

//use App\Horario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;

class GrupoHorarioController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horario= Horario::all();
        $personal= GrupoPersona::all();
       // $designado=$personal[1]->attach($horario[0]->id);
        dd($horario[0], Count($personal), $personal[9], $horario[0]->id);
    }

    public function creategrupo( Request $request)
    {
        $horario_id =$request->horario_id;
        $grupo_persona_id=$request->grupo_id;
        $start = $request->start;
        $ends = $request->end;
        $grupo = "no designado";
        $uno = "1";
        $end= Carbon::createFromFormat('Y-m-d',$ends)->addDay()->toDateString();
        $horario= Horario::find($horario_id);
        $nombre_h=$horario->name;
        $diaTrabajo = $horario->work_day;
        $color=$horario->color;
        foreach($grupo_persona_id as $grup){
            $grupo= GrupoTrabajo::find($grup);
            $grupopersonas = GrupoPersona::where('grupo_trabajo_id', '=', $grup)->get();
            $fecha = Carbon::now()->format('Y-m-d H:i:s');
            if ($diaTrabajo <= 1) {
                foreach ($grupopersonas as $person) {
                    //$grupo = "no designado";
                    $dia= GrupoHorario::all();
                    if ($dia==null) {
                        $person->horarios()->attach($horario->id,['grupo_id'=>$grupo->id, 'persona_id'=>$person->personal_id, 'title'=>$nombre_h.' '.$grupo->nombre_trabajo, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'grupo'=>$grupo->nombre_trabajo, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                        $person->save();
                    }
                    else{
                        $diaver= GrupoHorario::where('grupo_persona_id', '=', $person->id)->get();
                        $cont=0;
                        foreach($diaver as $ver) {
                            if ($start >= $ver->start && $end <= $ver->end){
                                $cont= $cont + ($ver->work_day);
                            }
                        }
                        $contasis=$cont + ($diaTrabajo);
                        if ($diaTrabajo <= 1 && $contasis <=1 ) {
                            $existe= GrupoHorario::where('grupo_persona_id', '=', $person->id)->where('horario_id', '=', $horario->id)->where('start', '<=', $start)->where('end', '>=', $end)->first();
                            if ($existe==null) {
                                $person->horarios()->attach($horario->id,['grupo_id'=>$grupo->id, 'persona_id'=>$person->personal_id, 'title'=>$nombre_h.' '.$grupo->nombre_trabajo, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'grupo'=>$grupo->nombre_trabajo, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                                $person->save();
                            }
                            else{
                                return response()->json(["resp"=>250]);
                            }
                        }
                        else {
                            return response()->json(["resp"=>250]);
                        }
                    }
                }
            }
            else{
                if ($diaTrabajo == 2) {
                    foreach ($grupopersonas as $person) {
                        $dia= GrupoHorario::all();
                        if ($dia==null) {
                            $person->horarios()->attach($horario->id,['grupo_id'=>$grupo->id, 'persona_id'=>$person->personal_id, 'title'=>$nombre_h.' '.$grupo->nombre_trabajo, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'grupo'=>$grupo->nombre_trabajo, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                            $person->save();
                        }
                        else{
                            $existe= GrupoHorario::where('grupo_persona_id', '=', $person->id)->where('horario_id', '=', $horario->id)->where('start', '<=', $start)->where('end', '>=', $end)->first();
                            if ($existe==null) {
                                $person->horarios()->attach($horario->id,['grupo_id'=>$grupo->id, 'persona_id'=>$person->personal_id, 'title'=>$nombre_h.' '.$grupo->nombre_trabajo, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'grupo'=>$grupo->nombre_trabajo, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                                $person->save();
                            }
                            else{
                                return response()->json(["resp"=>250]);
                            }
                        }
                    }
                }
            }
        }
        return response()->json(["resp"=>200]);
    }

    public function createDesignacionpersonal( Request $request)
    {
        $horario_id =$request->horario_id;
        $start = $request->start;
        $end = $request->end;
        $personal_id = $request->personal_id;
        $grupo = "no designado";
        $horario= Horario::find($horario_id);
        $grupopersona = GrupoPersona::Where('personal_id', '=', $personal_id)->first();
        if ($grupopersona == null) {
            return response()->json(["resp"=>20000]);
        }
        $person = GrupoPersona::find($grupopersona->id);
        $nombre_h=$horario->name;
        $diaTrabajo = $horario->work_day;
        $color=$horario->color;
        $personal= GrupoPersona::all();
        $fecha = Carbon::now()->format('Y-m-d H:i:s');
        $userdes= GrupoHorario::where('grupo_persona_id', '=', $person->id)->first();
        if ($userdes == null) {
            $person->horarios()->attach($horario->id,['grupo_id'=>$person->grupo_trabajo_id, 'persona_id'=>$person->personal_id, 'title'=>$nombre_h.' '.$person->nonbre_grupotrabajo, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'grupo'=>$person->nonbre_grupotrabajo, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
            $person->save();
            return response()->json(["resp"=>200]);
        }
        else {
            $trabajodehorario = $userdes->work_day;
            $sumtrabajo= $trabajodehorario + $diaTrabajo;
            $diavers= GrupoHorario::where('grupo_persona_id', '=', $person->id)->get();
            foreach($diavers as $ver) {
                if ($start >= $ver->start && $end <= $ver->end && $sumtrabajo > 1) {
                    return response()->json(["resp"=>2000]);
                }
                else {
                    if ($diaTrabajo <= 1) {
                        $dia = GrupoHorario::all();

                        if ($dia==null) {
                            $person->horarios()->attach($horario->id,['grupo_id'=>$person->grupo_trabajo_id, 'persona_id'=>$person->personal_id, 'title'=>$nombre_h.' '.$person->nonbre_grupotrabajo, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'grupo'=>$person->nonbre_grupotrabajo, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                            $person->save();
                            dd('hola desde count');
                        }
                        else{
                            $diaver= GrupoHorario::where('grupo_persona_id', '=', $person->id)->get();
                            $cont=0;
                            foreach($diaver as $vers) {
                                if ($start >= $vers->start && $end <= $vers->end){
                                    $cont= $cont + ($vers->work_day);
                                }
                            }
                            $contasis=$cont + ($diaTrabajo);
                            //dd($contasis);
                            if ($diaTrabajo <=1 && $contasis <= 1 ) {
                                $existe= GrupoHorario::where('grupo_persona_id', '=', $person->id)->where('horario_id', '=', $horario->id)->where('start', '<=', $start)->where('end', '>=', $end)->first();
                                if ($existe==null) {
                                    //dd($contasis);
                                    $person->horarios()->attach($horario->id,['grupo_id'=>$person->grupo_trabajo_id, 'persona_id'=>$person->personal_id, 'title'=>$nombre_h.' '.$person->nonbre_grupotrabajo,
                                    'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'grupo'=>$person->nonbre_grupotrabajo, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                                    $person->save();
                                }
                                else{
                                    return response()->json(["resp"=>250]);
                                }
                            }
                            else {
                                return response()->json(["resp"=>250]);
                            }

                        }
                        return response()->json(["resp"=>200]);
                    }
                }
            }
        }
    }

    public function designacionesPersonal( request $request) {

        $hoursi=Horario::all();
        $id_persona = $request->idPer;
        $actuals=AssiteciaActual::where('id_persona', '=', $id_persona)->get();
        //$actuals= AssiteciaActual::all();
        $fecha= Carbon::now()->format('Y-m-d');
        $title="Asistencias";
        if ($request->ajax()) {
            return response()->json(view('rrhh::scarrhh.AsistenciasActuales.designaciones.vista-designaciones ', compact('title', 'fecha', 'hoursi', 'id_persona', 'actuals'))->render());
        }

    }

        ////////////////////////////////////Designaciones/////////////////////////////


    public function getDesignaciones(Request $request){
        $id=$request->id;
        //dd($id_p);
        $designacion=GrupoHorario::find($id);

        $json[]=[
            "id" => $designacion->id,
            "grupo_persona_id" => $designacion->grupo_persona_id,
            "horario_id" => $designacion->horario_id,
            "grupo_id" => $designacion->grupo_id,
            "personal_id" => $designacion->persona_id,
            "title" => $designacion->title,
            "ci" => $designacion->ci,
            "nombre_h" => $designacion->nombre_h,
            "unidad" => $designacion->grupo,
            "work_day" => $designacion->work_day,
            "start" => $designacion->start,
            "end" => $designacion->end,
            "color" => $designacion->color,
            "created_at" => Carbon::create($designacion->created_at)->format('Y-m-d H:i:s'),
        ];

        //return $json;                         "nombre" => $designacion->nombre,
        return response()->json($json);
        //return response()->json(view('rrhh::scarrhh.vistasHojaCalculo.meses', compact('title', 'fecha', 'meses', 'hoursi','id_persona'))->render());

    }

    public function showgruposdesignados(Request $request)
    {
        $id=$request->id;
        //dd($id);
       $personagrupo = GrupoPersona::Where('personal_id', '=', $id)->first();
       //dd($personagrupo);
       $events = GrupoHorario::where('grupo_persona_id', '=', $personagrupo->id)->get();


        //$events=GrupoPersona::where('personal_id', '=', $id)->get();

       //d($events);
        return response()->json($events);
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
    public function updateDesignacionesgrupopersonal(Request $request)
    {
        $id_edit = $request->id;
        $start = $request->start;
        $end = $request->end;
        //dd($id_edit, $start, $end);
        $designacion = GrupoHorario::find($id_edit);
        $designacion->start = $start;
        $designacion->end = $end;

        $designacion->save();

        return response()->json(["resp"=>200]);
        //return response()->json(["resp"=>250]);
    }


    public function updategeneral(Request $request)
    {

        $start = $request->start;
        $end = $request->end;
        $start1 = $request->start1;
        $ends = $request->end1;
        $horario_id = $request->horario;
        $grupo_id = $request->grupo;
        $end1= Carbon::createFromFormat('Y-m-d',$ends)->addDay()->toDateString();
        //dd($start, $end, $horario_id);
        //$designacion = GrupoPersona::find($id_edit);
        $si = 0;
        $no = 0;
        $cont = 0;

        foreach ($grupo_id as $grupo) {
            $cont ++;
            //$grupos = GrupoPersona::Where('grupo_trabajo_id', '=', $grupo)->get();
            $userdesignado = GrupoHorario::Where('grupo_id', '=', $grupo)->where('horario_id', '=', $horario_id)->where('start','<=',$start)->where('end','>=',$end)->get();
            //dd(Count($userdesignado));
            if (Count($userdesignado)>0) {
                $si = $si + 1;
                foreach($userdesignado as $designacion) {

                    $designacion->start = $start1;
                    $designacion->end = $end1;

                    $designacion->save();


                }
            }
            else {
                $no ++;
            }
        }
        //dd( $si, $no, $cont, $cont2);
        if ($cont == $si) {
            return response()->json([
                "resp"=>200, "grupos"=>$cont, "realizados"=>$si,
                "view"=>view("rrhh::scarrhh.grupohorario.modals.modal-fechas1 ")->render(),
            ]);
        }
        else if ($no == $cont) {
            return response()->json([
                "resp"=>2000, "grupos"=>$cont, "realizados"=>$si,
                "view"=>view("rrhh::scarrhh.grupohorario.modals.modal-fechas1 ")->render(),
            ]);
        }
        else {
            return response()->json([
                "resp"=>250, "grupos"=>$cont, "realizados"=>$si,
                "view"=>view("rrhh::scarrhh.grupohorario.modals.modal-fechas1")->render(),
            ]);
        }

    }

    public function updategeneralverifi(Request $request)
    {

        $start = $request->start;
        $ends = $request->end;
        $horario_id = $request->horario_id;
        $grupo_id = $request->grupo_id;
        $end= Carbon::createFromFormat('Y-m-d',$ends)->addDay()->toDateString();
        //dd($start, $end, $horario_id);
        //$designacion = GrupoPersona::find($id_edit);
        $si = 0;
        $no = 0;
        $cont = 0;

        foreach ($grupo_id as $grupo) {
            $cont ++;
            //$grupos = GrupoPersona::Where('grupo_trabajo_id', '=', $grupo)->get();
            $userdesignado = GrupoHorario::Where('grupo_id', '=', $grupo)->where('horario_id', '=', $horario_id)->where('start','<=',$start)->where('end','>=',$end)->get();
            //dd(Count($userdesignado));
            if (Count($userdesignado)>0) {
                $si = $si + 1;

            }
            else {
                $no ++;
            }
        }
        //dd( $si, $no, $cont, $cont2);
        if ($cont == $si) {
            return response()->json([
                "resp"=>200, "grupos"=>$cont, "realizados"=>$si,
                "view"=>view("rrhh::scarrhh.grupohorario.modals.modal-fechas ", compact("start", 'end', 'horario_id', 'grupo_id'))->render(),
            ]);
        }
        else if ($no == $cont) {
            return response()->json(["resp"=>2000, "grupos"=>$cont, "realizados"=>$si]);
        }
        else {
            return response()->json([
                "resp"=>250, "grupos"=>$cont, "realizados"=>$si,
                "view"=>view("rrhh::scarrhh.grupohorario.modals.modal-fechas", compact("start", 'end', 'horario_id', 'grupo_id'))->render(),
            ]);
        }

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
        //
        $bool= Validator::make($request->all(),[
            "personal_id" => "required",
            "horario_id" => "required",
            "title" => "required",
            "ci" =>"required",
            "nombre_h" => "required",
            "grupo" =>"required",
            "work_day" =>"required",
            "start" => "required",
            "end" =>"required",
            "color" => "required",
        ]);

        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        $desigancion = GrupoPersona::find($request->get('id_edit'));
        $desigancion->fill($request->all());
        $desigancion->save();
        $notify=[
            "type"=>"success",
            "message"=>'la designacion '.$desigancion->title.' se modifico correctamente'
        ];
        return redirect()->back()->with("notify",$notify);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id=$request->id;
        $item=GrupoHorario::find($id);
        $item->delete();
        return response()->json(["resp"=>200]);
    }

    public function deletetegeneral(Request $request)
    {

        $start = $request->start;
        $ends = $request->end;
        $horario_id = $request->horario_id;
        $grupo_id = $request->grupo_id;

        $si = 0;
        $no = 0;
        $cont = 0;

        $end= Carbon::createFromFormat('Y-m-d',$ends)->addDay()->toDateString();

        foreach ($grupo_id as $grupo) {
            $cont ++;
            $userdesignado = GrupoHorario::where('horario_id','=', $horario_id)->where('grupo_id', '=', $grupo)->where('start','<=',$start)->where('end','>=',$end)->get();
            if (Count($userdesignado)>0) {
                $si ++;
                foreach($userdesignado as $designacion) {

                    $item=GrupoHorario::find($designacion->id);
                    $item->delete();
                }
            }
            else {
                $no ++;
            }
        }
        if ($cont == $si) {
            return response()->json(["resp"=>200, "grupos"=>$cont, "realizados"=>$si]);
        }
        else if ($no == $cont) {
            return response()->json(["resp"=>2000, "grupos"=>$cont, "realizados"=>$si]);
        }
        else {
            return response()->json(["resp"=>250, "grupos"=>$cont, "realizados"=>$si]);
        }

    }
}
