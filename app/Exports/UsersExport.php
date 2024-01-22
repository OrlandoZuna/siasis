<?php

namespace App\Exports;
use Modules\Rrhh\Entities\PlanillaBeca;

use Modules\Rrhh\Entities\Cabezera;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    protected $id;

    function __construct($ff,$fi,$op) {
      $this->ff = $ff;
      $this->fi = $fi;
      $this->op = $op;
    }

    function __construct($ff,$fi,$op) {
      $this->ff = $ff;
      $this->fi = $fi;
      $this->op = $op;
    }

    public function headings(): array
    {
        return [
          'ru',
          'ci',
          'nombre',
          'telefono',
          'carrera',
          'tipo_beca',
          'nro_cuenta',
          'gestion',
          'periodo',
          'fecha',
        ];
    }

    if($this->op == null)
    {
      return view('rrhh::academic.reports.xls1', [
        'data' => PlanillaBeca::select('ru', 'ci', 'nombre', 'telefono', 'carrera', 'tipo_beca','entidad', 'nro_cuenta', 'gestion', 'periodo', 'fecha')->whereBetween('fecha',[$this->fi,$this->ff])->get()
      ]);
    }else{
      if($this->op == 1)
      {
        return view('rrhh::academic.reports.xls2', [
          'data' => PlanillaBeca::select('ru', 'ci', 'nombre', 'telefono', 'carrera', 'tipo_beca','entidad', 'nro_cuenta', 'gestion', 'periodo', 'fecha','observacion')->whereBetween('fecha',[$this->fi,$this->ff])->where('estado_cuenta','observado')->get()
        ]);
      }else{
        if($this->op == 2){
          return view('rrhh::academic.reports.xls1', [
            'data' => PlanillaBeca::select('ru', 'ci', 'nombre', 'telefono', 'carrera', 'tipo_beca','entidad', 'nro_cuenta', 'gestion', 'periodo', 'fecha')->whereBetween('fecha',[$this->fi,$this->ff])->where('estado_cuenta','verificado')->get()
          ]);
        }else{
          if($this->op == 3){
            return view('rrhh::academic.reports.xls1', [
              'data' => PlanillaBeca::select('ru', 'ci', 'nombre', 'telefono', 'carrera', 'tipo_beca','entidad', 'nro_cuenta', 'gestion', 'periodo', 'fecha')->whereBetween('fecha',[$this->fi,$this->ff])->where('estado_cuenta','rehabilitado')->get()
            ]);
          }
        }
      }
  }

}

