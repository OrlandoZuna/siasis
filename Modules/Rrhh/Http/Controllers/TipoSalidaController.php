<?php

namespace Modules\Rrhh\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\TipoSalida;
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
use Illuminate\Support\Facades\Validator;

class TipoSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposalida = TipoSalida::all();
        $title= "TIPOS DE SALIDAS";
        return view('rrhh::scarrhh.tiposalida.index', compact('tiposalida', 'title'));
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
        $salida=new TipoSalida($request->all());

        $bool= Validator::make($request->all(),[
            "nombre_tiposalida" => "required",
            "bonote" => "required",
        ]);
        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        $salida->save();
        $notify=[
            "type"=>"success",
            "message"=>'El tipo salida '.$salida->nombre_tiposalida.' a sido registrado correctamente'
        ];
        return redirect()->back()->with("notify",$notify);
    }

    public function update(Request $request)
    {
        $id_g= $request->id_grupotrabajo;
        $id_dg = $request->id_dg;
        
        $bool= Validator::make($request->all(),[
            "nombre_tiposalida" => "required",
            "bonote" => "required",
        ]);
        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        $salida = TipoSalida::find($request->get('id_edit'));
        $salida->fill($request->all());
        $salida->save();
        $notify=[
            "type"=>"success",
            "message"=>'El tipo salida '.$salida->nombre_tiposalida.' a sido modificado correctamente'
        ];
        return redirect()->back()->with("notify",$notify);
    }

    public function gettiposalida(Request $request){
        $id=$request->id;

        $salida=TipoSalida::find($id);

        $json[]=[
            "id" => $salida->id,
            "nombre_tiposalida" => $salida->nombre_tiposalida,
            "bonote" => $salida->bonote,
        ];
        return $json;
    }

    public function deletetiposalida(Request $request){
        $id=$request->id;
        $item=TipoSalida::find($id);
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
