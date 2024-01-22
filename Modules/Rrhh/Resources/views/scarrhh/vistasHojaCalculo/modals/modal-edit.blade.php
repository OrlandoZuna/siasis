<div class="modal modal-success fade edit-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel2"><b>Ver Evento Salida</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
                {!! Form::hidden('id_edit',null,["value"=>"0","id"=>'id_edit'])!!}
            
                    <table class="table table-responsive">
                        <tr>
                            <td>
                                <div class="form-group">
                                <label for="title">Nombre</label>
                                <input type="text" 
                                    class="form-control" name="title" id="title_edit" aria-describedby="helpId" placeholder="escribe el titulo" readonly>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                <label for="tiposalida">Tipo Salida Permiso</label>
                                <select class="form-control" name="tiposalida" id="tiposalida_edit">
                                    @foreach($tiposalidas as $salida)
                                    <option value="{{$salida->id}}">{{$salida->nombre_tiposalida}}</option>
                                    @endforeach  
                                </select> 
                                <!-- <input type="text" class="form-control" name="tiposalida" id="tiposalida_edit" aria-describedby="helpId" readonly> -->
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="inicio_time">Fecha_hora_inico</label>
                                <input type="text" class="form-control" name="inicio_time" id="inicio_time_edit" aria-describedby="helpId">
                            </td>
                            <td>
                                <label for="fin_evento" class="form-label">hora_retorno</label>
                                <input type="text" class="form-control" name="fin_evento" id="fin_evento_edit" aria-describedby="helpId">  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="start">Inicio_Evento</label>
                                <input type="date" class="form-control" name="start" id="start_edit">
                            </td>
                            <td>
                                <label for="end">Fin_Evento</label>
                                <input type="date" class="form-control" name="end" id="end_edit">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="id_horario" class="form-label">Asistencia_Evento</label>
                                <select class="form-control id_horario" name="id_horario" id="id_horario_edit">
                                    @foreach($hoursi as $houri)
                                        <option value="{{ $houri->id }}">{{ $houri->name }}</option>
                                    @endforeach
                                </select>
                                <!-- <input type="text" class="form-control" name="id_horario" id="id_horario_edit" aria-describedby="helpId" readonly> -->
                            </td>
                            <td hidden="true">
                                <label for="id_persona" class="form-label">id_persona</label>
                                <input type="text" class="form-control" name="id_persona" id="id_persona_edit" aria-describedby="helpId" readonly>
                            </td>
                            <td>
                                <label for="nombre_p" class="form-label">nombre_p</label>
                                <input type="text" class="form-control" name="nombre_p" id="nombre_p_edit" value="{{ $persona->nombres.' '.$persona->apellido_paterno }}"readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>{!! Form::label('color','Color:') !!}</td>
                            <td colspan="3"><select name="color" id="color_edit" class="form-control my-color" style="color: #fff;">
                                <option value="#2874A6" style='background:#2874A6'>Recomendado para permisos Temporales mañana #2874A6</option>
                                <option value="#2471A3" style='background:#2471A3'>Recomendado para permisos Temporales tarde #2471A3</option>
                                <option value="#9B59B6" style='background:#9B59B6'>Recomendado para permisos entrada mañana #9B59B6</option>
                                <option value="#8E44AD" style='background:#8E44AD'>Recomendado para permisos salida mañana #8E44AD</option>
                                <option value="#1E8449" style='background:#1E8449'>Recomendado para permisos entrada tarde #1E8449</option>
                                <option value="#117A65" style='background:#117A65'>Recomendado para permisos salida tarde #117A65</option>
                                <option value="#F39C12" style='background:#F39C12'>Recomendado para permisos de medio tiempo #F39C12</option>
                                <option value="#34495E" style='background:#34495E'>Recomendado para permisos vacacion #34495E </option>
                                <option value="#717D7E" style='background:#717D7E'>Recomendado para permisos otro #717D7E</option>
                                </select></td>
                        </tr>
                    </table>
                
                <button class="btn btn-primary" id="guardarpp"> Guardar</button>
                <button type="button" class="btn btn-danger" title = "eliminar" id="btn_deleteEvento">Eliminar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
        $(document).on("click","#guardarpp", function(e){
        var id_p = $('#id_edit').val();
        var inicio = $('#inicio_time_edit').val();
        var fin = $('#fin_evento_edit').val();
        var color = $('#color_edit').val();
        var fecha1 = $('#start_edit').val();
        var fecha2 = $('#end_edit').val();
        var id_horario = $('#id_horario_edit').val();
        var id_tiposalida = $('#tiposalida_edit').val();
        console.log(id_p);
        var url = "{{url("rrhh/updateevento")}}";
            $.ajax({
                url: url,
                type:"get",
                data:{id_p, inicio, fin, color, fecha1, fecha2, id_horario, id_tiposalida},
                success:function(datos){
                    if(datos.resp==200){
                        toastr.success("Actualizacion correcta del permiso: "+' '+ datos.permiso);
                        calendar.refetchEvents();
                    }
                    else{
                        toastr.error("No existe permiso a actualizar"); 
                        calendar.unselect();    
                    }
                },error:function(){
                    toastr.error("algo fallo al momento de actualizar");
                }
            });
        $('.edit-modal-sm').modal("hide");
    }) 
</script>

