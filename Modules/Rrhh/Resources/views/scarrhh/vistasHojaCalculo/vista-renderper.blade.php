    <div class="detalles">
        <table class="table table-border table-responsive">
            <div class="btn-group" style="text-align: center; margin-left: 30%;" role="group" aria-label="Basic example">
                <a class="btn btn-success" id= "personali" style="margin-top: 2px; color: #fff; border-radius: 30px; background: #005c53; width:150px;" title="GENERAR REPORTE PERSONAL" disabled="true" data-toggle="modal" data-target="#fechaspermiso"><i class="fa fa-file-pdf-o"></i>  Reporte</a>
                <a class="btn btn-primary" id= "habilitari" style="margin-top: 1px;border-radius: 30px; background: #003049; width:150px;" title="CONCLUIR CENTRALIZACION DE PERMISOS" onclick="habilitari()"><i class="fa fa-exchange"></i>  Cerrar</a>
                <a type="button" class="btn btn-primary" style="margin-top: 2px; border-radius: 30px; background: #5f0f40; width:150px;" title="CALCULAR PERMISOS" data-toggle="modal" data-target="#permisos">
                        Calcular <span class="badge badge-light">T_permiso</span>
                </a>
            </div>
            <thead>
                <tr hidden="true">
                    
                    <th>PER_DIA</th>   
                    <th>PER_MTI.</th>
                    <th>PER_TCO.</th>
                    <th>PER_FSE.</th>
                    <th>TOTAL_P.</th>
                </tr>
            </thead>
            <tbody>
                <tr id="calcular_permisos">
                    
                    <td><button type="button" class="btn btn-primary" style="background: linear-gradient(156deg, #8E44AD, #9B59B6);">
                        P_Hora <span class="badge badge-light"> {{$perH}} </span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style='background: #F39C12'>
                        P_Me_Tiempo<span class="badge badge-light"> {{$perMT}} </span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style="background: #34495e">
                        P_T_Completo <span class="badge badge-light"> {{$perTC}} </span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style="background: #9fc131">
                        P_F_semana <span class="badge badge-light"> {{$perFS}} </span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style='background: #3c28b8'>
                        T_Permisos <span class="badge badge-light"> {{$permisos}} </span>
                        </button> 
                    </td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-primary" style = 'background: linear-gradient(156deg, #1E8449, #117A65)'>
                        T_Horas <span class="badge badge-light"> {{$perHT}} </span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style='background: #FB8B24'>
                        T_Horas <span class="badge badge-light"> {{$perMTT}} </span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary" style='background:#717E7D'>
                        T_Horas <span class="badge badge-light"> {{$perTCT}} </span>
                        </button> 
                    </td>
                    <td ><button type="button" class="btn btn-primary" style='background: #dbf227'>
                        T_Horas <span class="badge badge-light"> {{$perFST}} </span>
                        </button> 
                    </td>
                    <td><button type="button" class="btn btn-primary">
                        T_Horas <span class="badge badge-light"> {{$perTP}} </span>
                        </button> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>