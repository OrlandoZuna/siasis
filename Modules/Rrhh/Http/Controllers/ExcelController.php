<?php
namespace Modules\Rrhh\Http\Controllers;

// use Modules\Rrhh\Entities\EventoAsistecia;
use Modules\Rrhh\Entities\AsistenciaBiometrico;
use Modules\Rrhh\exports\AsistenciasExport;
use Modules\Rrhh\exports\EjemploExport;
use Modules\Rrhh\imports\AsistenciasImport;
use Excel;
use PDF;

//use App\Horario;
use Modules\Rrhh\Entities\AssiteciaActual;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\TipoContrato;
use Modules\Rrhh\Entities\GrupoHorario;
use DB;
use Jenssegers\Date\Date as DATE;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\HeadingRowImport;

class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function Exceldes(Request $request)
    {
        $fecha1 = $request->fecha1;
        $fecha2 = $request->fecha2;
        $tc = $request->tc;

        $cadena = [];
        $cantidad = 0;

        $mes = DATE::create($fecha1)->format('M').' '.DATE::create($fecha2)->format('M');
        $año = DATE::create($fecha1)->format('Y');

        $dif = Carbon::create($fecha1)->diffInDays(Carbon::create($fecha2));

        $tipocontrato = TipoContrato::find($tc);
        $nombre_tc = $tipocontrato->nombre_tipo_contrato;
        $per_tc = Personal::where('id_tipo_contrato', '=', $tc)->orderBy('id', 'asc')->get();
        $cadena = [];


        for ($i=0; $i <= $dif; $i++) {
            $aux = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
            $cadena [] = Carbon::create($fecha1)->addDay($i)->format('Y-m-d');
        }



        $grupohorario = DB::table('rrhh.personas')
        ->join('rrhh.asistenciasactual','rrhh.asistenciasactual.id_persona', '=', 'rrhh.personas.id')
        ->where('rrhh.personas.id_tipo_contrato', '=', $tc)
        ->where('rrhh.asistenciasactual.start', '>=', $fecha1)->where('rrhh.asistenciasactual.end', '<=', $fecha2)->orderBy('start', 'asc')
        //->limit(1)
        ->get();

        //dd(Count($per_tc), $per_tc);

        $grupohorarioentradas = DB::table('rrhh.personas')
            ->join('rrhh.asistenciasactual','rrhh.asistenciasactual.id_persona', '=', 'rrhh.personas.id')
            ->where('rrhh.personas.id_tipo_contrato', '=', $tc)
            ->where('rrhh.asistenciasactual.start', '>=', $fecha1)->where('rrhh.asistenciasactual.end', '<=', $fecha2)
            ->where('rrhh.asistenciasactual.tipo_a', '=', "entrada")->orderBy('id_persona', 'asc')->orderBy('start', 'asc')
            ->get();

        $grupohorariosalidas = DB::table('rrhh.personas')
            ->join('rrhh.asistenciasactual','rrhh.asistenciasactual.id_persona', '=', 'rrhh.personas.id')
            ->where('rrhh.personas.id_tipo_contrato', '=', $tc)
            ->where('rrhh.asistenciasactual.start', '>=', $fecha1)->where('rrhh.asistenciasactual.end', '<=', $fecha2)
            ->where('rrhh.asistenciasactual.tipo_a', '=', "salida")->orderBy('id_persona', 'asc')->orderBy('start', 'asc')
            ->get();
        //dd($cadena, strval($cadena[0]));

        $cantidad=Count($per_tc);

        //dd($fecha1, $fecha2, $tc);
        return Excel::download(new AsistenciasExport($fecha1, $fecha2, $per_tc, $nombre_tc, $grupohorario, $cadena, $grupohorarioentradas, $grupohorariosalidas, $cantidad, $mes, $año), 'reportetccc.xlsx');
        //  return Excel::download(new AsistenciasExport($fecha1, $fecha2, $per_tc, $nombre_tc, $grupohorario, $cadena, $grupohorarioentradas, $grupohorariosalidas, $cantidad, $mes, $año), 'invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Ejemplodes()
    {
        //"C:\\xampp\\htdocs\\Web\\vendor\\phpoffice\\phpspreadsheet\\src\\PhpSpreadsheet\\Worksheet\\ColumnDimension.php"
        return Excel::download(new EjemploExport, 'ejemplo.xlsx');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'import_file' => 'required|max:10000|mimes:xlsx,xls',
      ]);
      $file = $request->file('import_file');
      $id_b = $request->get('id_biometrico');
      try {

        Excel::import(new AsistenciasImport($id_b), $file);
        // // $rows = Excel::toArray(new AsistenciasImport($id_b), $file);
        // // $headings = (new HeadingRowImport)->toArray($file);
        // // //dd($rows, Count($headings[0][0]), $headings[0][0][0],$headings[0][0][1] );
        // // if (Count($headings[0][0])==4 && $headings[0][0][0] == "id_user_b" && $headings[0][0][1]== "timestamp"&& $headings[0][0][2]=="type"&& $headings[0][0][3]=="state") {
        // //   foreach ($rows[0] as $row) {

        // //       $state = 'huella';
        // //       $type = 'entrada';
        // //       if ($row['state'] == 1)
        // //           $state = 'Huella';
        // //           elseif ($row['state'] == 2)
        // //           $state = 'Facial';
        // //           elseif ($row['state'] == 3)
        // //           $state = 'Contraseña';
        // //           elseif ($row['state'] == 4)
        // //           $state = 'Card';
        // //       else
        // //           $state = 'Otro';

        // //       if ($row['type'] == 0)
        // //           $type = 'Entrada';
        // //           elseif ($row['type'] == 1)
        // //           $type = 'Salida';
        // //       else
        // //           $type = 'Otro';

        // //       $aux = AsistenciaBiometrico::where('id_user_b', $row['id_user_b'])->where('timestamp', $row['timestamp'])->first();
        // //       //dd($aux);

        // //       if ($aux == null) {

        // //         $con ++;
        // //           AsistenciaBiometrico::create([
        // //             dd($type, $state),
        // //               'Nregistro' =>00,
        // //               'id_biometrico' =>$id_b,
        // //               'id_user_b' => $row['id_user_b'],
        // //               'state' => $state,
        // //               'timestamp' => $row['timestamp'],
        // //               'type' => $type
        // //           ]);

        // //       }
        // //   }
        // //   $notify=[
        // //     "type"=>"success",
        // //     "message"=>'se realizo de manera satisfactoria la importacion'
        // //   ];

        // //   return redirect()->back()->with("notify",$notify);

        // // }
        // // else{
          $notify=[
            "type"=>"warning",
            "message"=>'no cumple con los parametros de importacion descargue el ejemplar y cambien os datos'
          ];

          return redirect()->back()->with("notify",$notify);

      }catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
          $fallas = $e->failures();

          // foreach ($fallas as $falla) {
          //     $falla->row(); // fila en la que ocurrió el error
          //     $falla->attribute(); // el número de columna o la "llave" de la columna
          //     $falla->errors(); // Errores de las validaciones de laravel
          //     $falla->values(); // Valores de la fila en la que ocurrió el error.
          //}
          //dd($fallas[0]->attribute());
        $notify=[
            "type"=>"error",
            "message"=>'hay falla en: '.json_encode($fallas[0]->attribute()).' por : '.json_encode($fallas[0]->errors()).' vea el formato a importar'
        ];

        return redirect()->back()->with("notify",$notify);
      }

    }

    // public function importarAss(Request $request)
    // {
    //     if ($request->hasFile('import_file')) {
    //         $path = $request->file('import_file');
    //         $datos = Excel::import($path);

    //         if (!empty($datos) && $datos->Count()) {
    //             $datos = $datos->toArray();
    //             for ($i=0; $i < Count($datos); $i++) {
    //                 $datosimportado[] = $datos[i];
    //             }
    //         }
    //         dd($datosimportado);
    //         AsistenciaBiometrico::insert($datosimportado);
    //     }

    //     return back()->with("notify", 'se importo correctamente');

    // }
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
