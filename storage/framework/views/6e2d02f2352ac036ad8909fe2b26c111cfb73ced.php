<div class="modal fade edit-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" id="myModalLabel2" style="text-align: center;"><b>Asistencia</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
                <!-- <?php echo Form::open(['route'=>['editar.asistenciaactual',Crypt::encrypt(0)], 'role' => 'form', 'method' => 'put']); ?> -->
                <?php echo Form::hidden('id_edit',null,["value"=>"0","id"=>'id_edit']); ?>

                <table class="table table-responsive">
                <form id="formulario"> 
                    <tr>
                        <td>
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre_edit" readonly>
                        
                        </td>

                        <td>
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" name="title" id="title_edit" readonly>
                            
                        </td>

                    </tr>

                    <tr hidden="true">
                        <td>
                            <label for="ci_a">Ci_a</label>
                            <input type="text" class="form-control" name="ci_a" id="ci_a_edit" readonly>
                            
                        </td>
                        <td>
                            <label for="id_horario">ID_horario</label>
                            <input type="text" class="form-control" name="id_horario" id="id_horario_edit" readonly>
                            
                        </td>

                    </tr>

                    <tr>
                        <td hidden="true">
                            <label for="id_persona">ID_persona</label>
                            <input type="text" class="form-control" name="id_persona" id="id_persona_edit" readonly>
                            
                        </td>
                        <td>
                            <label for="person">persona</label>
                            <input type="text" class="form-control" name="person" id="person_edit" value="<?php echo e($persona->nombres.' '.$persona->apellido_paterno); ?>" readonly>
                            
                        </td>

                        <td>
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion_edit" required>
                            
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <label for="start">Inicio</label>
                            <input type="text" class="form-control" name="start" id="start_edit" readonly>
                           
                        </td>
                        <td>
                            <label for="end">Fin</label>
                            <input type="text"class="form-control" name="end" id="end_edit" readonly>
                           
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <label for="hoa">Hora Registro</label>
                            <input type="text" class="form-control" name="hora" id="hora_edit">
                           
                        </td>
                        <td>
                            <label for="turno_a">Turno Asistencia</label>
                            <input type="text"class="form-control" name="turno_a" id="turno_a_edit" readonly>
                           
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="tipo_a">Tipo Asistencia</label>
                            <input type="text" class="form-control" name="tipo_a" id="tipo_a_edit" readonly>
                           
                        </td>
                        <td>
                            <label for="estado_a">Estado Asistencia</label>
                            <select class="form-control" name="estado_a" id="estado_a_edit">
                                <option value="en hora">en hora</option> <!-- en hora-->
                                <option value="atrasado">atrasado</option> <!-- atrasado-->
                                <option value="permiso">permiso</option>
                                <option value="falta">falta a horario</option> <!-- salida horario-->
                                <option value="salida">salida de horario</option> 
                                <option value="abandono">Abandono de horario</option>  <!--  fata-->
                            </select>
                          
                        </td>
                    </tr>
                    <tr>    
                        <td colspan="3">
                            <label for="color">Color</label>
                            <select name="color" id="color_edit" class="form-control my-color" style="color: #fff;">
                                <option value="#51dbaa" style="background: #51dbaa">Recomendado para registro en hora #51dbaa</option> <!-- en hora-->
                                <option value="#ced149" style="background: #ced149">Recomendado para registro atrasado #ced149</option> <!-- atrasado-->
                                <option value="#cb0000" style="background: #cb0000">Recomendado para horario no asistido #cb0000</option> <!-- salida horario-->
                                <option value="#3c28b8" style="background: #3c28b8">Recomendado para salida de horario #3c28b8</option>  <!--  fata-->
                                <option value="#2874A6" style='background: #2874A6'>Recomendado para permisos Temporales mañana #2874A6</option>
                                <option value="#2471A3" style='background: #2471A3'>Recomendado para permisos Temporales tarde #2471A3</option>
                                <option value="#9B59B6" style='background: #9B59B6'>Recomendado para permisos entrada mañana #9B59B6</option>
                                <option value="#8E44AD" style='background: #8E44AD'>Recomendado para permisos salida mañana #8E44AD</option>
                                <option value="#1E8449" style='background: #1E8449'>Recomendado para permisos entrada tarde #1E8449</option>
                                <option value="#117A65" style='background: #117A65'>Recomendado para permisos salida tarde #117A65</option>
                                <option value="#F39C12" style='background: #F39C12'>Recomendado para permisos de medio tiempo </option>
                                <option value="#34495E" style='background: #34495E'>Recomendado para permisos vacacion #34495E </option>
                                <option value="#717D7E" style='background: #717D7E'>Recomendado para permisos otro #717D7E</option>
                                <option value="#78281F" style='background: #78281F'>Recomendado para abandono #78281F </option> 
                            </select>
                           
                        </td>
                    </tr>

                </form>
                </table>
                <button class="btn btn-primary actualizarasis" id="acualiAa" type="submit"><i class="fa fa-save"></i> Guardar</button>
                <button class="btn btn-warning eliminarasis" type=""><i class="fa fa-trash"></i> eliminar</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click",".actualizarasis", function(e){
        var id_a = $('#id_edit').val();
        var descripcion = $('#descripcion_edit').val();
        var hora = $('#hora_edit').val();
        var estado = $('#estado_a_edit').val();
        var color = $('#color_edit').val();
        console.log(id_a, descripcion, hora, estado, color);
        var url = "<?php echo e(url("rrhh/updateAsistenciaAc")); ?>";
            $.ajax({
                url: url,
                type:"get",
                data:{id_a, descripcion, hora, estado, color},
                success:function(datos){
                    if(datos.resp==200){
                        toastr.success("Actualizacion correcta de la asistencia: "+' '+ datos.asistencias);
                        calendar.unselect();
                        calendar.refetchEvents();
                    }
                    else{
                        toastr.error("No existe horraio en grupos a actualizar"); 
                        calendar.unselect();    
                    }
                }
            });
        $('.edit-modal-sm').modal("hide");
    })  
    
    $(document).on('click','.eliminarasis',function(e){
            //e.preventDefault();
            console.log($('#id_edit').val() + 'desde eliminar')
            var id = $('#id_edit').val();
            console.log(id);
                var bool=confirm("esta seguro de eliminar esta asistencia? "+id);
                if(bool){
                    $.ajax({
                        url:"<?php echo e(url("rrhh/deleteAsistencia")); ?>",
                        type:"get",
                        data:{"id":id},
                        success:function(datos){
                            if(datos.resp==200){
                                toastr.success("Eliminacion correcta");
                                calendar.refetchEvents();
                            }
                        }
                    });
                }
            $(".edit-modal-sm").modal("hide");
        });
</script><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/AsistenciasActuales/modals/edit.blade.php ENDPATH**/ ?>