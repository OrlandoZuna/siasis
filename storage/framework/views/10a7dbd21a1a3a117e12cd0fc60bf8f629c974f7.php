<thead >
  <tr>
    <td width="1%" style="border-left:1px solid white;">Estado</td>
    <td width="20%" style="border-left:1px solid white;">Nombre Completo</td>
    <td width="10%" style="border-left:1px solid white;">C.I</td>
    <td width="6%" style="border-left:1px solid white;">Grupo_Asiganda</td>
    <td width="3%" style="border-left:1px solid white;">T_C</td>
    <td width="13%" style="border-left:1px solid white;">Email</td>
    <td width="12%" style="border-left:1px solid white;">Opciones</td>
  </tr>
</thead>
<tbody>
  <?php $__currentLoopData = $personals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="yestd">
      <td width="3%">          
        <div class="btn-group" style=" margin-left: 0%;" role="group" aria-label="Basic example">
            <a class="btn btn-warning nobaja" id= "<?php echo e($empl->id); ?>" style="margin-top: 2px; color: #fff; border-radius: 20px; background: ; width:5px;" 
            title="HABILITAR A USUARIO PARA REGISTRO DE ASISTENCIA" disabled="true" onclick="nobaja(this.id)"><i class="fa fa-circle-o" style="margin-left: -5px;"></i></a>
            <a class="btn btn-danger baja" id= "<?php echo e($empl->id); ?>" style="margin-top: 1px; border-radius: 20px; background: ; width:5px; text-aling: center;" 
            title="DAR DE BAJA USUARIO PARA LOS REGISTROS DE ASISTENCIA" onclick="baja(this.id)"><i class="fa fa-circle" style="margin-left: -5px;"></i></a>
        </div>
      </td>
      <td width="20%"><?php echo e($empl->nombres); ?>  <?php echo e($empl->apellido_paterno); ?>  <?php echo e($empl->apellido_materno); ?></td>
      <td width="10%"><?php echo e($empl->ci); ?> <?php echo e($empl->ext); ?></td>
      <?php if(Count($grupopersona)>0): ?>
      <?php
        $nombregrupo= 'No asisnado';
        $id_grupo= '';
        foreach ($grupopersona as $key => $grupo) {
          if ($grupo->personal_id == $empl->id) {
            $nombregrupo = $grupo->nonbre_grupotrabajo;
            $id_grupo = $grupo->grupo_trabajo_id;
          }
        }
      ?>
      <td width="6%">
          <?php echo e($nombregrupo); ?>

      </td>
      <?php else: ?>
      <td width="6%">$nombregrupo</td>
      <?php endif; ?>
      <?php if($empl->id_tipo_contrato!=null): ?>
      <?php
        $tipoc="Sin T_C";
        $nombrec="ninguno";
        foreach ($tipocontrato as $key => $contrato) {
          if ($contrato->id == $empl->id_tipo_contrato) {
            $tipoc = $contrato->tipo;
            $nombrec= $contrato->nombre_tipo_contrato;
          }
        }
      ?>
      <td width="6%" title="<?php echo e($nombrec); ?>">
          <?php echo e($tipoc); ?>

      </td>
      <?php else: ?>
      <td width="6%"> Sin T_C</td>
      <?php endif; ?>
      <?php if($empl->correo_electronico == null): ?>
      <td width="13%">No Registrado</td> 
      <?php else: ?>
      <td width="13%"><?php echo e($empl->correo_electronico); ?></td>
      <?php endif; ?>
      <td width="12%">
        <center>
        <!-- <a href="<?php echo e(url("rrhh/meses")); ?>" title="Meses"><i class="fa fa-edit"></i></a> -->
        <div class="dropdown show">
          <a class="btn btn-success btn-asistencias dropdown-toggle" href="#" title=" designar a un grupo al usuario :<?php echo e($empl->nombres); ?>" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-users" style="color:white;"></i></a>
          <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
            <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a class="dropdown-item text-center valores" data-id="<?php echo e($grupo->id); ?>" id="<?php echo e($empl->id); ?>" onclick="designargrupo(this.id, idg='<?php echo e($grupo->id); ?>', url='<?php echo e(url('rrhh/guardarengrupo')); ?>')"><?php echo e($grupo->nombre_trabajo); ?></a> <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
        <a class='btn btn-enventos' id="<?php echo e($empl->id); ?>" title=" ir a Eventos de salida del usuario :<?php echo e($empl->nombres); ?>" onclick="ajaxRenderSection(url='<?php echo e(url('rrhh/eventossalida')); ?>', this.id)">
        <i class="fa fa-tags" style="color:white;"></i></a>
        <a class='btn btn-success btn-asistenciaspersonales' id="<?php echo e($empl->id); ?>" title=" ir a Asistencias del usuario :<?php echo e($empl->nombres); ?>" onclick=" ajaxRenderSection3(this.id, url='<?php echo e(url('rrhh/asistenciasPersonal')); ?>')"><i class="fa fa-file-text"></i></a>
        <a class='btn btn-primary' id="<?php echo e($empl->id); ?>" title="ir a desigancio de: <?php echo e($empl->nombres); ?>" onclick=" ajaxRenderSectionDesignacion(this.id, url='<?php echo e(url('rrhh/asistenciasDesignacion')); ?>')"><i class="fa fa-calendar-check-o"></i></a>
        </center>
      </td>
    </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <tr style="display:inline;">
    <td style="border:none;position:absolute;bottom:15px;right:0px;left:0px;">
    <?php echo e($personals->links()); ?>

    </td>
  </tr>
</tbody><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/personal/kardex/search.blade.php ENDPATH**/ ?>