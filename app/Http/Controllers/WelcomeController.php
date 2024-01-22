<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Valhalla\Entities\Portada;
use Modules\Valhalla\Entities\Aplication;

class WelcomeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //dd('hola');
    $info = Portada::first();
    if ($info == null) {
      $new = new Portada();
      $new->objetivo = '';
      $new->descripcion = '';
      $new->save();
    }
    return view('welcome', compact('info'));
  }
  public function portal()
  {
    //dd('hola');
    $title = 'Portal web';
    $webs = Aplication::where('tipo', 'website')->get();
    return view('home.webs', compact('title', 'webs'));
  }

  public function portalapp()
  {
    //dd('hola');
    $title = 'Portal aplicaciones';
    $appss = Aplication::where('tipo', 'app')->get();

    //dd($appss);
    return view('home.apps', compact('title', 'appss'));
  }
  public function downloadapk($file)
  {

    $pathtoFile = public_path() . '/valhallas/' . $file;
    // dd($pathtoFile);
    return response()->download($pathtoFile);
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('log');
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
  public function update(Request $request, $id)
  {
    //
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