<table class="table__kirito table-bordered"  id="table" name="table">
        <thead>
        <tr>
        <th>Id_Bio</th>
        <th>Id_Us</th>
        <th>Nro_Re</th>
        <th>Estado</th>
        <th>Fecha_hora</th>
        <th>Tipo</th>
        </tr>
        </thead>
        <tbody id="tbody">
        <?php $__currentLoopData = $asistencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asistencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td> <?php echo e($asistencia->id_biometrico); ?></td>
            <td> <?php echo e($asistencia->id_user_b); ?></td>
            <td> <?php echo e($asistencia->Nregistro); ?></td>
            <td> <?php echo e($asistencia->state); ?></td>
            <td> <?php echo e($asistencia->timestamp); ?></td>
            <td> <?php echo e($asistencia->type); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
</table>
<div class="row">  
<div class="col-lg-12 text-center">
    <?php echo e($asistencias->links()); ?>

</div>
</div><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/biometric/renderasisactual.blade.php ENDPATH**/ ?>