<?php

namespace Modules\Rrhh\exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Modules\Rrhh\Entities\AsistenciaBiometrico;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EjemploExport implements FromView, ShouldAutoSize
{

  public function view(): View
  {
    return view('rrhh::scarrhh.reportes.xlss.vistas.ejemplo', [
      'ejemplos' => AsistenciaBiometrico::select('id_user_b','timestamp', 'type', 'state')->limit(10)->get()
    ]);
  }

}
