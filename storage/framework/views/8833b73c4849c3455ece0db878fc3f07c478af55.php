    <!-- Modal -->
    <div class="modal modal-success fade actualizar-modal-sm" id="grupohorarioactualizar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;"> Actualizar Designacion de Horarios a grupo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: 3px solid white; borde-radius: 3px; background-color: white;"><span aria-hidden="true"> X </span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED" id="modalfechas">
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
                           <select multiple="multiple" class="select2 form-control" name="grupo_id" id="grupo_id_edit" aria-label="seleccione">
                                <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>;
                                    
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
                    <table class="table table-responsive fechas">
                        
                    </table>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary ActualizarGuardar" id="actualizargrupo"> <i class="fa fa-undo"></i> VErificar</button>
                    <button type="button" class="btn btn-success ActualizarGuardar" id="actualizar" onclick="act()" disabled> <i class="fa fa-save"></i> Actualizar</button>
                    <button type="button" class="btn btn-danger eliminarGuardar" id="eliminargrupo"><i class="fa fa-trash"></i> Eliminar</button>

                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        function act(){
            //e.preventDefault();
            var horario = $('#horario_id_edit').val();
            var start = $('#start_edit').val();
            var end = $('#end_edit').val();
            var grupo = $('#grupo_id_edit').val();
            var start1 = $('#start1_edit').val();
            var end1 = $('#end1_edit').val();
           
            console.log(horario, start, end, grupo, start1, end1);
            $.ajax({
                url:"<?php echo e(url("rrhh/updateGeneralgrupo")); ?>",
                type:"get",
                data:{horario, start, end, grupo, start1, end1},
                success:function(datos){
                    if(datos.resp==200){
                        toastr.success("Actualizacion correcta de: " + datos.realizados +" de: " +datos.grupos+"grupos sleccionados");
                        //$(".form-control").get(0).reset();
                        $('.fechas').html(datos.view);
                    }
                    else if(datos.resp==250){
                        toastr.warning("Actualizacion correcta de: " + datos.realizados +" de: " +datos.grupos+"grupos sleccionados");
                        //$(".form-control").get(0).reset();
                        $('.fechas').html(datos.view);
                    }
                    else{
                        toastr.error("No existe horraio en grupos a actualizar");
                        $('.fechas').html(datos.view); 
                    }
                }
            });
            $(".actualizar-modal-sm").modal("hide");
            $('#start1_edit').val('');
            $('#end1_edit').val('');
            $('#horario_id_edit').val(0);
            $('#grupo_id_edit').val(0);
            $('#start_edit').val('');
            $('#end_edit').val('');
            //$(".form-control").get(0).reset();
            $('#actualizar').attr('disabled', 'disabled');
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.select2').select2({
                placeholder: "elija grupo",
            }) 
        });
        $(document).on('click','#actualizargrupo',function(e){
            //e.preventDefault();
            var horario_id = $('#horario_id_edit').val();
            var start = $('#start_edit').val();
            var end = $('#end_edit').val();
            var grupo_id = $('#grupo_id_edit').val();
            console.log(horario_id, start, end, grupo_id);
            $.ajax({
                url:"<?php echo e(url("rrhh/updateGeneralgrupoverificacion")); ?>",
                type:"get",
                data:{horario_id, start, end, grupo_id},
                success:function(datos){
                    if(datos.resp==200){
                        toastr.success(" hay : " + datos.realizados +" para actualizar de: " +datos.grupos+"grupos sleccionados");
                        $('.fechas').html(datos.view);
                        $('#actualizar').removeAttr('disabled', 'disabled');
                    }
                    else if(datos.resp==250){
                        toastr.warning("hay : " + datos.realizados +" para actualizar de: " +datos.grupos+"grupos sleccionados");
                        $('.fechas').html(datos.view);
                        $('#actualizar').removeAttr('disabled', 'disabled');
                    }
                    else{
                        toastr.error("No existe horraio en grupos a actualizar"); 
                        $(".actualizar-modal-sm").modal("hide");
                        $('#horario_id_edit').val(0);
                        $('#grupo_id_edit').val(0);
                        $('#start_edit').val('');
                        $('#end_edit').val('');
                        // $(".form-control").get(0).reset();
                    }
                }
            });
            
            //$(".actualizar-modal-sm").modal("hide");
        });
            ////////delete desiganacion de horarios en general por fecha.//////
        $(document).on('click','#eliminargrupo',function(e){
            //e.preventDefault();
            var horario_id = $('#horario_id_edit').val();
            var start = $('#start_edit').val();
            var end = $('#end_edit').val();
            var grupo_id = $('#grupo_id_edit').val();
            console.log(horario_id, start, end, grupo_id);
            $.ajax({
                url:"<?php echo e(url("rrhh/deleteteGeneralgrupo")); ?>",
                type:"get",
                data:{horario_id, start, end, grupo_id},
                success:function(datos){
                    if(datos.resp==200){
                        toastr.success("eliminacion correcta de: " + datos.realizados +" de: " +datos.grupos+"grupos sleccionados");
                        calendar.unselect();
                    }
                    else if(datos.resp==250){
                        toastr.warning("eliminacion correcta de: " + datos.realizados +" de: " +datos.grupos+"grupos sleccionados");
                        calendar.unselect();
                    }
                    else{
                        toastr.error("No existe horraio en grupos a eliminar"); 
                    }
                }
            });
            $(".actualizar-modal-sm").modal("hide");
            $('#horario_id_edit').val(0);
            $('#grupo_id_edit').val(0);
            $('#start_edit').val('');
            $('#end_edit').val('');
            $(".form-control").get(0).reset();
        });
    </script><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/grupohorario/modals/modal-actualizar.blade.php ENDPATH**/ ?>