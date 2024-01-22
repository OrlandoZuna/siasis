<?php

namespace App\Http\Controllers;

use App\Unidad;
use Illuminate\Http\Request;
use App\Estructuraprogramatica;
use App\Gestion;
use App\Flujo;
use App\Flujodetalle;
class UnidadController extends Controller
{
    public function index()
    {
      //dd('hola');
       $title='Registro De Unidades';
       $unimayor=Unidad::where('tipo','Unidad Mayor')->get();
       $unidepe=Unidad::where('tipo','Unidad Dependiente')->get();
       $uniselec=Unidad::all();
       //dd($unimayor);
       return view('admin.unidades.index',compact('title','unimayor','unidepe','uniselec'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        if($request->tipo==0)
        {
            //dd('uniad mayor');
            $new =new Unidad();
            $new->unidad_id=0;
            $new->tipo='Unidad Mayor';
            $new->name=$request->name;
            $new->user_id=$request->user_id;
            $new->abreviado=$request->abreviado;
            $new->save();
        }
        else
        {
            //dd('unidad menor');
            $new =new Unidad();
            $new->unidad_id=$request->unidad_id;
            $new->tipo='Unidad Dependiente';
            $new->name=$request->name;
            $new->user_id=$request->user_id;
            $new->abreviado=$request->abreviado;
            $new->save();
        }

        $notify=[
            "type"=>"success",
            "message"=>"Se registro exitosamente"
        ];
        return redirect()->back()->with("notify",$notify);
    }


    public function academicas()
    {
       $title='Registro De Unidades';
       $unimayor=Unidad::where('tipo','Facultad')->get();
       $unidepe=Unidad::where('tipo','Carrera')->get();
       $uniselec=Unidad::all();
       //dd($unimayor);
       return view('admin.unidades.academicas',compact('title','unimayor','unidepe','uniselec'));
    }
    public function save(Request $request)
    {
        //dd($request->all());
        if($request->tipo==0)
        {
            //dd('uniad mayor');
            $new =new Unidad();
            $new->unidad_id=0;
            $new->tipo='Facultad';
            $new->name=$request->name;
            $new->user_id=$request->user_id;
            $new->abreviado=$request->abreviado;
            $new->save();
        }
        else
        {
            //dd('unidad menor');
            $new =new Unidad();
            $new->unidad_id=$request->unidad_id;
            $new->tipo='Carrera';
            $new->name=$request->name;
            $new->user_id=$request->user_id;
            $new->abreviado=$request->abreviado;
            $new->save();
        }

        $notify=[
            "type"=>"success",
            "message"=>"Se registro exitosamente"
        ];
        return redirect()->back()->with("notify",$notify);
    }

    public function flujo()
    {
        //dd('flujo');
        $title='administracion de flujos';
        $unidades=Unidad::get();
        $gestion=Gestion::get()->last();
        $flujo=Flujo::get();
        //dd($flujo);
        return view('admin.flujos.index',compact('title','unidades','gestion','flujo'));
    }
    public function saveflujo(Request $request)
    {
       // dd($request->all());
        $unid=$request->unidad_id;
        //dd($unid);
        $new=new Flujo();
        $new->gestion_id=$request->gestion_id;
        $new->name=$request->flujo;
        //dd($new);
        $new->save();
        //dD($new);

        for($i=0;isset($unid) && $i<count($unid);$i++)
        {
            $pop=Unidad::findorfail($unid[$i]);
           // dd($pop);
            $new1= new Flujodetalle();
            $new1->flujo_id=$new->id;
            $new1->unidad_id=$unid[$i];
            $new1->name=$pop->name;
            $new1->save();
        }
        $notify=[
            "type"=>"success",
            "message"=>"Se registro exitosamente el flujo"
        ];
        return redirect()->back()->with("notify",$notify);
    }
    public function flujogestion()
    {
        $title='administarcion de gestion de flujos';
        $flujo=Flujo::get();
        $gestion=Gestion::get();
        return view('adminflujo.index',compact('title','flujo','gestion'));
    }
    public function gestionflujo(Request $request)
    {
        //dd($request->all());
        $gestion=Gestion::findOrFail($request->gestion_id);
        $flujos=$request->flujo_id;
        $gestion->tiene()->sync($flujos);
        $notify=[
            "type"=>"success",
            "message"=>"la sincronizacion de los  flujos"
        ];
        return redirect()->back()->with("notify",$notify);
    }
    public function consulflujouni(Request $request)
    {

      $aux=Flujo::findOrFail($request->id);
      $res=Flujodetalle::where('flujo_id',$aux->id)->get();
      return response()->json($res);
    }
    public function ordenflu(Request $request)
    {
        $message=[
            'posicion.*.required'=>'El campo es requerido',
            'posicion.*.numeric'=>'El campo debe ser numérico'
        ];
        $request->validate([
            'posicion.*'=>'required|numeric',
            'identifi.*'=>'required|numeric'
        ],$message);
        foreach ($request->identifi as $key => $pos) {
           $admup=Flujodetalle::find($pos);
           $admup->orden=$request->posicion[$key];
           $admup->save();
        }
        return response()->json([
            'messageCorrect'=>'Se organizó el flujo correctamente'
        ]);
    }
}
