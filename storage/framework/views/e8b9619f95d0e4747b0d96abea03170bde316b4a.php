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
          margin-top: 3.15cm;
          position: absolute;
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
      border: 1px solid #fff;
      text-transform: uppercase;
      font-size: 9px;
      }
      .table__kiri tbody tr {
        height: 13px;
      }
      .table__kiri tbody tr td {
        padding-left: 1px;
        height: 11px;
        text-transform: capitalize !important;
        font-size: 9px;
        border-bottom: 1px solid #02090f;
      }
      /* .table__kiri tbody tr:nth-child(even) {
      background: #deeaf4;
      } */
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
      #tipocontrato p b{
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
                <p id="dosi">DEPARTAMENTO DE PERSONAL</p>
                <p id="tres"><u>KARDEX DE CONTROL DE ASISTENCIAS</u> </p>
            </div>
            <img id="imgpersonal" src="assets/images/LOGO CIRCULAR COLOR.png" alt="personal">
        </div>
        <div id="cuerpo2">
            <p style="font-size:10px; margin-left: 30%">Desde:  <?php echo e($fecha1); ?> </p>
            <p style="font-size:10px; margin-right: 50%;">Hasta:  <?php echo e($fecha2); ?></p>
        </div>
        <div id="tipocontrato">
          <p> PERTENECIENTE AL GRUPO:  <b><?php echo e($nombre_tc); ?> </b></p>
        </div>
        <div id="cuerpodatospersonal">
                <p id="datos3" style=" float: left; padding-left: 75px; margin-top: -40;"><b>MES:</b><?php echo e($mes); ?> </p>
                <p id="datos3" style=" float: right; padding-right: 75px; margin-top: 0;"><><b>AÑO:</b><?php echo e($año); ?> </p>
        </div>
    </header>
    <?php
    $con= 0;
    $dia= "";
    ?>
    <?php $__currentLoopData = $per_tc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        $bonote= 0;
        $d_bonote = 0;
        $con_d = 0;
      ?>
      <div class="container">
        <p style="text-align: left; text-transform: capitalize !important; font-size:10px; margin-top: -10px;">Nombre: <b><?php echo e($tc->nombres.' '.$tc->apellido_paterno.' '.$tc->apellido_materno); ?></b></p>
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
            <?php $__currentLoopData = $actualAsistencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asistencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($asistencia['ci'] == $tc->ci): ?>
                <tr>
                  <td><?php echo e($asistencia['fecha']); ?></td>
                  <td><?php echo e($asistencia['dia']); ?></td>
                  <td><?php echo e($asistencia['ci']); ?></td>
                  <td><?php echo e($asistencia['horario']); ?></td>
                  <td><?php echo e($asistencia['tipo1']); ?></td>
                  <td><?php echo e($asistencia['hora1']); ?></td>
                  <td><?php echo e($asistencia['estado1']); ?></td>}</td>
                  <td><?php echo e($asistencia['tipo2']); ?></td>
                  <td><?php echo e($asistencia['hora2']); ?></td>
                  <td><?php echo e($asistencia['estado2']); ?></td>
                  <td><?php echo e($asistencia['horatra']); ?></td>
                  <td></td>
                  <?php
                    $con_d ++;
                    if ((int)$asistencia['diatra'] == 6 || (int)$asistencia['diatra'] == 0) {
                      $d_bonote ++;
                    }
                    else {
                      $bonote ++;
                    }
                  ?>
                </tr>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php
                $con ++;
                $value = 0;
                $atrasi = 0;
                $falti = 0;
                $permi = 0;
                $abando = 0;
                foreach($grupohorario as $actual){
                    if ($actual->id_persona == $tc->id && $actual->start >= $cadena[0]) {
                      if ($actual->estado_a == "en hora" || $actual->estado_a == "atrasado" || $actual->estado_a == "salida" || $actual->estado_a == 'abandono' || $actual->estado_a == 'permiso'){
                        $value = $value + $actual->valor_asistencia;
                      }
                      if ($actual->estado_a == "atrasado"){
                        $atrasi = $atrasi + 1;
                      }
                      if ($actual->estado_a == "abandono"){
                        $abando = $abando + 1;
                      }
                      if ($actual->estado_a == "permiso"){
                        $permi = $permi + 1;
                      }
                      else{
                        if ($actual->estado_a == "falta"){
                            $falti = $falti + $actual->valor_asistencia;
                        }
                      }
                    }
                }
            ?>
            <tr id="total">
                <td></td>
                <td></td>
                <td>Atraso</td>
                <td>abandono</td>
                <td>permiso</td>
                <td>faltas</td>
                <td>d. tra.</td>
                <td>T. dias</td>
                <td>D. Bono_te</td>
                <td>D_Fin_S</td>
                <td>T_dia_R</td>
                <td></td>
            </tr>
            <tr id="total1">
                <td></td>
                <td></td>
                <td><?php echo e($atrasi); ?></td>
                <td><?php echo e($abando); ?></td>
                <td><?php echo e($permi); ?></td>
                <td><?php echo e($falti); ?></td>
                <td><?php echo e($value); ?></td>
                <td><?php echo e($value + $falti); ?></td>
                <?php if($value == 0 && $falti == 0): ?>
                    <?php
                        $bonote = 0;
                    ?>
                <?php endif; ?>
                <td><?php echo e($bonote-$falti); ?></td>
                <td> <?php echo e($d_bonote); ?></td>
                <td><?php echo e($d_bonote+ $bonote); ?></td>
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
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/reportes/pdfs/pdfprueba.blade.php ENDPATH**/ ?>