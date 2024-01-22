    <div class="modal modal-success fade create-modal-sm" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;">Designacion Grupo de Trabajo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <table class="table table-responsive">
                        <form class="designacion">
                        <tr>
                           <td>
                            <label for="id_grupotrabajo" class="form-label">GrupoTrabajos</label>
                            <select class="form-control" name="id_grupotrabajo" id="id_grupotrabajo">
                                <?php $__currentLoopData = $grupotrabajo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trabajos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>;
                                    <option value="0" selected disabled hidden>seleccione</option>
                                    <option value="<?php echo e($trabajos->id); ?>"><?php echo e($trabajos->nombre_trabajo); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                           </td> 
                        </tr>
                        <tr>
                            <td>
                              <label for="ci" class="form-label">CI Persona</label>
                              <input type="text" class="form-control" name="ci" id="ci" required placeholder="coloque ci de la persona">
                           </td> 

                        </tr>
                        </form>

                    </table>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary designarGrupoGuardar">Save</button>

                </div>

            </div>
        </div>
    </div<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/designaciongrupo/modals/modal-create.blade.php ENDPATH**/ ?>