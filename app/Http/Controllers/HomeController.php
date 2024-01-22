<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Unidad;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title='inicio';
         //$environment = config('app.echoport');
        return view('home',compact('title'));
    }
     public function realtime(){
        $title='realtime';
       //$environment = config('app.echoport');
        return view('realtime',compact('title'));
    }
    public function realprueba(){
        event(new PublicMessage());
        dd('Publicando evento publico');
    }
    public function realprivate(){
        event(new PrivateMessage(Auth::user()));
        dd('Este mensaje es privado');
    }
    public function savecbnpuck(Request $request){
     //dd($request->all());

      $user = Auth::user();
      //dd($user);
      $up=User::find($user->id);
      $up->unidad_id=$request->unidad_;
      $up->save();

      $rr=$up->unidad_id;
      switch($rr){
        case "4":
            $url="presupuestos/bandeja";
          break;
        case "5":
          $url="daf/controldaf";
          break;
        case "7":
          $url="almacen/despacho";
          break;
        case "40":
          $url="pedido/create";
          break;
      }
      return response()->json($url);
    }

}
