<?php

namespace Modules\Rrhh\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\GrupoTrabajo;
use App\Unidad;
use Jenssegers\Date\Date;
use App\Pedido;
use Modules\Presupuestos\Entities\Bitacora;
use App\Gestion;
use App\AdmiFlujo;
use App\Detalle;
use Modules\Almacen\Entities\File;
use Modules\Almacen\Entities\Control;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\FLujo;
use App\Flujodetalle;
use Carbon\Carbon;

use Modules\Rrhh\Entities\Horario;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;
class GrupoTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $grupotrabajo = GrupoTrabajo::paginate(12);
        $title= "GRUPOS DE TRABAJO";
        if ($request->ajax()) {
            return [
                'list_grupotrabajo' => view('rrhh::scarrhh.grupotrabajo.indexrender', compact('grupotrabajo'))->render(),
                'next_page' => $grupotrabajo->nextPageUrl()
            ];
        }
        else {
            return view('rrhh::scarrhh.grupotrabajo.index', compact('grupotrabajo', 'title'));
        }

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
        $trabajo=new GrupoTrabajo($request->all());

        $bool= Validator::make($request->all(),[
            "nombre_trabajo" => "required",
        ]);
        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        $trabajo->save();
        $notify=[
            "type"=>"success",
            "message"=>'El Horario '.$trabajo->nombre_trabajo.' a sido registrado correctamente'
        ];
        return redirect()->back()->with("notify",$notify);
    }

    public function update(Request $request)
    {
        $id_g= $request->id_grupotrabajo;
        $id_dg = $request->id_dg;
        
        $bool= Validator::make($request->all(),[
            "nombre_trabajo" => "required",
        ]);
        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        $trabajo = GrupoTrabajo::find($request->get('id_edit'));
        $trabajo->fill($request->all());
        $trabajo->save();
        $notify=[
            "type"=>"success",
            "message"=>'El Horario '.$trabajo->nombre_trabajo.' a sido registrado correctamente'
        ];
        return redirect()->back()->with("notify",$notify);
    }

    public function getGrupo(Request $request){
        $id=$request->id;

        $trabajo=GrupoTrabajo::find($id);

        $json[]=[
            "id" => $trabajo->id,
            "nombre_trabajo" => $trabajo->nombre_trabajo,
        ];
        return $json;
    }

    public function deleteGrupo(Request $request){
        $id=$request->id;
        $item=GrupoTrabajo::find($id);
        $item->delete();
        return response()->json(["resp"=>200]);
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
