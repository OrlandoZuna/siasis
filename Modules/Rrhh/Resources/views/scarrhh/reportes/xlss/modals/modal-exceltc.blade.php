    <!-- Modal -->
    <div class="modal modal-success fade reporteexcel-modal-sm" id="reporteexcel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;">Colocar datos para el reporte Resumido de asistencias de Tipo de Contrato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <table class="table table-responsive">
                        <form class="reporte">
                        <tr>
                           <td>
                           <label for="ex" class="form-label">Tipo de Contrato</label>
                           <select class="form-control" name="ex" id="ex">
                                @foreach ($tipocontrato as $contrato );
                                    <option value="0" selected disabled hidden>seleccione</option>
                                    <option value="{{$contrato->id}}">{{$contrato->nombre_tipo_contrato}}</option>
                                @endforeach 
                            </select>
                           </td> 
                        </tr>

                        <tr>
                            <td>
                              <label for="fecha1ex" class="form-label">Fecha_inicio</label>
                              <input type="date" class="form-control" name="fecha1ex" id="fecha1ex" placeholder="2022-10-12">
                           </td> 
                           <td>
                              <label for="fecha2ex" class="form-label">Fecha_fin</label>
                              <input type="date" class="form-control" name="fecha2ex" id="fecha2ex" placeholder="2022-10-12">
                           </td> 
                        </tr>
                        </form>

                    </table>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success reporteexcel" id="reporteexcelgenerar"> <i class="fa fa-download"></i>  Descargar</button>
                    <!-- <a class="as" id="as" target="_blank"></a> -->

                </div>

            </div>
        </div>
    </div>