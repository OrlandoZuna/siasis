    <!-- Modal -->
    <div class="modal modal-success fade permisos-modal-sm" id="permisos" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;">colocar fecha para calcular Permisos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <table class="table table-responsive">
                        <form class="designacion">
                        <tr>
                            <td>
                              <label for="start" class="form-label">Fecha_inicio</label>
                              <input type="date" class="form-control" name="start" id="starttp" min="1970-12-31" max="{{DATE::now()->format('Y-m-d')}}" placeholder="2022-10-12">
                           </td> 
                           <td>
                              <label for="end" class="form-label">Fecha_fin</label>
                              <input type="date" class="form-control" name="end" id="endtp" min="1970-12-31" max="{{DATE::now()->format('Y-m-d')}}"placeholder="2022-10-12">
                           </td> 
                        </tr>
                        </form>

                    </table>
                    <a class="btn btn-success permisos" id= "{{$id_persona}}" onclick="permisos(this.id, url='{{url('rrhh/permisos')}}')" 
                                style="margin-top: 2px; color: #fff"><i class="fa fa-undo"></i> Calcular</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>