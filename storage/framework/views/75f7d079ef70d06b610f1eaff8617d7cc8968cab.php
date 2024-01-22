        <table class="table__kiri table-bordered" style="width:99%" id="table" name="table">
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
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asistencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($asistencia->Nregistro); ?></td>
                  <td><?php echo e($asistencia->id_biometrico); ?></td>
                  <td><?php echo e($asistencia->id_user_b); ?></td>
                  <td><?php echo e($asistencia->state); ?></td>
                  <td><?php echo e($asistencia->timestamp); ?></td>
                  <td><?php echo e($asistencia->type); ?></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>
        </table>

        <div class="row">  
        <div class="col-lg-12 text-center">
          <?php echo $data->links(); ?>

        </div>
        </div><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/AsistenciasActuales/paginaciones/pagination_data.blade.php ENDPATH**/ ?>