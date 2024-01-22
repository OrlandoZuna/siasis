    <!-- Modal -->
    <div class="modal modal-success fade designarpersonal-modal-sm" id="modelIdpersonal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;">Designacion de Horarios Personal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <table class="table table-responsive">
                        <form class="designacion">
                        <tr>
                           <td>
                            <label for="horario_id" class="form-label">Horarios</label>
                            <select class="form-control" name="horario_id" id="horario_id">
                                @foreach ($hoursi as $hour );
                                    <option value="0" selected disabled hidden>seleccione</option>
                                    <option value="{{$hour->id}}">{{$hour->name}}</option>
                                @endforeach
                                
                            </select>
                           </td> 
                           <td>
                              <label for="personal" class="form-label">Personas</label>
                              <input type="text" class="form-control" name="personal" id="personal" value = "{{ $persona->nombres.' '.$persona->apellido_paterno }}"readonly>
                           </td> 
                           <td hidden="true">
                              <label for="personal_id" class="form-label">Personas</label>
                              <input type="text" class="form-control" name="personal_id" id="personal_id" value = "{{ $id_persona }}"readonly>
                           </td> 
                        </tr>

                        <tr>
                            <td>
                              <label for="start" class="form-label">Fecha_inicio</label>
                              <input type="date" class="form-control" name="start" id="start" placeholder="2022-10-12" readonly>
                           </td> 
                           <td>
                              <label for="end" class="form-label">Fecha_fin</label>
                              <input type="date" class="form-control" name="end" id="end" placeholder="2022-10-12" readonly>
                           </td> 
                        </tr>
                        </form>

                    </table>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary designarGuardarPersonal">Save</button>

                </div>

            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).on('click','.designarGuardarPersonal', function(e) {

        var personal_id= $('#personal_id').val();
        var horario_id= $('#horario_id').val();
        var start = $('#start').val();
        var end = $('#end').val();
        $.ajax({
            url: "{{url("rrhh/createdesignacioPersonalgrupo")}}",
            type: "get",
            data: {personal_id, horario_id, start, end},
            success: function(data) {
                if(data.resp==200){
                    toastr.success("Creado correctamente la designacion de horario");
                    calendar.refetchEvents();
                }
                else if(data.resp==250){
                    toastr.warning("ya esta existe una desiganacion de horario con 1 dia de jornada valorada");
                    calendar.unselect();

                }
                else if(data.resp==20000){
                    toastr.info("NO ESTA EN NINGUN GRUPO");
                    calendar.unselect();
                }
                else {
                    toastr.error("ya estan registrada un horario en la fecha");
                    calendar.unselect();
                }
                $("#modelIdpersonal").modal("hide");
                $('#horario_id').val(0);
                calendar.unselect();
            },
        
        });
        
    });
</script>