<?php

namespace Modules\Rrhh\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\GrupoPersona;
use Modules\Rrhh\Entities\TipoContrato;
use Modules\Rrhh\Entities\Trabajador;
use Modules\Rrhh\Entities\Horario;
use Modules\Rrhh\Entities\GrupoTrabajo;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Image;
use App\User;
use Modules\Rrhh\Entities\Designation;
class RrhhcontrolController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index(Request $request)
    {
      $hours=Horario::all();
      $grupos=GrupoTrabajo::all();
      $grupopersona = GrupoPersona::all();
      $tipocontrato = TipoContrato::all();
      $title='administracion de personal';
      $personals = Personal::orderby('id', 'DESC')->paginate(10);
      if($request->ajax()){
        return [
          'list_personal' => view('rrhh::administrator.personal.kardex.RendTabPerAll')->with(compact('personals', 'grupos', 'hours', 'grupopersona', 'tipocontrato'))->render(),
          'next_page' => $personals->nextPageUrl()
        ];
      }else{
        return view('rrhh::administrator.personal.index',compact('title','personals', 'hours', 'grupos', 'grupopersona', 'tipocontrato')); 
      }
      // foreach ($personals as $key => $p) {
      //   $de=Designation::where('personal_id',$p->id)->get()->last();
      //   if ($de!=null) {
      //       $p->designacion=$de;
      //   }else{
      //   $p->designacion=null;
      //   }
      // }

      //   return view('rrhh::administrator.personal.index',compact('title','personals'));
    }
    

  }
