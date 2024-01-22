<?php

namespace Modules\Rrhh\Imports;

use Modules\Rrhh\Entities\AsistenciaBiometrico;
use App\Notifications\ImportHasFailedNotification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;

class AsistenciasImport implements  ToCollection, WithHeadingRow
{
    private $id_b;
    public function __construct($id_b)
    {
        $this->id_b = $id_b;
    }
    public function headingRow(): int
    {
        return 1;
    }
    public function collection(Collection $rows)
    {
      $con = 0;
      //dd($rows->toArray());
        foreach ($rows as $row) {
          Validator::make($row->toArray(), [
            'id_user_b' => 'required|min:7|max:10',
            'timestamp' => 'required|date',
            'state' => 'required|integer',
            'type' => 'required|integer',
            ])->validate();
            $state = 'huella';
            $type = 'entrada';
            if ($row['state'] == 1)
                $state = 'Huella';
                elseif ($row['state'] == 2)
                $state = 'Facial';
                elseif ($row['state'] == 3)
                $state = 'Contraseña';
                elseif ($row['state'] == 4)
                $state = 'Card';
            else
                $state = 'Otro';
            if ($row['type'] == 0)
                $type = 'Entrada';
                elseif ($row['type'] == 1)
                $type = 'Salida';
            else
                $type = 'Otro';
            $aux = AsistenciaBiometrico::where('id_user_b', $row['id_user_b'])->where('timestamp', $row['timestamp'])->first();
            if ($aux == null) {
              $con ++;
                AsistenciaBiometrico::create([
                    'Nregistro' => 00,
                    'id_biometrico' =>$this->id_b,
                    'id_user_b' => $row['id_user_b'],
                    'state' => $state,
                    'timestamp' => $row['timestamp'],
                    'type' => $type
                ]);
            }
            else {
                $con++;
            }
        }
    }
}
