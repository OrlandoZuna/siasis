<?php

namespace Modules\Rrhh\Http\Controllers;

use Modules\Rrhh\Entities\Horario;
use Modules\Rrhh\Entities\HorarioPersona;
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

class HorarioPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horario= Horario::all();
        $personal= Personal::all();
       // $designado=$personal[1]->attach($horario[0]->id);
        dd($horario[0], Count($personal), $personal[9], $horario[0]->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $horario_id =$request->horario_id;
        $start = $request->start;
        $ends = $request->end;
        $unidad = "no designado";
        $uno = "1";
        $end= Carbon::createFromFormat('Y-m-d',$ends)->addDay()->toDateString();
       // @include('Componentes.simpleInput',['name'=>'fecha_fin','label'=>'Fecha fin','type'=>'date','value'=>\Carbon::createFromFormat('Y-m-d',$condicionComercial->fecha_fin )->addDay()->toDateTimeString()]);
        //dd($end);

        $horario= Horario::find($horario_id);
        //dd($horario->id);
        $nombre_h=$horario->name;
        $diaTrabajo = $horario->work_day;
        $color=$horario->color;
        //dd($horario,  $diaTrabajo );
        $personal= Personal::all();
        $fecha = Carbon::now()->format('Y-m-d H:i:s');
        
        // $personal->horarios()->attach(4);
        // return $personal->horarios;
        // $personal->save();

        //dd($horario_id, $start, $end);

        if ($diaTrabajo <= 1) {
            foreach ($personal as $person) {
                //$unidad = "no designado";
                $dia= HorarioPersona::all();

                if ($dia==null) {
                    $person->horarios()->attach($horario->id,['title'=>$nombre_h, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'unidad'=>$unidad, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                    $person->save();
                }
                else{
                    $diaver= HorarioPersona::where('personal_id', '=', $person->id)->get();
                    $cont=0;
                    foreach($diaver as $ver) {
                        if ($start >= $ver->start && $end <= $ver->end){
                            $cont= $cont + ($ver->work_day);
                        }
                    }
                    $contasis=$cont + ($diaTrabajo); 
                    //dd($contasis);
                    if ($diaTrabajo <= 1 && $contasis <=1 ) {
                        $existe= HorarioPersona::where('personal_id', '=', $person->id)->where('horario_id', '=', $horario->id)->where('start', '<=', $start)->where('end', '>=', $end)->orWhere('end','>=',$start)->first();
                        if ($existe==null) {
                            $person->horarios()->attach($horario->id,['title'=>$nombre_h, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'unidad'=>$unidad, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                            $person->save();
                        }
                        else{
                            return response()->json(["resp"=>250]);
                        }

                    }
                    else {
                        $existe= HorarioPersona::where('personal_id', '=', $person->id)->where('horario_id', '=', $horario->id)->where( 'start','<=',$start)->where('end','>=',$end)->orWhere('end','>=',$start)->first();
                        //dd($existe, $contasis);
                        if ($existe==null) {
                            //Reservation::where('reservation_from', '>=', Carbon::createFromDate(1975, 5, 21);) ->where('reservation_from', '<=', Carbon::createFromDate(2015, 5, 21);)->get();
                            $person->horarios()->where('start','<=',$start)->where('end','>=',$end);
                            dd($person->horarios()->where('start','<=',$start)->where('end','>=',$end));
                            $person->horarios()->attach($horario->id,['title'=>$nombre_h, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'unidad'=>$unidad, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                            $person->save();
                        }
                        else{
                            
                            return response()->json(["resp"=>250]); 
                        }
                    }

                }
            }
            return response()->json(["resp"=>200]);
        }
        
    }

    public function createDesignacionpersonal( Request $request)
    {
        $horario_id =$request->horario_id;
        $start = $request->start;
        $end = $request->end;
        
        $personal_id = $request->personal_id;
        $unidad = "no designado";
        //dd($horario_id, $start, $end, $personal_id);
        $horario= Horario::find($horario_id);
        $person = Personal::find($personal_id);
        $nombre_h=$horario->name;
        $diaTrabajo = $horario->work_day;
        $color=$horario->color;

        $personal= Personal::all();
        $fecha = Carbon::now()->format('Y-m-d H:i:s');

        
        $userdes= HorarioPersona::where('personal_id', '=', $person->id)->first();

        //dd($sumtrabajo);
        if ($userdes == null) {
            $person->horarios()->attach($horario->id,['title'=>$nombre_h, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'unidad'=>$unidad, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
            $person->save();
            return response()->json(["resp"=>200]);
        }
        else {
            $trabajodehorario = $userdes->work_day;
            $sumtrabajo= $trabajodehorario + $diaTrabajo;
            $diavers= HorarioPersona::where('personal_id', '=', $personal_id)->get();
            //dd($diavers);
            foreach($diavers as $ver) {

                if ($start >= $ver->start && $end <= $ver->end && $sumtrabajo > 1) {
                    return response()->json(["resp"=>2000]);
                    dd('desde fechas');
                }
                else {
                    if ($diaTrabajo <= 1) {
                        $dia = HorarioPersona::all();
                    
                        if ($dia==null) {
                            $person->horarios()->attach($horario->id,['title'=>$nombre_h, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'unidad'=>$unidad, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                            $person->save();
                            dd('hola desde count');
                        }
                        else{
                            $diaver= HorarioPersona::where('personal_id', '=', $personal_id)->get();
                            $cont=0;
                            foreach($diaver as $vers) {
                                if ($start >= $vers->start && $end <= $vers->end){
                                    $cont= $cont + ($vers->work_day);  
                                }
                            }
                            $contasis=$cont + ($diaTrabajo);
                            //dd($contasis);
                            if ($diaTrabajo <=1 && $contasis <= 1 ) {
                                $existe= HorarioPersona::where('personal_id', '=', $person->id)->where('horario_id', '=', $horario->id)->where( 'start','<=',$start)->where('end','>=',$end)->first();
                                if ($existe==null) {
                                    //dd($contasis);
                                    $person->horarios()->attach($horario->id,['title'=>$nombre_h, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'unidad'=>$unidad, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                                    $person->save();
                                }
                                else{
                                    return response()->json(["resp"=>250]);
                                }
                            
                            }
                            else {
                                $existe= HorarioPersona::where('personal_id', '=', $person->id)->where('horario_id', '=', $horario->id)->first();
                                if ($existe==null) {
                                    $person->horarios()->detach();
                                    $person->horarios()->attach($horario->id,['title'=>$nombre_h, 'ci'=>$person->ci, 'nombre_h'=>$nombre_h, 'unidad'=>$unidad, 'work_day' => $diaTrabajo, 'start' => $start, 'end' => $end, 'color'=>$color ]);
                                    $person->save();
                                }
                                else{
                                
                                    return response()->json(["resp"=>250]); 

                                }
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
        $persona = Personal::find($id_persona);
        $actuals=AssiteciaActual::where('id_persona', '=', $id_persona)->get();
        //$actuals= AssiteciaActual::all();
        $fecha= Carbon::now()->format('Y-m-d');
        $title="DESIGNACION DE HORARIO DE: ";
        if ($request->ajax()) {
            return response()->json(view('rrhh::scarrhh.AsistenciasActuales.designaciones.vista-designaciones ', compact('title', 'fecha', 'hoursi', 'id_persona', 'actuals', 'persona'))->render());
        }

    }

        ////////////////////////////////////Designaciones/////////////////////////////


    public function getDesignaciones(Request $request){
        $id=$request->id;
        //dd($id_p);
        $designacion=HorarioPersona::find($id);

        $json[]=[
            "id" => $designacion->id,
            "personal_id" => $designacion->personal_id,
            "horario_id" => $designacion->horario_id,
            "title" => $designacion->title,
            "ci" => $designacion->ci,
            "nombre_h" => $designacion->nombre_h,
            "unidad" => $designacion->unidad,
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

    public function showdesiganaciones(HorarioPersona $horaripersona, Request $request)
    {
        $id=$request->id;
       // dd($id);


        $events=HorarioPersona::where('personal_id', '=', $id)->get();

       // dd($events);
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
    public function updateDesignaciones(Request $request)
    {
        $id_edit = $request->id;
        $start = $request->start;
        $end = $request->end;
        //dd($id_edit, $start, $end);
        $designacion = HorarioPersona::find($id_edit);
        $designacion->start = $start;
        $designacion->end = $end;
        
        $designacion->save();

        return response()->json(["resp"=>200]);
        //return response()->json(["resp"=>250]); 
    }


    public function updategeneral(Request $request)
    {
        
        $start = $request->start;
        $ends = $request->end;
        $horario_id = $request->horario_id;
        $end= Carbon::createFromFormat('Y-m-d',$ends)->addDay()->toDateString();
        //dd($start, $end, $horario_id);
        //$designacion = HorarioPersona::find($id_edit);
        $userdesignado = HorarioPersona::where('horario_id','=', $horario_id)->where('start','<=',$start)->where('end','>=',$end)->get();
        //dd($id_edit, $start, $end);
        //dd(Count($userdesignado));
        if (Count($userdesignado)>0) {
            foreach($userdesignado as $designacion) {

                $designacion->start = $start;
                $designacion->end = $end;
                
                $designacion->save();
    
            }
            return response()->json(["resp"=>200]);
        }
        else {
            return response()->json(["resp"=>250]);
        }

        //return response()->json(["resp"=>250]); 
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
            "unidad" =>"required",
            "work_day" =>"required",
            "start" => "required",
            "end" =>"required", 
            "color" => "required",
        ]);

        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        $desigancion = HorarioPersona::find($request->get('id_edit'));
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
        $item=HorarioPersona::find($id);
        $item->delete();
        return response()->json(["resp"=>200]);
    }

    public function deletetegeneral(Request $request)
    {
        
        $start = $request->start;
        $ends = $request->end;
        $horario_id = $request->horario_id;
        $end= Carbon::createFromFormat('Y-m-d',$ends)->addDay()->toDateString();
       // dd($start, $end);    
        //dd($start, $end, $horario_id);
        //$designacion = HorarioPersona::find($id_edit);
        $userdesignado = HorarioPersona::where('horario_id','=', $horario_id)->where('start','<=',$start)->where('end','>=',$end)->get();
        //dd($id_edit, $start, $end);
        //dd(Count($userdesignado));
        if (Count($userdesignado)>0) {
            foreach($userdesignado as $designacion) {
                //dd($designacion->id);
                //$id=$request->id;
                $item=HorarioPersona::find($designacion->id);
                $item->delete();
    
            }
            return response()->json(["resp"=>200]);
        }
        else {
            return response()->json(["resp"=>250]);
        }

        //return response()->json(["resp"=>250]); 
    }
}
