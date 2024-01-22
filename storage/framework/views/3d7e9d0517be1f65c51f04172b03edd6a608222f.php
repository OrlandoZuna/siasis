<!-- Button trigger modal -->

<!-- Modal -->

<div class="modal fade generalBiometricos" id="biometri" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2" style="text-align: center;"><b>Biometricos</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
            <table class="table__kirito table-bordered"  id="table" name="table">
                    <thead>
                    <tr>
                    <th>Nombre</th>
                    <th>Ip</th>
                    <th>Puerto</th>
                    <th>Version</th>
                    <th>Modelo</th>
                    <th>Lugar</th>
                    <!-- <th>F_creacion</th> -->
                    </tr>
                    </thead>
                    <tbody id="tbody">
                    <?php $__currentLoopData = $biometricos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $biometrico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td> <?php echo e($biometrico->nombre); ?></td>
                        <td> <?php echo e($biometrico->ip); ?></td>
                        <td> <?php echo e($biometrico->puerto); ?></td>
                        <td> <?php echo e($biometrico->version); ?></td>
                        <td> <?php echo e($biometrico->modelo); ?></td>
                        <td> <?php echo e($biometrico->lugar); ?></td>
                        <!-- <td> <?php echo e($biometrico->fecha_creacion); ?></td> -->
        
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/biometric/modals/vista-general.blade.php ENDPATH**/ ?>