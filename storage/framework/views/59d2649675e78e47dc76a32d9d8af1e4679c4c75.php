<!-- @use  Jenssegers\Date\Date as DATE; -->
<!DOCTYPE html>
<html lang="en" style="background-color: #f5f5f5;">
    <head>
        <title>pdf</title>
        <meta charset="UTF-8">
        <meta name="http-equiv="X-UA-Compatible" content="IE-chrome">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style type="text/css">
            @page  {
                margin: 1cm 1cm 1cm 1cm;
            }
            .page-break {
                page-break-after: always;
            }
            body {
                background-image: url(assets/images/uatfblanco.png);
                background-color: #f5f5f5 !important;
                background-size: 100PX;
            }
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
                margin-bottom: 0.5cm;
            }
            .container{
                margin-top: 3.25cm;
                /* border: 2px solid green; */
            }
            .table__kiri {
                margin-left: -12px;
                margin-right: -12px;
                margin-top: -12px;
                width: 100%;
                height: auto;
                position: relative;
                /* border: 2px solid blue; */
            }
            .table__kiri thead {
            background: #113F63;
            color: #fff;
            }
            .table__kiri thead tr {
            height: 28px;
            }
            .table__kiri thead tr th {
            padding-left: 1px;
            /* width: 12%; */
            border: 1px solid #fff;
            text-transform: uppercase;
            font-size: 9px;
            }
            .table__kiri tbody tr {
            height: 28px;
            }
            .table__kiri tbody tr td {
            padding-left: 1px;
            border: 1px solid #fff;
            text-transform: capitalize !important;
            /* text-align:center;  */
            font-size: 9px;
            }
            .table__kiri tbody tr:nth-child(even) {
            background: #deeaf4;
            }
            #encabezado {
                display: flex;
                align-items:center;
                height: 65px;
            }
            #imgpersonal{
                margin-top: 5px;
                float: right;
                width: 65px;
            }
            #imguatf{
                margin-top: 5px;
                float: left;
                width:60PX;
            }
            #textoencabezado{
                margin-top: 5px;
                text-align:center;
                height: 2cm;
            }
            #uno{
                font-size: 12px;
                font-weight: bold;
                margin-bottom: 0px;
                margin-top: 2px;
            }
            #dos{
                font-size: 10px;
                margin-top: -1px;
            }
            #dosi{
                font-size: 10px;
                margin-top: -10px;
            }
            #tres{
                font-size: 12px;
                font-weight: bold;
                margin-top: -8px;
                text-border: center;
            }
            #cuerpo2{
              position: relative;
              margin-top: 0px;
              text-align: left;
              margin-bottom: 0px;
              height: 12px;
            }
            #cuerpo2 p{
              margin-top:-2px;
              float: left;
              margin-left: 5.5cm;
              padding-bottom: 1px;
            }
            #tipocontrato{
              position: relative;
              height: 20px;
              margin-top: 0px;
              padding-top: -10px;
            }
            #tipocontrato p{
              position: inherit;
              height: 11px;
              text-align:center;
              text-transform:uppercase;
              font-size: 10px;
            }
            b{
                color: black;
            }
            #cuerpodatospersonal{
                margin-top: 2px;
                /* position:relative; */
                align-items:center;
                height: 11px;
                margin-bottom: 0px;
            }

            #cuerpodatospersonal p{

                position:relative;
                text-align: left;
                text-transform: uppercase;
                align-items:center;
                color: black;
                padding: 2px 0px 2px 0px;
                font-size: 10px;
            }
            #datos2{
                margin-top: -10px;
            }
            #datos1{
                margin-top: -10px;
            }
            #total{
                background: white;
                border: 1px solid black;
            }
            #total td{
                text-align: flex;
                font-size: 9px;
                font-weight: bold;
                color: #113F63;
            }
            #total1{
                border: 1px solid black;
                background: white;
            }
            #total1 td{
                text-align: flex;
                font-size: 9px;
                font-weight: bold;
            }
            main {
                margin-top: 4cm;
                border: 2px solid blue;
            }

        </style>

    </head>
    <body>
        <header>
            <div class="col-12" id="encabezado">
                <img src="assets/images/logo.png" alt="uatf" id="imguatf">
                <div id="textoencabezado">
                    <p id="uno">UNIVERSIDAD AUTONOMA "TOMAS FRIAS"</p>
                    <p id="dos">DIRECCION ADMINISTRATIVA Y FINANCIERA</p>
                    <p id="dosi">DEPARTAMENTO DE PERSONAL</p>
                    <p id="tres"><u>KARDEX DE CONTROL DE PERMISOS:SALIDAS</u> </p>
                </div>
                <img id="imgpersonal" src="assets/images/LOGO CIRCULAR COLOR.png" alt="personal">
            </div>
            <div id="cuerpo2">
                <p style="font-size:10px; margin-left: 30%">Desde:  <?php echo e($fecha1); ?> </p>
                <p style="font-size:10px; margin-right: 50%;">Hasta:  <?php echo e($fecha2); ?></p>
            </div>
            <div id="tipocontrato">
                <p> TIPO DE CONTRATO DE:  <b><?php echo e($nombre_tc); ?> </b></p>
            </div>
            <div id="cuerpodatospersonal">
                    <p id="datos3" style=" float: left; padding-left: 75px; margin-top: -40;"><b>MES:</b><?php echo e($mes); ?> </p>
                    <p id="datos3" style=" float: right; padding-right: 75px; margin-top: 0;"><b>AÑO:</b><?php echo e($año); ?> </p>
            </div>
        </header>
        <?php
        $con= 0;
        $dia= "";
        ?>
        <?php $__currentLoopData = $per_tc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $bonote= 0;
            $no= 0;
            ?>
            <div class="container">
                <p style="text-align: center; text-transform: capitalize !important; font-size:10px; margin-top: -10px;">Nombre: <b><?php echo e($tc->nombres.' '.$tc->apellido_paterno.' '.$tc->apellido_materno); ?></b></p>
                <table class="table__kiri table-bordered">
                    <thead>
                        <tr>
                            <th width="50px">fecha</th>
                            <th>dia</th>
                            <th>Ci</th>
                            <th>Motivo</th>
                            <th>T_S.</th>
                            <th>Hrio.</th>
                            <th>H_I</th>
                            <th>H_F</th>
                            <th>H_T</th>
                            <th>Obs.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $cadena; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $existe= 0;
                                $no ++;
                                $dia = DATE::create($fecha)->format('w');
                                foreach ($grupohorario as $asistencias){
                                    if ($asistencias->start == $fecha && $asistencias->id_persona == $tc->id){
                                        $existe++;
                                    }
                                }
                                if ((int)$dia != 6 && (int)$dia != 0) {
                                    $bonote ++;
                                }
                            ?>
                            <?php if($existe == 0): ?>
                            <tr>
                                <td><?php echo e($fecha); ?></td>
                                <td><?php echo e(DATE::create($fecha)->format('D')); ?></td>
                                <td><?php echo e($tc->ci); ?></td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                            </tr>
                            <?php endif; ?>
                            <?php if($existe > 0): ?>
                                <?php $__currentLoopData = $grupohorario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($permis->start == $fecha && $permis->id_persona == $tc->id): ?>
                                    <tr>
                                        <td><?php echo e($permis->start); ?></td>
                                        <td><?php echo e(DATE::create($permis->start)->format('D')); ?></td>
                                        <td><?php echo e($permis->ci); ?></td>
                                        <td><?php echo e($permis->title); ?></td>
                                        <td><?php echo e($permis->nombre_tiposalida); ?></td>
                                        <td><?php echo e($permis->nombre_horario); ?></td>
                                        <td><?php echo e($permis->inicio_time); ?></td>
                                        <td><?php echo e($permis->fin_evento); ?></td>
                                        <?php
                                            // $intervaloH= DATE::CreateFromFormat('Y-m-d H:i:s', $asis->start.' '.$asis->hora)->diffInHours(DATE::createFromFormat('Y-m-d H:i:s', $permis->start.' '.$permis->hora));
                                            $intervaloMm= DATE::CreateFromFormat('H:i:s', $permis->inicio_time)->diffInMinutes(DATE::createFromFormat('H:i:s', $permis->fin_evento));
                                            $intervaloM=gmdate('H:i', $intervaloMm * 60);
                                        ?>
                                        <td><?php echo e($intervaloM); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $con ++;
                            $perMT = 0;
                            $perTC = 0;
                            $perH = 0;
                            foreach ($grupohorario as $actual){
                                $difhora = DATE::create($actual->inicio_time)->diffInHours(DATE::create($actual->fin_evento));
                                if ($actual->start >= $cadena[0] && $actual->id_persona == $tc->id) {

                                    if ($difhora == 4 ) {
                                        $perMT ++;
                                    }
                                    elseif ($difhora > 7){
                                        $perTC ++;
                                    }
                                    else {
                                        $perH ++;
                                    }
                                }
                            }
                        ?>

                        <tr id="total">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Per_Medio_T</td>
                            <td>Per_Tiempo_C</td>
                            <td>Per_por_Hora</td>
                            <td></td>
                            <td>T_Permisos</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr id="total1">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo e($perMT); ?></td>
                            <td><?php echo e($perTC); ?></td>
                            <td><?php echo e($perH); ?></td>
                            <td></td>
                            <td> <?php echo e($perMT+ $perTC+ $perH); ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php if($con < $cantidad): ?>
            <div class="page-break"><br></div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <footer>
        </footer>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/reportes/pdfs/pdfps.blade.php ENDPATH**/ ?>