<div class="modal modal-success fade edit-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2"><b>Editar Tipo de Permiso</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
                <!-- <h4>Editar</h4> -->
                <?php echo Form::open(['route'=>['update.tiposalida',Crypt::encrypt(0)], 'role' => 'form', 'method' => 'put']); ?>

                <?php echo Form::hidden('id_edit',null,["value"=>"0","id"=>'id_edit']); ?>

                <table class="table table-responsive">
                    <tr>

                        <td><?php echo Form::label('nombre_tiposalida','Nombre de Tipo Salida: '); ?></td>
                        <td><?php echo Form::text('nombre_tiposalida',null,["class"=>"form-control","id"=>'nombre_tiposalida_edit']); ?></td>
                    </tr>
                    <tr>
                      <td><?php echo Form::label('bonote','BonoTe: '); ?></td>
                      <td> <select class="form-control" name="bonote" id="bonote_edit">
                          <option value="no">No incluye bonote</option>
                          <option value="si">Incluye Bonote</option>
                        </select>
                      </td>
                    </tr>

                </table>
                <button class="btn btn-primary" type="submit"><i class="fa fa-repeat"></i> Guardar </button>
                <?php echo Form::close(); ?>


            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/tiposalida/modals/modal-edit.blade.php ENDPATH**/ ?>