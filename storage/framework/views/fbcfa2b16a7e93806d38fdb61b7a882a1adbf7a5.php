    <!-- Modal -->
    <div class="modal modal-success fade actualizar-modal-sm" id="grupohorarioactualizar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;"> Actualizar Designacion de Horarios a grupo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <table class="table table-responsive">
                        <form class="designacion">
                        <tr>
                           <td>
                            <label for="horario_id" class="form-label">Horarios</label>
                            <select class="form-control" name="horario_id" id="horario_id_edit">
                                <?php $__currentLoopData = $hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>;
                                    <option value="0" selected disabled hidden>seleccione</option>
                                    <option value="<?php echo e($hour->id); ?>"><?php echo e($hour->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                           </td> 
                           <td>
                           <label for="grupo_id" class="form-label">Grupos</label>
                           <select class="form-control" name="grupo_id" id="grupo_id_edit">
                                <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>;
                                    <option value="0" selected disabled hidden>seleccione</option>
                                    <option value="<?php echo e($grupo->id); ?>"><?php echo e($grupo->nombre_trabajo); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </select>
                           </td> 
                        </tr>

                        <tr>
                            <td>
                              <label for="start" class="form-label">Fecha_inicio</label>
                              <input type="date" class="form-control" name="start" id="start_edit" placeholder="2022-10-12">
                           </td> 
                           <td>
                              <label for="end" class="form-label">Fecha_fin</label>
                              <input type="date" class="form-control" name="end" id="end_edit" placeholder="2022-10-12">
                           </td> 
                        </tr>
                        </form>

                    </table>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ActualizarGuardar" id="actualizargrupo">Guardar</button>
                    <button type="button" class="btn btn-primary eliminarGuardar" id="eliminargrupo">Eliminar</button>

                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).on('click','#actualizargrupo',function(e){
            //e.preventDefault();
            var horario_id = $('#horario_id_edit').val();
            var start = $('#start_edit').val();
            var end = $('#end_edit').val();
            console.log(horario_id, start, end);
            $.ajax({
                url:"<?php echo e(url("rrhh/updateGeneral")); ?>",
                type:"get",
                data:{horario_id, start, end},
                success:function(datos){
                    if(datos.resp==200){
                        toastr.success("Actualizacion correcta de la Designacion de horario");
                        calendar.unselect();
                    }
                    else if(datos.resp==250){
                        toastr.warning("No existe horarios desiganados en rango de fechas mencionadas");
                        calendar.unselect();
                    }
                }
            });
            $(".actualizar-modal-sm").modal("hide");
            $('#horario_id_edit').val(0);
            $('#start_edit').val('');
            $('#end_edit').val('');
        });
            ////////delete desiganacion de horarios en general por fecha.//////
        $(document).on('click','#elimiargrupo',function(e){
            //e.preventDefault();
            var horario_id = $('#horario_id_edit').val();
            var start = $('#start_edit').val();
            var end = $('#end_edit').val();
            console.log(horario_id, start, end);
            $.ajax({
                url:"<?php echo e(url("rrhh/deleteteGeneral")); ?>",
                type:"get",
                data:{horario_id, start, end},
                success:function(datos){
                    if(datos.resp==200){
                        toastr.success("Eliminacion correcta de la Designacion de horario a todos los usuarios en el rango de fechas seleccionados");
                        calendar.unselect();
                    }
                    else if(datos.resp==250){
                        toastr.warning("No se elimino los horarios desiganados en rango de fechas seleccionadas");
                        calendar.unselect();
                    }
                }
            });
            $(".actualizar-modal-sm").modal("hide");
            $('#horario_id_edit').val(0);
            $('#start_edit').val('');
            $('#end_edit').val('');
        });
    </script><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/grupohorario/modals/modal-edit.blade.php ENDPATH**/ ?>