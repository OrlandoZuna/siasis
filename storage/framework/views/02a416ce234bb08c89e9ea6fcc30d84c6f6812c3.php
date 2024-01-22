    <!-- Modal -->
    <div class="modal modal-success fade designar-modal-sm" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;">Designacion de Horarios</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <table class="table table-responsive">
                        <form class="designacion">
                        <tr>
                           <td>
                            <label for="horario_id" class="form-label">Horarios</label>
                            <select class="form-control" name="horario_id" id="horario_id">
                                <?php $__currentLoopData = $hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>;
                                    <option value="0" selected disabled hidden>seleccione</option>
                                    <option value="<?php echo e($hour->id); ?>"><?php echo e($hour->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                           </td> 
                           <td>
                              <label for="personas" class="form-label">Personas</label>
                              <input type="text" class="form-control" name="personas" id="personas" placeholder=" se asignara horario a todos los usuarios" readonly>
                           </td> 
                        </tr>

                        <tr>
                            <td>
                              <label for="start" class="form-label">Fecha_inicio</label>
                              <input type="date" class="form-control" name="start" id="start" placeholder="2022-10-12">
                           </td> 
                           <td>
                              <label for="end" class="form-label">Fecha_fin</label>
                              <input type="date" class="form-control" name="end" id="end" placeholder="2022-10-12">
                           </td> 
                        </tr>
                        </form>

                    </table>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary designarGuardar">Save</button>

                </div>

            </div>
        </div>
    </div><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/personal/modals/modal-horario-persona.blade.php ENDPATH**/ ?>