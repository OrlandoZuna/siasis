<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Http\Requests\CreateAsistenciaRequest;
use App\Http\Requests\UpdateAsistenciaRequest;
use Illuminate\Http\Request;

class Asistencia2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->has('txtBuscar'))
        {
          $asistencias =Asistencia::where('id', 'like', '%' . $request->txtBuscar . '%')
                        ->orWhere('ci_a', 'like', '%' . $request->txtBuscar . '%')
                        ->get();
        }
        else
        {
          $asistencias = Asistencia::all();
        }
        //dd($request->all());
        return $asistencias;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAsistenciaRequest $request)
    {
        //
        $input = $request->all();
        Asistencia::create($input);
       /* return response()->json([
          'res'=> true,
          'message'=> 'registro creado'
        ], 200);*/
        return response()->json($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Asistencia $asistencias,  $id)
    {
        //
        return $asistencias::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAsistenciaRequest $request, Asistencia $asistencia, $id)
    {
        //
        $input = $request ->all();
        $asistencia->update($input);
        return response()->json($input);
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
        Asistencia::destroy($id);
        return response()->json($id);
    }
}
