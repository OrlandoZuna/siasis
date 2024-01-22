<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Security;
use Illuminate\Support\Facades\Auth;
use App\Mifirma;
use QrCode;
use Carbon\Carbon;
use App\User;
use App\LogBig;
class ProfileController extends Controller
{

  public function index()
  {
    $users = Auth::user();
    $title = "perfil";
    $pregunta = Security::all();
    $fecha = Carbon::now()->format('Y-m-d');
    $mifi = Mifirma::where('user_id', $users->id)->first();
    $digi = $users->name;
    //dd($mifi);
    return view('admin.user.profile', compact('title', 'pregunta', 'mifi', 'users', 'digi', 'fecha'), ['user'  =>  \Auth::user()]);
  }

  public function update(Request $request, $id)
  {

    $up_user = User::find($id);

    $up_user->name = $request->name;
    $up_user->email = $request->email;
    $pa = $request->password_actual;
    if (\Hash::check($pa, \Auth::user()->password)) {
      $up_user->password = bcrypt($request->password_nuevo);
    } else {
      $notify = [
        'type' => 'error',
        'message' => 'la contraseña colacada esta mal',
      ];
      return redirect()->route("home")->with("notify", $notify);
    }

    $up_user->save();
    $notify = [
      'type' => 'success',
      'message' => 'se edito sus datos',
    ];
    return redirect()->route("home")->with("notify", $notify);
  }
  public function millave(Request $request)
  {
    //dd($request->all());
    $us = User::findOrfail($request->user);
    //dd($us);
    $usci = $us->Personal->ci;
    //dd($usci);
    $llave = $usci . ' ' . $uno = $request->respuesta_unica;
    //dd($llave);
    $uno = $request->respuesta_unica;
    $dos = $request->respuesta_recuperacion;
    if ($uno == $dos) {
      //dd('iguales');
      $llave =
        $millave = new Mifirma();
      $millave->user_id = $request->user;
      $millave->securiti_id = $request->pregunta;
      $millave->respuesta_unica = bcrypt($llave);
      $millave->respuesta_recuperacion = $request->respuesta_recuperacion;
      $millave->vali_ini = $request->vali_ini;
      $millave->vali_fin = $request->vali_fin;
      $millave->estado = 'unica';
      $millave->save();

      $log = new LogBig();
      $log->mifirma_id = $millave->id;
      $log->fecha = Carbon::now()->format('Y-m-d');
      $log->llave_anterior = $millave->respuesta_unica;
      $log->llave_actual = $millave->respuesta_unica;
      $log->estado_anterior = $millave->estado;
      $log->estado_actual = $millave->estado;
      //dd($log);
      $log->save();

      $notify = [
        'type' => 'success',
        'message' => 'se genero  su  llave es valido hasta el  ' . $millave->vali_fin,
      ];
      return redirect()->route("profile.index")->with("notify", $notify);
    } else {
      $notify = [
        'type' => 'error',
        'message' => 'las respuesta no coinciden',
      ];
      return redirect()->route("profile.index")->with("notify", $notify);
    }
  }

  public function actualizar(Request $request)
  {
    //dd($request->all());
    $up = Mifirma::findOrfail($request->edit_mifi);
    $ante = $up->respuesta_unica;
    $status = $up->estado;
    //dd($up);
    if ($up->respuesta_recuperacion == $request->anterior) {
      $us = User::findOrfail($up->user_id);
      //dd($us);
      $usci = $us->Personal->ci;
      //dd($usci);
      $llave = $usci . ' ' . $uno = $request->actual;
      $up->respuesta_unica = bcrypt($llave);
      $up->respuesta_recuperacion = $request->actual;
      $up->estado = "cambiado";
      $up->save();
      $log = new LogBig();
      $log->mifirma_id = $up->id;
      $log->fecha = Carbon::now()->format('Y-m-d');
      $log->llave_anterior = $ante;
      $log->llave_actual = $up->respuesta_unica;
      $log->estado_anterior = $status;
      $log->estado_actual = $up->estado;
      //dd($log);
      $log->save();

      $notify = [
        'type' => 'success',
        'message' => 'Se actualiso su llave'
      ];
      return redirect()->route("profile.index")->with("notify", $notify);
    } else {
      $notify = [
        'type' => 'error',
        'message' => 'las respuesta no coinciden',
      ];
      return redirect()->route("profile.index")->with("notify", $notify);
    }
  }

  public function verlogfir(Request $request)
  {
    //dd($request->all());
    $setings = Mifirma::findOrfail($request->log_id);
    //dd($setings);
    $title = 'log de firmas';
    $ca1 = $setings->respuesta_recuperacion;
    $ca2 = $request->respuesta;
    if ($ca1 == $ca2) {
      //dd('si');
      $log = LogBig::where('mifirma_id', $setings->id)->get();
      //dd($log);
      return view('admin.user.log', compact('title', 'log'));
    } else {
      $notify = [
        'type' => 'error',
        'message' => 'las respuesta no coinciden',
      ];
      return redirect()->route("profile.index")->with("notify", $notify);
    }
  }
  public function renobar(Request $request)
  {
    //dd($request->all());
    $reno = Mifirma::findOrfail($request->id_renovar);
    //dd($reno);
    //datos anteriores
    $anterior = $reno->estado;
    $anterior1 = $reno->respuesta_unica;

    $reno->vali_ini = $request->fecha_ini;
    $reno->vali_fin = $request->fecha_fin;
    $reno->estado = 'renovado';
    $reno->save();

    //log llave
    $log = new LogBig();
    $log->mifirma_id = $reno->id;
    $log->fecha = Carbon::now()->format('Y-m-d');
    $log->llave_anterior = $anterior1;
    $log->llave_actual = $reno->respuesta_unica;
    $log->estado_anterior = $anterior;
    $log->estado_actual = $reno->estado;
    //dd($log);
    $log->save();
    $notify = [
      'type' => 'success',
      'message' => 'Se renovo su llave   ' . $reno->vali_fin
    ];
    return redirect()->route("profile.index")->with("notify", $notify);
  }
  
    public function firmar(Request $request)
    {
        
       $res=$request->res;
        $dato=Mifirma::where('user_id',Auth::user()->id)->first();
        if($res == $dato->respuesta_recuperacion)
        {
            $response='si';
        }else{
            $response='no';
        }
        return response()->json($response);
    }
}