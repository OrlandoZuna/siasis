<?php

namespace Modules\Valhalla\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Valhalla\Entities\Portada;
use Modules\Valhalla\Entities\Aplication;

class PortadaController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Renderable
   */
  public function index()
  {
    $title = 'Portal SIADSIS';
    $info = Portada::first();
    //dd($info);
    if ($info == null) {
      //dd('nuevo');
      $new = new Portada();
      $new->objetivo = '';
      $new->descripcion = '';
      $new->save();
    }
    return view('valhalla::server.index', compact('title', 'info'));
  }
  public function create(Request $request)
  {
    //dd($request->all());
    $info = Portada::first();
    $info->objetivo = $request->objetivo;
    $info->descripcion = $request->descripcion;
    $info->save();
    $notify = [
      "type" => "success",
      "message" => "se actualizo su portada"
    ];
    return redirect()->back()->with("notify", $notify);
  }
  public function store(Request $request)
  {
    //dd($request->all());
    $info = Portada::first();
    if ($request->tipo == 'logo') {
      $info->logo = $request->imagen;
      $info->save();
    } else {
      $info->fondo = $request->imagen;
      $info->save();
    }
    $notify = [
      "type" => "success",
      "message" => "se actualizo su portada"
    ];
    return redirect()->back()->with("notify", $notify);
  }

  /**
   * Show the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function show()
  {

    $app = Aplication::where('tipo', 'app')->get();
    $webs = Aplication::where('tipo', 'website')->get();

    $title = 'admin publicaciones';
    return view('valhalla::server.contenido.index', compact('title', 'app', 'webs'));
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Renderable
   */
  public function edit(Request $request)
  {
    $file = $request->archivo;
    //dd($request->all());
    if ($file == null) {
      $nombre = '';
    } else {
      $nombre =  time() . "_" . $file->getClientOriginalName();
      \Storage::disk('valhalla')->put($nombre,  \File::get($file));
    }


    $new = new Aplication();
    $new->icono = $request->imagen;
    $new->nombre = $request->nombre;
    $new->enlace = $request->enlace;
    $new->tipo = $request->tipo;
    $new->publicacion = $request->stado;
    $new->archivo = $nombre;
    $new->save();
    $notify = [
      "type" => "success",
      "message" => "se actualizo su portada"
    ];
    return redirect()->back()->with("notify", $notify);
  }

  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param int $id
   * @return Renderable
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Renderable
   */
  public function destroy($id)
  {
    //
  }
}
