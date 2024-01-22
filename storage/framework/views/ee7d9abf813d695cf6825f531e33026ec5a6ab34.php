
<table>

    <thead>
        <tr>
            <td></td>
            <td></td>
            <td>U.A.T.F.</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Dep. Per.</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Res_Asis_de:</td>
            <td><?php echo e($mes); ?></td>
            <td>de: <?php echo e(strval($año)); ?> </td>
            
        </tr>
        <tr>
            <td>Desde : </td>
            <td><?php echo e(strval($fecha1)); ?></td>
            <td>Tipo_Contrato:</td>
            <td> <?php echo e($nombre_tc); ?></td>
            <td>Hasta:</td>
            <td> <?php echo e(strval($fecha2)); ?></td>
        </tr>
        <tr></tr>
    <tr>
        <th>N.</th>
        <th>NOMBRES</th>
        <th>CI</th>
        <th>ABAN.</th>
        <th>PERM.</th>
        <th>ATRA.</th>
        <th>FALT.</th>
        <th>D_TR.</th>
        <th>T_dI.</th>
        <th>B_TE</th>
        <th>TO_H.</th>
    </tr>
    </thead>
    <?php
    $con = 0;
    $dia= "";
    $no = 1;
    $values = 0; 
    $atrasis = 0;
    $faltis = 0;
    $permis = 0;
    $abandos = 0;
    $bonotes = 0;
    ?>
    <?php $__currentLoopData = $per_tc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $value = 0; 
        $atrasi = 0;
        $falti = 0;
        $permi = 0;
        $abando = 0;
        $bonote = 0;
        $t_h = 0;
        ?>

    <tbody>
        <?php $__currentLoopData = $cadena; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fecha): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $existe= 0;

            $dia = DATE::create($fecha)->format('w');
            foreach ($grupohorarioentradas as $asistencias){
                if ($asistencias->start == strval($fecha)){
                    $existe ++;
                } 
            }
            $con ++;

            foreach($grupohorario as $actual){
                if ($actual->id_persona == $tc->id && $actual->start == $fecha) {
                    if ($actual->estado_a == "en hora" || $actual->estado_a == "atrasado" || $actual->estado_a == "salida" || $actual->estado_a == 'abandono' || $actual->estado_a == 'permiso'){
                        $value = $value + $actual->valor_asistencia;
                        $values = $values + $actual->valor_asistencia;
                    }
                    if ($actual->estado_a == "atrasado"){
                        $atrasi = $atrasi + 1;
                        $atrasis = $atrasis + 1;
                    }
                    if ($actual->estado_a == "abandono"){
                        $abando = $abando + 1;
                        $abandos = $abandos + 1;
                    }
                    if ($actual->estado_a == "permiso"){
                        $permi = $permi + 1;
                        $permis = $permis + 1;
                    }
                    else{
                        if ($actual->estado_a == "falta"){
                            $falti = $falti + $actual->valor_asistencia;
                            $faltis = $faltis + $actual->valor_asistencia;;
                        }
                    } 
                } 
            }
            ?>
            <?php if((float)$existe > 0): ?>  
                <?php
                    $con ++;
                    $bonotes ++;
                    if ((int)$dia != 6 && (int)$dia != 0) {
                        $bonote ++;  
                    } 
                ?>
                <?php $__currentLoopData = $grupohorarioentradas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asistencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($asistencia->start == $fecha && $asistencia->id_persona == $tc->id): ?>
                        <?php $__currentLoopData = $grupohorariosalidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($asis->turno_a == $asistencia->turno_a && $asis->start == $fecha && $asis->id_persona == $tc->id): ?>
                                <?php  
                                    $intervaloMm= DATE::CreateFromFormat('H:i:s', $asis->hora)->diffInMinutes(DATE::createFromFormat('H:i:s', $asistencia->hora));  
                                    $intervaloM=gmdate('H:i', $intervaloMm * 60);
                                    $t_h = $t_h + floatval($intervaloM);
                                ?> 
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                           
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($no++); ?></td>
            <td><?php echo e($tc->nombres.' '.$tc->apellido_paterno.' '.$tc->apellido_materno); ?></td>
            <td><?php echo e($tc->ci); ?></td>
            <td><?php echo e($abando); ?></td>
            <td><?php echo e($permi); ?></td>
            <td><?php echo e($atrasi); ?></td>
            <td><?php echo e($falti); ?></td>
            <td> <?php echo e($value); ?> </td>
            <td> <?php echo e($falti + $value); ?> </td>
            <?php if($value == 0 && $falti == 0): ?>
                <?php
                    $bonote = 0;              
                ?>
            <?php endif; ?>
            <td> <?php echo e($bonote - $falti); ?> </td>
            <td> <?php echo e($t_h); ?> </td>
            <?php

            ?>
        </tr> 

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr></tr>
    <tr>
        <td> TOTAL</td>
        <td><?php echo e($nombre_tc); ?></td>
        <td><?php echo e($nombre_tc); ?></td>
        <td><?php echo e($abandos); ?></td>
        <td><?php echo e($permis); ?></td>
        <td><?php echo e($atrasis); ?></td>
        <td><?php echo e($faltis); ?></td>
        <td> <?php echo e($values); ?> </td>
        <td> <?php echo e($faltis + $values); ?> </td>
        <td></td>
    </tr>
    </tbody>
</table><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/reportes/xlss/vistas/reporte-asistencias.blade.php ENDPATH**/ ?>