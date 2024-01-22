<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\Rrhh\Entities\Asper;

class Rrhhreporte implements ToCollection
{
  public function collection(Collection $rows)
  {
    //dd($rows);
    foreach($rows as $row)
    {
      Asper::create([
        'nombres'=>$row[1],
        'cedula'=>$row[2],
      ]);

    }
  }
}
