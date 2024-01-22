<div class="modal fade create-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2"><b>Nuevo Grupo de Trabajo</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
                <h4>Nuevo</h4>
              
                <?php echo Form::open(['route'=>'save.trabajo', 'role' => 'form', 'method' => 'post']); ?>

                <table class="table table-responsive">
                    
                    <tr>
                        <td><?php echo Form::label('nombre_trabajo','Nombre Grupo de Trabajo: '); ?></td>
                        <td><?php echo Form::text('nombre_trabajo',null,["class"=>"form-control"]); ?></td>
                    </tr>

                </table>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/grupotrabajo/modals/modal-create.blade.php ENDPATH**/ ?>