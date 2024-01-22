<?php
namespace Modules\Rrhh\exports;
use Modules\Rrhh\Entities\Cabezera;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class ExcForType implements FromView
{
  /**
  * @return \Illuminate\Support\Collection
  */
  use Exportable;
  protected $id;
  function __construct($mode) {
    $this->mode = $mode;
  }
  public function view(): View
  {
    $listType = ['jx_permpers' => 'permanente', 'nx_nopermcf' => 'no_permanente', 'jv_naler' => 'jornalero', 'gx_njas' => 'granjas', 'cx_sultdoc' => 'consultor_docente', 'cx_sultadm' => 'consultor_administrativo'];

    return view('rrhh::app1.servicio.reportEx', [
      'data' => Cabezera::where('tipo',$listType[$this->mode])->get()
      // 'DataUser' => $this->thisUser,
      // 'DataDateNow' => $this->thisDateNow
    ]);

  }
}

//8520983
