<?php

namespace App\Imports;
use Modules\Consola\Entities\PersonalAux;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;
class PerosnalImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    use Importable;

    public function collection(Collection $rows)
    {
      //dd($rows);
      foreach($rows as $row)
      {


        $aux=PersonalAux::where('CI',$row[0])->first();

        if($aux==null){
          PersonalAux::create([
            'CI'=>$row[0],
            'NOMBRES'=>$row[1],
            'APELLIDO_PATERNO'=>$row[2],
            'APELLIDO_MATERNO'=>$row[3],
            'GENERO'=>$row[4],
            'FECHA_NACIMIENTO'=>'1995-10-12',
            'DIRECCION'=>$row[6],
            'CELULAR'=>$row[7],
            'TELEFONO'=>$row[8],
            'PROFESION_OCUPACION'=>$row[9],
            'NUM_LIBRETA_MIL'=>$row[10],
            'EMAIL'=>$row[11],
            'UNIDAD_TRABAJO'=>$row[12],
            'CARGO'=>$row[13],
          ]);
        }else{
          //dd($aux);
        }

      }
    }
}
