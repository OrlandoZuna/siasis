    <!-- Modal -->
    <div class="modal modal-success fade creategrupo-modal-sm" id="grupohorario" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;">Designacion de Horarios por Grupo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <table class="table table-responsive">
                        <form class="designacion">
                        <tr>
                           <td>
                            <label for="horario_id" class="form-label">Horarios</label>
                            <select class="form-control" name="horario_id" id="horario_id">
                                @foreach ($hours as $hour );
                                    <option value="0" selected disabled hidden>seleccione</option>
                                    <option value="{{$hour->id}}">{{$hour->name}}</option>
                                @endforeach
                                
                            </select>
                           </td> 
                           <td>
                              <label for="grupo_id" class="form-label">Grupos</label>
                              <select multiple class="form-select" name="grupo_id" id="grupo_id" aria-label="City">
                                @foreach ($grupos as $grupo );
                                    <option value="0" selected disabled hidden>seleccione</option>
                                    <option value="{{$grupo->id}}">{{$grupo->nombre_trabajo}}</option>
                                @endforeach
                              </select>
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
                    <button type="button" class="btn btn-primary designargrupo">Save</button>

                </div>

            </div>
        </div>
    </div>