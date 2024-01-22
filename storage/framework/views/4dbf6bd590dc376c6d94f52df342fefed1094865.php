<div class="modal modal-success fade edit-modal-sm" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2"><b>Editar Designacion Grupo de Trabajo de personas</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
                <h4>Editar</h4>
                <?php echo Form::open(); ?>

                <?php echo Form::hidden('id_edit',null,["value"=>"0","id"=>'id_edit']); ?>

                <table class="table table-responsive">
                        <tr>
                           <td>
                            <label for="grupo_trabajo_id" class="form-label">GrupoTrabajos</label>
                            <select class="form-control" name="grupo_trabajo_id" id="id_grupotrabajo_edit">
                                <?php $__currentLoopData = $grupotrabajo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trabajo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>;
                                    <option value="0" selected disabled hidden>seleccione</option>
                                    <option value="<?php echo e($trabajo->id); ?>"><?php echo e($trabajo->nombre_trabajo); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                            </select>
                           </td> 
                           <td>
                              <label for="nonbre_grupotrabajo" class="form-label">Nombre de Grupo de Trabajo</label>
                              <input type="text" class="form-control" name="nonbre_grupotrabajo" id="nonbre_grupotrabajo_edit" readonly>
                           </td> 
                        </tr>
                        <tr>
                            <td>
                              <label for="personal_id" class="form-label">ID persona y Nombre</label>
                              <input type="text" class="form-control" name="personal_id" id="id_persona_edit" readonly>
                           </td> 
                           <td>
                              <label for="ci" class="form-label">Ci Persona</label>
                              <input type="text" class="form-control" name="ci" id="ci_edit" readonly>
                           </td> 
                        </tr>
                </table>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveDG"> save</button>
                <?php echo Form::close(); ?>


            </div>

        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/designaciongrupo/modals/modal-edit.blade.php ENDPATH**/ ?>