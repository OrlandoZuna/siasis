<table class="table__kirito table-bordered"  id="table" name="table">
    <thead>
        <tr>
            <th>Nregistro</th>
            <th>Id_Biometrico</th>
            <th>Id_usuario</th>
            <th>State</th>
            <th>timestamp</th>
            <th>type_Re</th>
    </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $asistencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asistencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($asistencia->Nregistro); ?></td>
            <td id='id_b'><?php echo e($asistencia->id_biometrico); ?></td>
            <td><?php echo e($asistencia->id_user_b); ?></td>
            <td><?php echo e($asistencia->state); ?></td>
            <td><?php echo e($asistencia->timestamp); ?></td>
            <td><?php echo e($asistencia->type); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div style="position: relative; display:inline-block;">
    <?php echo e($asistencias->links()); ?>

</div>

<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/biometric/modals/mostrar-asistencias.blade.php ENDPATH**/ ?>