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
class ExpEntrePl implements FromView
{
  /**
  * @return \Illuminate\Support\Collection
  */
  use Exportable;
  protected $id;
  function __construct($mode,$thisUser,$thisDateNow) {
    $this->mode = $mode;
    $this->thisUser = $thisUser;
    $this->thisDateNow = $thisDateNow;
  }
  public function view(): View
  {
    if($this->mode === 'Jx_all'){
      return view('rrhh::app1.servicio.reportEx', [
        'data' => Cabezera::where('status','valido')->get(),
        'DataUser' => $this->thisUser,
        'DataDateNow' => $this->thisDateNow
      ]);
    }elseif($this->mode === 'Jx_entrg'){
      return view('rrhh::app1.servicio.reportEx', [
        'data' => Cabezera::whereNotNull('fecha_entrega')->where('status','valido')->get(),
        'DataUser' => $this->thisUser,
        'DataDateNow' => $this->thisDateNow
      ]);
    }elseif($this->mode === 'Jx_noentreg'){
      return view('rrhh::app1.servicio.reportEx', [
        'data' => Cabezera::whereNull('fecha_entrega')->where('status','valido')->get(),
        'DataUser' => $this->thisUser,
        'DataDateNow' => $this->thisDateNow
      ]);
    }
  }
}

