<?php

namespace Modules\Rrhh\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\TipoContrato;
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

class TipoContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipocontrato = TipoContrato::all();
        $title= "TIPOS DE CONTRATOS";
        return view('rrhh::scarrhh.tipocontrato.index', compact('tipocontrato', 'title'));
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
        $contrato=new TipoContrato($request->all());

        $bool= Validator::make($request->all(),[
            "nombre_tipo_contrato" => "required",
            "tipo" => "required",
        ]);
        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        $contrato->save();
        $notify=[
            "type"=>"success",
            "message"=>'El tipo contrato '.$contrato->nombre_tipo_contrato.' a sido registrado correctamente'
        ];
        return redirect()->back()->with("notify",$notify);
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
    public function update(Request $request)
    {
        // $id_g= $request->id_grupotrabajo;
        // $id_dg = $request->id_dg;
        
        $bool= Validator::make($request->all(),[
            "nombre_tipo_contrato" => "required",
            "tipo" => "required",
        ]);
        if($bool->fails()){
            return redirect()->back()->withErrors($bool->errors());
        }
        $contrato = TipoContrato::find($request->get('id_edit'));
        $contrato->fill($request->all());
        $contrato->save();
        $notify=[
            "type"=>"success",
            "message"=>'El tipo contrato '.$contrato->nombre_tipo_contrato.' a sido modificado correctamente'
        ];
        return redirect()->back()->with("notify",$notify);
    }

    public function gettipocontrato(Request $request){
        $id=$request->id;

        $contrato=TipoContrato::find($id);

        $json[]=[
            "id" => $contrato->id,
            "nombre_tipo_contrato" => $contrato->nombre_tipo_contrato,
            "tipo" => $contrato->tipo,
        ];
        return $json;
    }

    public function deletetipocontrato(Request $request){
        $id=$request->id;
        $item=TipoContrato::find($id);
        $item->delete();
        return response()->json(["resp"=>200]);
    }

}
