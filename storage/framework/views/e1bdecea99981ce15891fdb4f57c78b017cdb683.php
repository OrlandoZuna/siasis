<!-- @use  Jenssegers\Date\Date as DATE; -->
<!DOCTYPE html>
<html lang="en" style="background-color: #f5f5f5;">
    <head>
        <title>pdf</title>
        <meta charset="UTF-8">
        <meta name="http-equiv="X-UA-Compatible" content="IE-chrome">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- <?php echo Html::script('assets/js/bootstrap/dist/js/bootstrap.min.js'); ?>

        <?php echo Html::script('assets/js/bootstrap/dist/css/bootstrap.min.css'); ?> -->
        <!-- <?php echo Html::style('assets/plugins/datatables/dataTables.bootstrap.css'); ?>

        <?php echo Html::style('assets/plugins/colorpicker/bootstrap-colorpicker.min.css'); ?>

        <?php echo Html::style('assets/plugins/timepicker/bootstrap-timepicker.min.css'); ?> -->

        <link href="<?php echo e(public_path('assets/js/bootstrap/dist/js/bootstrap.min.js')); ?>" rel="stylesheet" type="text/javscript">
        <link href="<?php echo e(public_path('assets/js/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
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
                margin-top: 2.6cm;
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
                width: 75px;
            }
            #imguatf{
                margin-top: 5px;
                float: left;
                width:70PX;
            }
            #textoencabezado{
                margin-top: 5px;
                text-align:center;
            }
            #uno{
                font-size: 12px;
                font-weight: bold;
                margin-bottom: 0px;
            }
            #dos{
                font-size: 10px;
                margin-bottom: 0px;
            }
            #tres{
                font-size: 12px;
                font-weight: bold;
                margin-top: 1px;
                text-border: center;
            }
            #cuerpo2{
                margin-top: 1px;
                text-align: center;
                margin-bottom: 0px;
                height: 12px; 
            }
            #cuerpo2 p{
                display: inline-block;
                padding-bottom: 2px;
                color: black;
            }
            #tipocontrato{
                position:relative;
                margin-top: 3px;
                text-align:center;
                color: black;
                font-size: 10px;
                text-transform: uppercase;
            }
            b{
                color: black;
            }
            #cuerpodatospersonal{
                margin-top: -7px;
                position:relative;
                align-items:center;
                height: 10px;
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
            /* footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                background-color: #46C66B;
                color: white;
                text-align: center;
                line-height: 35px;
            } */
        </style>

    </head>
    <body>
        <header>
            <div class="col-12" id="encabezado">
                <img src="assets/images/logo.png" alt="uatf" id="imguatf">
                <div id="textoencabezado">
                    <p id="uno">UNIVERSIDAD AUTONOMA "TOMAS FRIAS"</p>
                    <p id="dos">DIRECCION ADMINISTRATIVA Y FINANCIERA</p>
                    <p id="dos">DEPARTAMENTO DE PERSONAL</p>
                    <p id="tres"><u>KARDEX DE CONTROL DE ASISTENCIAS</u> </p>
                </div>
                <img id="imgpersonal" src="assets/images/LOGO CIRCULAR COLOR.png" alt="personal"> 
            </div> 
            <div id="cuerpo2">
                <p style="font-size:10px; margin-left: 30%">Desde:  <?php echo e($fecha1); ?> </p>
                <p style="font-size:10px; margin-right: 50%;">Hasta:  <?php echo e($fecha2); ?></p>
            </div>
            <p id="tipocontrato"> PERTENECIENTE AL GRUPO:  <b><?php echo e($nombre_tc); ?> </b></p>
            <div id="cuerpodatospersonal">
                    <p id="datos2" style=" float: left; padding-left: 50px;"><b>MES:</b><?php echo e($mes); ?> </p>
                    <p id="datos2" style=" float: right; padding-right: 50px;"><b>AÑO:</b><?php echo e($año); ?> </p>
            </div>
        </header>
        <?php
        $con= 0;
        $dia= "";
        ?>
        
            <?php
            $bonote= 0;
            $dt= 0;
            $no= 0;
            ?>
            <div class="container">
                <p style="text-align: center; text-transform: capitalize !important; font-size:10px; margin-top: -10px;">Nombre: <b>dsds</b></p>
                    <table class="table__kiri table-bordered">
                        <thead>
                            <tr>
                                <th width="50px">fecha</th>
                                <th>dia</th>
                                <th>Ci</th>
                                <th>Hrio.</th>
                                <th>Tipo</th>
                                <th>Hora</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th>Hora</th>
                                <th>Estado</th>
                                <th>H_Tra.</th>
                                <th>Obs.</th>
                            </tr>
                        </thead>
                        <tbody>
                                             
                        <?php $__currentLoopData = $grupohorario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asistencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                
                            <tr>
                                <td><?php echo e($asistencia->start); ?></td>
                                <td><?php echo e(DATE::create($asistencia->start)->format('D')); ?></td>
                                <td><?php echo e($asistencia->ci_a); ?></td>
                                <td><?php echo e($asistencia->turno_a); ?></td>
                                <td><?php echo e($asistencia->tipo_a); ?></td>
                                <td><?php echo e($asistencia->hora); ?></td>
                                <td><?php echo e($asistencia->estado_a); ?></td>
                                <?php  
                                    // $intervaloH= DATE::CreateFromFormat('Y-m-d H:i:s', $asis->start.' '.$asis->hora)->diffInHours(DATE::createFromFormat('Y-m-d H:i:s', $asistencia->start.' '.$asistencia->hora)); 
                                    $intervaloMm= DATE::CreateFromFormat('H:i:s', '00:00:00')->diffInMinutes(DATE::createFromFormat('H:i:s', $asistencia->hora));  
                                    $intervaloM=gmdate('H:i', $intervaloMm * 60); 
                                    //$t_h = DATE('H:i', strtotime($t_h)+ strtotime($intervaloM)-strtotime('midnight')); 
                                ?> 
                                <td><?php echo e($intervaloM); ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                        </tbody>
                    </table>
            </div>
        <footer>
        </footer>
    </body>
</html><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/reportes/pdfs/pdf-prueba.blade.php ENDPATH**/ ?>