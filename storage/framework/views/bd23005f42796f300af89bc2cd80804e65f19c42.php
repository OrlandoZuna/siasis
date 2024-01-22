
<div class="conatiner">

        <style type="text/css">

            #wrap {
                margin: 3px auto;
                padding: 0 10px;
                
            }
            #calendar-wrap {
                /*display: inline; */
                border: 1px solid #fcfcfc ;
                margin: 10px;
                margin-bottom: 30px;
                min-width: 400px;
                /* max-width: 1100px; */
                width: 99%;
            }

            #top {
                background: #eee;
                margin-top: 10px;
                border-bottom: 1px solid #ddd;
                padding: 0 10px;
                line-height: 40px;
                font-size: 12px;
            }
            h2 {
                text-align: center;
                font-weight: bold;
                font-family: monospace;
            }

            #calendar {
                width: 100%;
                /* max-width: 1100px; */
                margin: 10px ;
                padding: 0 10px;
                background: linear-gradient(156deg, #99cdff, #336799);
            }
            .table__kiri{
                margin-top: -31px;
            }
            .table__kiri thead {
                background: #113F63;
                color: #fff;
            }

            .table__kiri thead tr {
                height: 25px;
            }

            .table__kiri thead tr th {
                text-align: center;
                /* width: 12%; */
                border: 1px solid #fff;
                /* text-transform: uppercase; */
                font-size: 12px;
            }

            .table__kiri tbody tr {
                height: 14px;
            }

            .table__kiri tbody tr td {
                text-align: center;
                border: 1px solid orange;
                text-transform: uppercase;
                font-size: 10px;
                font-weight: bold;
            }

            .table__kiri tbody tr:nth-child(even) {
                background: #fff;
            }
            .detalles {
                width: 100%;
                margin-left: 15px;
                
            }

            #tabla{
                margin-top: -15px;
                
            }
            #tabla h2{
                
                margin-top: 0px;
           
            }
        </style>
        <script type="text/javascript">

            var initialLocaleCode = 'es';
            //var initialMonth = new month()
            var initialDate = new Date();
            var localeSelectorEl = document.getElementById('locale-selector');

            var calendarEl = document.getElementById('calendar');
            var drop;


            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                initialDate: initialDate,
                locale: initialLocaleCode,
                navLinks: true, // can click day/week names to navigate views
                //selectable: true,
                selectMirror: true,
                droppable: true,

                drop: function(arg) {
                    console.log(arg);
                    drop=arg;
                    // is the "remove after drop" checkbox checked?
                    if (document.getElementById('drop-remove').checked) {
                    // if so, remove the element from the "Draggable Events" list
                    arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                    console.log(arg.draggedEl);
                    }
                },                
                eventClick: function(arg) {
                    var evento = arg.event;
                    console.log(evento);
                    console.log(evento.id);
                    var title = evento.title;
                    console.log(title);
                    var id = evento.id;

                    if (id == ""){
                        if (confirm('Are you sure you want to delete this event?')) {
                        arg.event.remove()     
                        }
                    }
                    else{
                    $(function () {
                        $("#color_edit").change(function(){
                            $(this).css("background",$(this).val());
                        });
                        $.ajax({
                            // headers:{'X-CSRF_TOKEN':token},
                            url:"<?php echo e(url("rrhh/getAsistenciaActual")); ?>",
                            type:"get",
                            data:{"id":id},
                            success:function(datos){
                                
                                if(datos.resp==200){
                                    toastr.success("editacion correcta");
                                    calendar.unselect();
                                }
                                document.getElementById('title_edit').value=datos[0]["title"];
                                document.getElementById('nombre_edit').value=datos[0]["nombre"];
                                document.getElementById('id_edit').value=datos[0]["id"];
                                document.getElementById('ci_a_edit').value=datos[0]["ci_a"];
                                document.getElementById('id_horario_edit').value=datos[0]["id_horario"];
                                document.getElementById('id_persona_edit').value=datos[0]["id_persona"];
                                document.getElementById('descripcion_edit').value=datos[0]["descripcion"];
                                document.getElementById('start_edit').value=datos[0]["start"];
                                document.getElementById('end_edit').value=datos[0]["end"];
                                document.getElementById('hora_edit').value=datos[0]["hora"];
                                document.getElementById('turno_a_edit').value=datos[0]["turno_a"];
                                document.getElementById('tipo_a_edit').value=datos[0]["tipo_a"];
                                document.getElementById('estado_a_edit').value=datos[0]["estado_a"];
                                document.getElementById('color_edit').value=datos[0]["color"];
                                document.getElementById('color_edit').style.background=datos[0]["color"];

                                if(datos.resp==200){
                                    toastr.success("Editacion correcta correcta");
                                    calendar.unselect();
                                }
                            }
                        });
                        // $("#modelo").attr("data-toggle","modal");
                        // $("#modelo").attr("data-target",".edit-modal-sm");
                    });

                    $(".edit-modal-sm").modal("show");
                    
                    }
                },

                buttonIcons: false, // show the prev/next text
                weekNumbers: true,
                editable: true,
                dayMaxEvents: true,
                events: {
                    url: "<?php echo e(url("rrhh/mostrarasistencias")); ?>",
                    method: "GET",
                    extraParams: {
                        id : '<?php echo e($id_persona); ?>',
                    },
                    textColor: 'white'
                }
            });


            calendar.render();

            $(document).on('click','#btnGuardar',function(e){
                e.preventDefault();
                let formulario = document.getElementById('form');
                const datos =(formulario);
                console.log(formulario);
                console.log($('#title').val());
                console.log($('#id_horario').val());
                console.log($('#inicio').val());
                calendar.unselect();
            
                $(".create-modal-sm").modal("hide");
                $("#title").val('');
                $("#descripcion").val('');
            });



    </script>

    <div id='top'>
        <u style="margin-top: 20px; font-weight: bold; text-aling: center;"><h4 style="text-align: center;"><?php echo e($title); ?> <b><?php echo e($persona->nombres.' '.$persona->apellido_paterno.' '.$persona->apellido_materno); ?></b> </h4></u>
    <!-- Locales:
    <select id='locale-selector'></select> -->

    </div>
    </div class="row">
        <div class="detalles">
            <table class="table table-border table-responsive">
                <!-- <p id="noti">COLORES DE ASISTENCIA</p> -->
                <div class="btn-group" style="text-align: center; margin-left: 30%;" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-dark calendarioIr" style="background-color: #255e7e; width:150px;" onclick="calendario()" disabled="true">Calendario <span class="badge badge-light"><i class="fa fa-calendar"></i></span></button>
                    <button type="button" class="btn btn-dark tablaIr"id="<?php echo e($id_persona); ?>"style="background-color: #900c3f; width:150px;" onclick="tabla(this.id)">Tabla <span class="badge badge-light"><i class="fa fa-list"></i></span></button>
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
                            Atrasos <span class="badge badge-light"><?php echo e($atrasos); ?></span>
                            </button> 
                        </td>
                        <td><button type="button" class="btn btn-primary" style='background: #78281F'>
                            Abandonos <span class="badge badge-light"><?php echo e($abandonos); ?></span>
                            </button> 
                        </td>
                        <td><button type="button" class="btn btn-primary" style="background: #cb0000">
                            Faltas <span class="badge badge-light"><?php echo e($faltas); ?></span>
                            </button> 
                        </td>
                        <td><button type="button" class="btn btn-primary">
                            D_Trabajo <span class="badge badge-light"><?php echo e($valor); ?></span>
                            </button> 
                        </td>
                        <td><button type="button" class="btn btn-primary" >
                            Permisos <span class="badge badge-light"><?php echo e($permisos); ?></span>
                            </button> 
                        </td>
                        <td><button type="button" class="btn btn-primary" >
                            Total_Dias <span class="badge badge-light"><?php echo e($valor+$faltas); ?></span>
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
    <div>
    <div id="carga" style="display: none; background-color: #fff; text-align: center;"> <img src="<?php echo e(asset('assets/images/loanding1.gif')); ?>" width="250px" style="color: #900c3f;"></div>

    <div id='wrap'>
        <div id='calendar-wrap'>
            <div id='calendar'></div>
        </div>
    </div>

    <div id="tabla" hidden="true">
      <div class="tabla-usuarios" style="margin-top: 5px; margin-bottom: 30px">
        <div class="form-inline" style="text-align: right;font-weight: bold;margin-top: 1px;
          margin-bottom: 10px;height:8%;padding: 5px 0 5px 0;">
          <h2>Asistencias Personal</h2>
        </div>
        <div id="renderUser">
        <table class="table__kiri table-bordered" style="width:99%">
          <thead>
          <tr >
            <th>Title</th>
            <th>Reg_de</th>
            <th>Ci_a</th>
            <th>ID_H</th>
            <th>ID_P</th>
            <th>Descripcion</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Hora</th>
            <th>Turno_a</th>
            <th>Tipo_a</th>
            <th>Estado_a</th>
            <!-- <th>Color</th> -->
            <th>Opc.</th>
            
          </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $actualss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr class="">
                <td> <?php echo e($asis->title); ?></td>
                <td> <?php echo e($asis->nombre); ?></td>
                <td> <?php echo e($asis->ci_a); ?></td>
                <td> <?php echo e($asis->id_horario); ?></td>
                <td> <?php echo e($asis->id_persona); ?></td>
                <td> <?php echo e($asis->descripcion); ?></td>
                <td> <?php echo e($asis->start); ?></td>
                <td> <?php echo e($asis->end); ?></td>
                <td> <?php echo e($asis->hora); ?></td>
                <td> <?php echo e($asis->turno_a); ?></td>
                <td> <?php echo e($asis->tipo_a); ?></td>
                <td bgcolor="<?php echo e($asis->color); ?>" style="color: #fff;"> <?php echo e($asis->estado_a); ?></td>
                <!-- <td bgcolor="<?php echo e($asis->color); ?>">
                            <?php echo e($asis->color); ?>

                </td> -->
                <td>
                    <center>
                        <?php if (Auth::check() && Auth::user()->hasPermission('editar.horario')): ?>
                        <a href="#" id="<?php echo e($asis->id); ?>" class="btn btn-primary" title="editar <?php echo e($asis->id); ?>" onclick="ver(this.id)" data-toggle="modal" 
                        data-target=".edit-modal-sm" style="text-align: center; padding: 1px; margin: 2px; margin-left: 30%; border-radius: 10px !!important; "><i class="fa fa-edit" ></i></a>
                        <?php endif; ?>
                    </center>
                </td> 
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        <div class="row">  
        <div class="col-lg-12 text-center">
            <?php echo e($actualss->links()); ?>

        </div>
        </div>
        </div>
      </div>
    </div>

</div>
    <!-- Modal -->
    <div class="modal modal-success fade fechas-modal-sm" id="fechas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #113F63;color:#fff">
                    <h5 class="modal-title" style="font-size: 17; font-weight: bold; text-transform: uppercase; text-align: center;">colocar fecha para el reporte</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body" style="background: #CBDEED">
                    <table class="table table-responsive">
                        <form class="designacion">
                        <tr>
                            <td>
                              <label for="start" class="form-label">Fecha_inicio</label>
                              <input type="date" class="form-control" name="start" id="start" min="1970-12-31" max="<?php echo e(DATE::now()->format('Y-m-d')); ?>" placeholder="2022-10-12">
                           </td> 
                           <td>
                              <label for="end" class="form-label">Fecha_fin</label>
                              <input type="date" class="form-control" name="end" id="end" min="1970-12-31" max="<?php echo e(DATE::now()->format('Y-m-d')); ?>"placeholder="2022-10-12">
                           </td> 
                        </tr>
                        </form>

                    </table>
                    <a class="btn btn-success as" id= "<?php echo e($id_persona); ?>" onclick="pdfgeneral(this.id, url='<?php echo e(url('rrhh/pdfasistenciapersonal')); ?>')" 
                                style="margin-top: 2px; color: #fff"><i class="fa fa-download"></i> descargar</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('rrhh::scarrhh.AsistenciasActuales.modals.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('rrhh::scarrhh.AsistenciasActuales.modals.modal-dtrabajo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('#ver').click(function(){
                var pathname = window.location.pathname;
                //alert(pathname);
                alert(window.location);
            });
        });
    </script> -->


    <script type="text/javascript">
        
        function pdfgeneral(id, response){
            var fecha1= $('#start').val();
            var fecha2= $('#end').val();
            console.log(id, response);
            // var blob = new Blob([response], {type: 'application/pdf'});
            // var url = URL.createObjectURL(blob);
            // location.assign(response);

            $.ajax({
                url: "<?php echo e(url("rrhh/pdfasistenciapersonal")); ?>",
                type:"get",
                data:{"id_persona":id, "fecha1":fecha1, "fecha2":fecha2},
                xhrFields: {
                    responseType: 'blob'
                },
                beforeSend: function () {
                    $('.fechas-modal-sm').modal("hide");
                    $('#carga').show();
                    $('.detalles').hide();
                    $("#noti").html("Procesando, espere por favor...");
                },
                success:function(datos){
                    //$('.reportegrupo-modal-sm').modal("hide");
                    //$("#resultadoAjax").html("");
                    $('.detalles').show();
                    $('#carga').hide();
                    $("#start").val('');
                    $("#end").val('');
                    $("#personal").attr("disabled", true);
                    $("#habilitar").attr("disabled", false);
                    $("#acualiAa").attr("disabled", false);

                    var blob = new Blob([datos]); 
                    var link = document.createElement('a');
                    //link.href = URL.createObjectURL(blob);      ////para descargar
                    link.href = window.URL.createObjectURL(datos);
                    link.target = '_blank';
                    link.stream = "mypdf.pdf";
                    //link.download = "mypdf.pdf";               ////para descargar
                    link.click();

                },
                error: function(blob){
                    console.log(blob);
                    $('#carga').hide();
                    $('.detalles').show();
                }
            });
           
        }

        function diastrabajo(id, url){
            var fecha1= $('#startt').val();
            var fecha2= $('#endt').val();
            console.log(id);

            $.ajax({
                url: url,
                type:"get",
                data:{"id_persona":id, "fecha1":fecha1, "fecha2":fecha2},
                // xhrFields: {
                //     responseType: 'blob'
                // },
                beforeSend: function () {
                    $('.trabajo-modal-sm').modal("hide");
                    //$('#carga').show();
                },
                success:function(datos){
                    if(datos.resp==200){
                        //$('#carga').hide();
                        toastr.success("editacion correcta");
                        $(".detalles").html(datos.diastrabajo);

                    }
                    else {
                        toastr.error("no se realizo el calculo de dias trabajados");
                    }
                },
                error: function(blob){
                    console.log(blob);
                    $('#carga').hide();
                }
            });
            $("#startt").val('');
            $("#endt").val('');
           
        }

        function calendario() {
            $('#wrap').show();
            $('#tabla').hide();
            $(".calendarioIr").attr("disabled", true);
            $(".tablaIr").attr("disabled", false);
        }

        function tabla(id) {
            $('#wrap').hide();
            $('#tabla').show();
            $(".calendarioIr").attr("disabled", false);
            $(".tablaIr").attr("disabled", true);
            // $.ajax({
            //     url: "<?php echo e(url("rrhh/gettabla")); ?>",
            //     type:"get",
            //     data:{"id":id},
            //     success:function(datos){
            //         if(datos.resp==200){
            //             toastr.success("editacion correcta");
            //         }
            // })
        }

        function habilitar() {
            $("#personal").attr("disabled", false);
            $("#habilitar").attr("disabled", true);
            $("#acualiAa").attr("disabled", true);
        }
            
        function ver(id){
            $.ajax({
                url:"<?php echo e(url("rrhh/getAsistenciaActual")); ?>",
                type:"get",
                data:{"id":id},
                success:function(datos){
                    if(datos.resp==200){
                        toastr.success("editacion correcta");
                        calendar.unselect();
                    }
                    document.getElementById('title_edit').value=datos[0]["title"];
                    document.getElementById('nombre_edit').value=datos[0]["nombre"];
                    document.getElementById('id_edit').value=datos[0]["id"];
                    document.getElementById('ci_a_edit').value=datos[0]["ci_a"];
                    document.getElementById('id_horario_edit').value=datos[0]["id_horario"];
                    document.getElementById('id_persona_edit').value=datos[0]["id_persona"];
                    document.getElementById('descripcion_edit').value=datos[0]["descripcion"];
                    document.getElementById('start_edit').value=datos[0]["start"];
                    document.getElementById('end_edit').value=datos[0]["end"];
                    document.getElementById('hora_edit').value=datos[0]["hora"];
                    document.getElementById('turno_a_edit').value=datos[0]["turno_a"];
                    document.getElementById('tipo_a_edit').value=datos[0]["tipo_a"];
                    document.getElementById('estado_a_edit').value=datos[0]["estado_a"];
                    document.getElementById('color_edit').value=datos[0]["color"];
                    document.getElementById('color_edit').style.background=datos[0]["color"];

                }
            });
            $("#modelo").attr("data-toggle","modal");
            $("#modelo").attr("data-target",".edit-modal-sm");
        }
    </script>

<script type="text/javascript">

    $(document).on("click", ".pagination a", function(e) {
        e.preventDefault();
        //`${datos.id}`
        var id_persona = <?php echo e($id_persona); ?>;
        console.log(id_persona);
        // var _thisVar = $input.val();
        // console.log($('#id_b')[0].innerText);
        var urlPag_Now = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1]
        $.ajax({
            type:'GET',
            url: "paginacionasistenciaspersonal?page="+page,
            data:{id_persona},
            success: function(xhr_JsX) {
                
                $('#renderUser').html(xhr_JsX.asistencias_personal);
                
            }
        });
    });
</script>


<?php $__env->startSection('after-script'); ?>
##parent-placeholder-518cf8338c525b9b9840516cc667fb67f75d82ca##
    <?php echo Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js'); ?>

    <?php echo Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js'); ?>


<?php $__env->stopSection(); ?>



<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/AsistenciasActuales/vistaAsistencias.blade.php ENDPATH**/ ?>