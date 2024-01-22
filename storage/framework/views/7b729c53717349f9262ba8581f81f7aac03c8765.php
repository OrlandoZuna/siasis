<table class="table__kiri table-bordered" style="width:99%">
  <thead>
  <tr >
    <th>Id_ho</th>
    <th>Id_per</th>
    <th>Ci_a</th>
    <th>Turno_a</th>
    <th>Tipo_a</th>
    <th>Estado_a</th>
    <th>Fecha</th>
    <th>Hora</th>
  </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>:
      <tr class="">
        <td> <?php echo e($asis->id_horario); ?></td>
        <td> <?php echo e($asis->id_persona); ?></td>
        <td> <?php echo e($asis->ci_a); ?></td>
        <td> <?php echo e($asis->turno_a); ?></td>
        <td> <?php echo e($asis->tipo_a); ?></td>
        <td> <?php echo e($asis->estado_a); ?></td>
        <td> <?php echo e($asis->fecha); ?></td>
        <td> <?php echo e($asis->hora); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<div class="row">  
  <div class="col-lg-12 text-center">
    <?php echo $data1->links(); ?>

  </div>
</div><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/AsistenciasActuales/paginaciones/pagination_dataapp.blade.php ENDPATH**/ ?>