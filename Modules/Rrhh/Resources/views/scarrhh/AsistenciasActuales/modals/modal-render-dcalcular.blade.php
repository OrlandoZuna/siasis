    <div class="detalles">
        <table class="table table-border table-responsive">
            <!-- <p id="noti">COLORES DE ASISTENCIA</p> -->
            <div class="btn-group" style="text-align: center; margin-left: 30%;" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-dark calendarioIr" style="background-color: #255e7e; width:150px;" onclick="calendario()" disabled="true">Calendario <span class="badge badge-light"><i class="fa fa-calendar"></i></span></button>
                <button type="button" class="btn btn-dark tablaIr"id="{{$id_persona}}"style="background-color: #900c3f; width:150px;" onclick="tabla(this.id)">Tabla <span class="badge badge-light"><i class="fa fa-list"></i></span></button>
                <button type="button" class="btn btn-success" style="background: #255e7e" title="CALCULAR DIAS TRABAJO" data-toggle="modal" data-target="#diastrabajo">
                        Calcular <span class="badge badge-light">D_Trabajo</span>
                </button> 
            </div>
            <thead>
                <tr hidden="true">
                    <th>ATRASOS</th>   
                    <th>ABANDONOS</th>
                    <th>FALTAS</th>
                    <th>TRABAJADO</th>
                    <th>PERMISOS</th>
                    <th>TOTAL DIAS</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <tr id="calcular_dias"> 
                    <td><button type="button" class="btn btn-primary" style="background: #ced149">
                        Atrasos <span class="badge badge-light">{{$atrasos}}</span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style='background: #78281F'>
                        Abandonos <span class="badge badge-light">{{$abandonos}}</span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style="background: #cb0000">
                        Faltas <span class="badge badge-light">{{$faltas}}</span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary">
                        D_Trabajo <span class="badge badge-light">{{$valor}}</span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" >
                        Permisos <span class="badge badge-light">{{$permisos}}</span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" >
                        Total_Dias <span class="badge badge-light">{{$valor+$faltas}}</span>
                        </button> 
                    </td>
                    <td>
                        <a class="btn btn-success" id= "personal" style="margin-top: 2px; color: #fff" title="GENERAR REPORTE PERSONAL" data-toggle="modal" data-target="#fechas" disabled="true"><i class="fa fa-file-pdf-o"></i>  Reporte</a>
                    </td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-primary" style="background: #51dbaa">
                        son <span class="badge badge-light">en hora</span>
                        </button> 
                    </td>
                    <td ><button type="button" class="btn btn-primary" style='background: #3c28b8'>
                        son <span class="badge badge-light">salida</span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style='background: #F39C12'>
                        Permiso <span class="badge badge-light">medio_T</span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style='background: linear-gradient(156deg, #8E44AD, #9B59B6)'>
                        Permiso <span class="badge badge-light">mañana</span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style = 'background: linear-gradient(156deg, #1E8449, #117A65)'>
                        Permiso <span class="badge badge-light">tarde</span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style='background: #717D7E'>
                        Permiso <span class="badge badge-light">otro</span>
                        </button> 
                    </td>
                    <td>
                        <a class="btn btn-warning" id= "habilitar" style="margin-top: 1px;" title="CONCLUIR REVISION ASISTENCIA" onclick="habilitar()"><i class="fa fa-exchange"></i>  Cerrar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>