<!-- Button trigger modal -->

<!-- Modal -->

<div class="modal fade generalAsistencias" id="asis" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2" style="text-align: center;"><b>Asistencias</b></h4>
            </div>
            <div class="modal-body" id="renderaa" style="background: #CBDEED">
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
                </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/biometric/modals/general-asistencias.blade.php ENDPATH**/ ?>