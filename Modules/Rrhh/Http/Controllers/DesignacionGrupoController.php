<?php

namespace Modules\Rrhh\Http\Controllers;

use Modules\Rrhh\Entities\Horario;
use Modules\Rrhh\Entities\GrupoTrabajo;
use Modules\Rrhh\Entities\HorarioPersona;
use Modules\Rrhh\Entities\AssiteciaActual;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\GrupoPersona;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

//use App\Horario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;

class DesignacionGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $personal = Personal::all();
        $grupotrabajo = GrupoTrabajo::all();
        $designaciongrupo = GrupoPersona::paginate(12);

        $title="DESIGNACION DE GRUPO";
        if($request->ajax()){
            $designaciongrupo = GrupoPersona::paginate(12);
            return [
                'list_desiganciones'=> view('rrhh::scarrhh.designaciongrupo.indexrender')->with(compact('designaciongrupo', 'personal', 'grupotrabajo'))->render(),
                'next_page' => $designaciongrupo->nextPageUrl()
            ];
        }
        else {
            return view('rrhh::scarrhh.designaciongrupo.index', compact('designaciongrupo', 'title', 'personal', 'grupotrabajo'));
        }

    }

    public function store(Request $request)
    {
        $id_grupotrabajo = $request->id_grupotrabajo;

        $ci = $request->ci;
        $grupotrabajo = GrupoTrabajo::find($id_grupotrabajo);
        $persona = Personal::where('ci', '=', $ci)->first();
        if ($persona != null) {
            $person = Personal:: find($persona->id);
            $existeDesignacion= GrupoPersona::where('personal_id', '=', $person->id)->first();
            if ($existeDesignacion == null) {
                $person->grupotrabajos()->attach($grupotrabajo->id, ['ci'=>$person->ci, 'nombre_persona'=>$person->nombres.' '.$person->apellido_paterno.' '.$person->apellido_materno, 'nonbre_grupotrabajo'=> $grupotrabajo->nombre_trabajo]);
                $person->save();
                $designaciongrupo= GrupoPersona::where('personal_id', '=', $person->id)->first();
                return response()->json(["resp"=>200, "person"=>$designaciongrupo]);
            }
            else {
                return response()->json(["resp"=>250]);
            }
        }
        else {
            return response()->json(["resp"=>2000]);
        }
    }

    public function designargrupodesdeindexpersonal(Request $request)
    {
        $id_grupotrabajo = $request->id_g;
        $id_p = $request->id_p;
        $grupotrabajo = GrupoTrabajo::find($id_grupotrabajo);
        $persona = Personal::where('id', '=', $id_p)->first();
        if ($persona != null) {
            $person = Personal:: find($persona->id);
            $existeDesignacion= GrupoPersona::where('personal_id', '=', $person->id)->first();
            if ($existeDesignacion == null) {
                $person->grupotrabajos()->attach($grupotrabajo->id, ['ci'=>$person->ci, 'nombre_persona'=>$person->nombres.' '.$person->apellido_paterno.' '.$person->apellido_materno, 'nonbre_grupotrabajo'=> $grupotrabajo->nombre_trabajo]);
                $person->save();
                $designaciongrupo= GrupoPersona::where('personal_id', '=', $person->id)->first();
                return response()->json(["resp"=>200, "person"=>$designaciongrupo]);
            }
            else {
                return response()->json(["resp"=>250]);
            }
        }
        else {
            return response()->json(["resp"=>2000]);
        }
    }

    public function store1(Request $request)
    {
            $designaciongrupo=new GrupoPersona($request->all());
            $bool= Validator::make($request->all(),[
                "id_persona" => "required",
                "id_grupotrabajo" => "required",
                "ci" => "required",
                "nonbre_grupotrabajo" => "required",
            ]);
            if($bool->fails()){
                return redirect()->back()->withErrors($bool->errors());
            }
            $designaciongrupo->save();
            $notify=[
                "type"=>"success",
                "message"=>'El GrupoPersona '.$designaciongrupo->nonbre_grupotrabajo.' a sido registrado correctamente'
            ];
            return redirect()->back()->with("notify",$notify);
    }

    public function update(Request $request)
    {
        $id_g = $request->id_grupotrabajo;
        $id_dg = $request->id_dg;
        $grupo = GrupoTrabajo::find($id_g);
        $nombre_g = $grupo->nombre_trabajo;

        $grupoD = GrupoPersona::find($id_dg);

        $grupoD->grupo_trabajo_id = $grupo->id;
        $grupoD->nonbre_grupotrabajo = $nombre_g;

        $grupoD->save();

        return response()->json(["resp"=>200, "person"=>$grupoD]);

    }

    public function getDeGrupo(Request $request){
        $id=$request->id;

        $designaciongrupo=GrupoPersona::find($id);

        $json[]=[
            "id" => $designaciongrupo->id,
            "personal_id" => $designaciongrupo->nombre_persona,
            //"personal_id" => $designaciongrupo->personal_id,
            "grupo_trabajo_id" => $designaciongrupo->grupo_trabajo_id,
            "ci" => $designaciongrupo->ci,
            "nonbre_grupotrabajo" => $designaciongrupo->nonbre_grupotrabajo,
        ];
        return $json;
    }

    public function deleteDeGrupo(Request $request){
        $id=$request->id;
        $item=GrupoPersona::find($id);
        $item->delete();
        return response()->json(["resp"=>200]);
    }
}
