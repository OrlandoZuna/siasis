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

                    <table class="table table-responsive">
                        <input type="file" name="import_file">
                    </table>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Importar </button>
                    <?php echo Form::close(); ?>

  
                </div>

            </div>
        </div>
    </div>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/reportes/modals/modal-importAsis.blade.php ENDPATH**/ ?>