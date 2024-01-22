    <!-- Modal -->
    <div class="modal modal-success fade import-modal-sm" id="import" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;">Seleccionar Archivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <?php echo Form::open([ 'route'=>'admin.save.import', 'role' => 'form', 'method' => 'post', 'enctype' => 'multipart/form-data' ]); ?>

                    <table class="table table-responsive" txt-alingcenter>
                        <input type="text" name="id_biometrico" id="id_biometrico" hidden="true">
                        <input type="file" name="import_file" required>
                    </table>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-arrow-circle-up"></i> Importar </button>
                    <a class='btn btn-warning'  href='<?php echo e(url('rrhh/ejemplodes')); ?>'' title="descargar ejemplo"><i class="fa fa-arrow-circle-down"> descargar ejemplo</i></a>
                    <?php echo Form::close(); ?>


                </div>

            </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/biometric/modals/modal-importAsis.blade.php ENDPATH**/ ?>