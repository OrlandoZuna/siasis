<table class="table__kiri table-bordered" style="width:99%">
  <thead>
  <tr >
    <th>Title</th>
    <th>Reg_de</th>
    <th>Ci_a</th>
    <th>ID_H</th>
    <th>ID_P</th>
    <th>Descripcion</th>
    <th>Inicio</th>
    <th>Fin</th>
    <th>Hora</th>
    <th>Turno_a</th>
    <th>Tipo_a</th>
    <th>Estado_a</th>
    <!-- <th>Color</th> -->
    <th>Opc.</th>
  </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $actualss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr class="">
        <td> <?php echo e($asis->title); ?></td>
        <td> <?php echo e($asis->nombre); ?></td>
        <td> <?php echo e($asis->ci_a); ?></td>
        <td> <?php echo e($asis->id_horario); ?></td>
        <td> <?php echo e($asis->id_persona); ?></td>
        <td> <?php echo e($asis->descripcion); ?></td>
        <td> <?php echo e($asis->start); ?></td>
        <td> <?php echo e($asis->end); ?></td>
        <td> <?php echo e($asis->hora); ?></td>
        <td> <?php echo e($asis->turno_a); ?></td>
        <td> <?php echo e($asis->tipo_a); ?></td>
        <td bgcolor="<?php echo e($asis->color); ?>" style="color: #fff;"> <?php echo e($asis->estado_a); ?></td>
        <!-- <td bgcolor="<?php echo e($asis->color); ?>">
                    <?php echo e($asis->color); ?>

        </td> -->
        <td>
            <center>
                <?php if (Auth::check() && Auth::user()->hasPermission('editar.horario')): ?>
                <a href="#" id="<?php echo e($asis->id); ?>" class="btn btn-primary" title="editar <?php echo e($asis->id); ?>" onclick="ver(this.id)" data-toggle="modal" 
                data-target=".edit-modal-sm" style="text-align: center; padding: 1px; margin: 2px; margin-left: 30%; border-radius: 10px !!important; "><i class="fa fa-edit" ></i></a>
                <?php endif; ?>
            </center>
        </td> 
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<div class="row">  
<div class="col-lg-12 text-center">
    <?php echo e($actualss->links()); ?>

</div>
</div><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/AsistenciasActuales/vistaAsistenciasrender.blade.php ENDPATH**/ ?>