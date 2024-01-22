<div class="modal fade edit-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                <h4 class="modal-title" id="myModalLabel2" style="text-align: center;"><b>Designacion</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
                <!-- {!! Form::open(['route'=>['editar.desigancionpersonal',Crypt::encrypt(0)], 'role' => 'form', 'method' => 'put']) !!} -->
                {!! Form::hidden('id_edit',null,["value"=>"0","id"=>'id_edit'])!!}
                <table class="table table-responsive">
                <form id="formulario"> 
                    <tr>
                        <td>
                            <label for="unidad">Unidad</label>
                            <input type="text" class="form-control" name="unidad" id="unidad_edit" readonly>
                        
                        </td>

                        <td>
                            <label for="title">Titulo</label>
                            <input type="text" class="form-control" name="title" id="title_edit" readonly>
                            
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <label for="ci">Ci Personal</label>
                            <input type="text" class="form-control" name="ci" id="ci_edit" readonly>
                            
                        </td>
                        <td hidden="true">
                            <label for="horario_id">ID_horario</label>
                            <input type="text" class="form-control" name="horario_id" id="horario_id_edit" readonly>
                            
                        </td>

                    </tr>

                    <tr>
                        <td hidden="true">
                            <label for="personal_id">ID_persona</label>
                            <input type="text" class="form-control" name="personal_id" id="personal_id_edit" readonly>
                            
                        </td>
                        <td>
                            <label for="person">persona</label>
                            <input type="text" class="form-control" name="person" id="person_edit" value="{{ $persona->nombres.' '.$persona->apellido_paterno }}" readonly>
                            
                        </td>

                        <td>
                            <label for="nombre_h">Nombre Horario</label>
                            <input type="text" class="form-control" name="nombre_h" id="nombre_h_edit" readonly>
                            
                        </td>   
                    </tr>

                    <tr>
                        <td>
                            <label for="start">Inicio</label>
                            <input type="date" class="form-control" name="start" id="start_edit">
                           
                        </td>
                        <td>
                            <label for="end">Fin</label>
                            <input type="date"class="form-control" name="end" id="end_edit">
                           
                        </td>

                    </tr>
                    <tr hidden="true">
                        <td>
                            <label for="work_day">Valor Turno</label>
                            <input step="any" type="number" class="form-control" name="work_day" id="work_day_edit" readonly>
                           
                        </td>
                        <td>
                            <label for="created_at">Fecha Asignado</label>
                            <input type="text"class="form-control" name="created_at" id="created_at_edit" readonly>
                           
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label for="color">Color</label>
                            <select name="color" id="color_edit" class="form-control my-color" style="color: #fff;" disabled>
                                <option value="#34bab2" style="background: #34bab2">Recomendado para horarios por la Ma&ntilde;ana #34bab2</option>
                                <option value="#2f9c95" style="background: #2f9c95">Recomendado para horarios por la Ma&ntilde;ana #2f9c95</option>
                                <option value="#57d4cc" style="background: #57d4cc">Recomendado para horarios por la Ma&ntilde;ana #57d4cc</option>
                                <option value="#51dbaa" style="background: #51dbaa">Recomendado para horarios por la Tarde #51dbaa</option>
                                <option value="#42b38b" style="background: #42b38b">Recomendado para horarios por la Tarde #42b38b</option>
                                <option value="#80e0be" style="background: #80e0be">Recomendado para horarios por la Tarde #80e0be</option>
                                <option value="#dee080" style="background: #dee080">Recomendado para horarios por la Noche #dee080</option>
                                <option value="#ced149" style="background: #ced149">Recomendado para horarios por la Noche #ced149</option>
                                <option value="#a3a617" style="background: #a3a617">Recomendado para horarios por la Noche#a3a617</option>
                                <option value="#eb343f" style="background: #eb343f">Recomendado para horarios Temporales #eb343f</option>
                                <option value="#c73a42" style="background: #c73a42">Recomendado para horarios Temporales #c73a42</option>
                                <option value="#ba4148" style="background: #ba4148">Recomendado para horarios Temporales #ba4148</option>
                                <option value="#9d84b5" style="background: #9d84b5">Recomendado para horarios Especiales #9d84b5</option>
                                <option value="#9252c4" style="background: #9252c4">Recomendado para horarios Especiales #9252c4</option>
                                <option value="#6d3699" style="background: #6d3699">Recomendado para horarios Especiales #6d3699</option>
                                <option value="#562bb3" style="background: #562bb3">Recomendado para horarios Diarios #562bb3</option>
                                <option value="#451e9c" style="background: #451e9c">Recomendado para horarios Diarios #451e9c</option>
                                <option value="#3c28b8" style="background: #3c28b8">Recomendado para horarios Diarios #3c28b8</option>
                            </select>
                           
                        </td>
                    </tr>

                </form>
                </table>
                <button class="btn btn-primary designaciones" onclick="designar()"><i class="fa fa-save"></i> Guardar</button>
                <button class="btn btn-danger"  id="eliminarDe"><i class="fa fa-trash"></i> Eliminar </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).on('click','#eliminarDe',function(e){
        //e.preventDefault();
        var id = $('#id_edit').val();
        console.log(id);
            var bool=confirm("esta seguro de eliminar este Evento? "+id);
            if(bool){
                $.ajax({
                    url:"{{url("rrhh/deletetedesignacionpersonalgrupo")}}",
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

    function designar(){
        var id= $('#id_edit').val();
        console.log(id);
        var start = $('#start_edit').val();
        var end = $('#end_edit').val();
        $.ajax({
            url: "{{url("rrhh/updateDesgpersonalgrupo")}}",
            type: "get",
            data: {id, start, end},
            success: function(data) {
                if(data.resp==200){
                    toastr.success("editacion correcta");
                    calendar.refetchEvents();
                }
                $(".edit-modal-sm").modal("hide");
            },
        });
        
    }
</script>