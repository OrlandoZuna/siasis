<?php

namespace Modules\Rrhh\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use App\Gestion;
use Modules\Rrhh\Entities\Imgtemp;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\Docupersonal;
use Modules\Rrhh\Entities\Archivos;
use Modules\Rrhh\Entities\ExpLaboral;
use Modules\Rrhh\Entities\CursosSeminarios;
use Modules\Rrhh\Entities\Estudios;
use Modules\Rrhh\Entities\Designacion;
use Modules\Rrhh\Entities\Bajamedica;
use Modules\Rrhh\Entities\Vacacion;
use Modules\Rrhh\Entities\Memorandun;
use Modules\Rrhh\Entities\Recategorizacion;
use Modules\Rrhh\Entities\Resolucion;
use Modules\Rrhh\Entities\Contrato;
use Modules\Rrhh\Entities\Consultor;
use Modules\Rrhh\Entities\PersonalPlanta;
use Modules\Rrhh\Entities\FilesKardex;
use Modules\Rrhh\Entities\Institucion;
use Modules\Rrhh\Entities\DeclaracionJurada;
use Image;


class RrhhController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $title='modulo rrhh';
        return view('rrhh::index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('rrhh::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('rrhh::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('rrhh::edit');
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

    /*********VACATIONS***********/

    public function WelcomeVac(Request $request){
      return view('rrhh::vacations.index');
    }

    public function ListPersonalVacations(Request $request){

      $plantaUser = PersonalPlanta::get();

      //dd($plantaUser[0]->personalDetail);

      return view('rrhh::vacations.plantaPersonal',compact('plantaUser'));
    }


    public function ListGestionVac(Request $request){

      $arrYears = array('gestiones');

      $dateNow = new Date();

      $nownow = '2021-08-11';

      $PruebaYear = '2015-08-11';

      $pruebaY = new Date($PruebaYear);

      $nowY = new Date($nownow);

      foreach (range($pruebaY->format('Y'),$nowY->format('Y')) as $key => $letra) {

        $convert = $letra +1 ;

        //echo $letra .'  -  ' . $convert . ' __ ';

        $arrYears[$key] = $letra;

      }


      return view('rrhh::vacations.Gvacation',compact('arrYears'));


      // dd($arrYears);

      // //$dateNow= new Date('+1 years');

      // //$ultimo = $arr->last();

      // //$au = $dateNow->add('1 year');

      // $au = $dateNow->format('Y');


      // $firstDate = new Date($PruebaYear);

      // $nowDaaa = new Date($nownow);

      // //$interval = $firstDate->diff($dateNow);

      // $date = Carbon::parse('2016-01-01');
      // $now = Carbon::now();


      // $diff = $firstDate->diffInYears($nowDaaa);


      // dd($firstDate->format('Y'));

      // dd(($firstDate->add('1 year'))->format('d-m-Y'));

      // dd($firstDate->format('d-m-Y'));

      // //dd(array_pop($arr));

      // if($LastGestion =! $dateNow){

      //   // foreach($PruebaVacations as $){
      //   //   $DataVac->id_personal = $Data->id_personal;
      //   //   $DataVac->id_type_receso = $Data->id_type_receso;
      //   //   $DataVac->id_gestion = $Data->id_gestion;
      //   //   $DataVac->dias_total = '15';
      //   //   $DataVac->dias_tomados = '0';
      //   //   $DataVac->dias_debe = '0';
      //   // }

      // }else{

      // }




    }

    public function VerInGestion(Request $Request){
      return view('rrhh::vacations.viewInGestion');
    }

}
