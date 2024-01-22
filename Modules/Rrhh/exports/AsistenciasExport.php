<?php
namespace Modules\Rrhh\exports;
use Modules\Rrhh\Entities\Cabezera;
use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\WithStyles;

use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithTitle;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDefaultStyles;

use Modules\Rrhh\Entities\AssiteciaActual;
use Modules\Rrhh\Entities\Personal;
use Modules\Rrhh\Entities\TipoContrato;
use Modules\Rrhh\Entities\GrupoHorario;
use Modules\Rrhh\Entities\AsistenciaBiometrico;
use Carbon\Carbon;
use DB;
use Jenssegers\Date\Date as DATE;

class AsistenciasExport implements FromView, ShouldAutoSize, WithHeadings, WithStyles, WithDrawings, WithTitle
{
    private $fecha1;
    private $fecha2;
    private $nombre_tc;
    private $per_tc;
    private $grupohorario;
    private $grupohorarioentradas;
    private $grupohorariosalidas;
    private $cantidad;
    private $cadena;
    private $mes;
    private $año;
    public function __construct($fecha1, $fecha2, $per_tc, $nombre_tc, $grupohorario, $cadena, $grupohorarioentradas, $grupohorariosalidas, $cantidad, $mes, $año)
    {
        $this->fecha1 = $fecha1; // asignas el valor inyectado a la propiedad
        $this->fecha2 = $fecha2;
        $this->per_tc = $per_tc;
        $this->nombre_tc = $nombre_tc;
        $this->grupohorario = $grupohorario;
        $this->cadena = $cadena;
        $this->grupohorarioentradas = $grupohorarioentradas;
        $this->grupohorariosalidas = $grupohorariosalidas;
        $this->cantidad = $cantidad;
        $this->mes = $mes;
        $this->año = $año;
    }

    public function title(): string
    {
        return 'Resumen de asistencias de:'.$this->nombre_tc;
    }

    public function headings(): array
    {
        return [
            ['TITULO'],
            [
                'No.',
                'Nombre',
                'Ci',
                'Abandono',
                'Permiso',
                'Atraso',
                'Falta',
                'D_Tra.',
                'T_dias',
                'Bo_Te',
                'T_Hora',
            ]
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('uatf');
        $drawing->setPath(public_path('assets/images/LOGO CIRCULAR COLOR.png'));
        $drawing->setHeight(50);
        $drawing->setCoordinates('B1');

        $drawing2 = new Drawing();
        $drawing2->setName('Logo1');
        $drawing2->setDescription('UATFs');
        $drawing2->setPath(public_path('assets/images/logo.png'));
        $drawing2->setHeight(50);
        $drawing2->setCoordinates('I1');

        return [$drawing, $drawing2];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true, 'size' => 12], 'alignment' => ['horizontal' => 'center']],
            2    => ['font' => ['bold' => true, 'size' => 10]],
            3    => ['font' => ['bold' => true, 'size' => 10]],
            4    => ['font' => ['bold' => true, 'size' => 10]],
            6   => ['font' => ['bold' => true, 'size' => 11]],
           5 + Count($this->per_tc) +3 => ['font' => ['bold' => true, 'size' =>11]],
        ];
    }

    public function styles1(Worksheet $sheet)
    {
        $sheet->getStyle('B2')->getFont()->setBold(true);
    }

    public function view(): View
    {

        $fecha1 = $this->fecha1;
        $fecha2 = $this->fecha2;
        $per_tc = $this->per_tc;
        $nombre_tc = $this->nombre_tc;
        $grupohorario = $this->grupohorario;
        $cadena = $this->cadena;
        $grupohorarioentradas = $this->grupohorarioentradas;
        $grupohorariosalidas = $this->grupohorariosalidas;
        $cantidad = $this->cantidad;
        $mes = $this->mes;
        $año = $this->año;
        //dd($mes, $año, $nombre_tc, $per_tc);
        return view('rrhh::scarrhh.reportes.xlss.vistas.reporte-asistencias',
                compact(['fecha1', 'fecha2', 'grupohorarioentradas', 'grupohorariosalidas', 'per_tc', 'grupohorario', 'cadena', 'cantidad', 'nombre_tc', 'mes', 'año'])
            );
    }
}
