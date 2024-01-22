<div class="conatiner">

        <style type="text/css">
            .myscroll {
                border: solid white 1px;
                overflow: scroll;
                height: 470px;
            }
            #wrap {
                display: flex;
                justify-content: space-between; 
                kalign-items: center;
                margin: 10px auto;
                padding: 0 10px;
                border: 1px solid #ccc;
            }

            #calendar-wrap {

                /* border: 1px solid red; */
                margin: 10px;
                /* min-width: 400px;
                max-width: 1100px; */
                width: 98%;
            }

            #top {
                background: #eee;
                border-bottom: 1px solid #ddd;
                padding: 0 10px;
                line-height: 40px;
                font-size: 12px;
                text-align: center;
                font-weight: bold;
            }

            #calendar {
                /*max-width: 1100px;*/
                margin: 0px ;
                padding: 0 10px;
                background: linear-gradient(156deg, #99cdff, #336799);
            }
            .btn-primary {
                width: 130px;
            }

        </style>
        <script type="text/javascript">

            var initialLocaleCode = 'es';
            //var initialMonth = new month()
            var initialDate = new Date();

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
            selectable: true,
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

            select: function(arg) {
                $('#start').val(arg.startStr);
                $('#end').val(arg.endStr);
                $(".create-modal-sm").modal("show");
                console.log(arg);
                console.log(moment(arg.start).format('DD-MM-YY'));
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
                        arg.event.remove();    
                    }
                }
                else{
                $(function () {
                    $("#color_edit").change(function(){
                        $(this).css("background",$(this).val());
                    });
                    $.ajax({
                        // headers:{'X-CSRF_TOKEN':token},
                        url:"{{ url("rrhh/getevento") }}",
                        type:"get",
                        data:{"id":id},
                        success:function(datos){
                            document.getElementById('title_edit').value=datos[0]["title"];
                            document.getElementById('id_edit').value=datos[0]["id"];
                            document.getElementById('tiposalida_edit').value=datos[0]["tiposalida_id"];
                            document.getElementById('inicio_time_edit').value=datos[0]["inicio_time"];
                            document.getElementById('fin_evento_edit').value=datos[0]["fin_evento"];
                            document.getElementById('start_edit').value=datos[0]["start"];
                            document.getElementById('end_edit').value=datos[0]["end"];
                            document.getElementById('id_horario_edit').value=datos[0]["id_horario"];
                            document.getElementById('id_persona_edit').value=datos[0]["id_persona"];
                            document.getElementById('color_edit').value=datos[0]["color"];
                            document.getElementById('color_edit').style.background=datos[0]["color"];
                        }
                    });
                    $("#modelo").attr("data-toggle","modal");
                    $("#modelo").attr("data-target",".edit-modal-sm");
                });

                $(".edit-modal-sm").modal("show");
                
                }
            },

            buttonIcons: false, // show the prev/next text
            weekNumbers: true,
            editable: true,
            dayMaxEvents: true,
            events: {
                url: "{{url("rrhh/mostrar")}}",
                method: "GET",
                extraParams: {
                    id : '{{ $id_persona }}',
                    //custom_param2: 'somethingelse'
                },
                textColor: 'white'
            }, 
            });


            calendar.render();


            // build the locale selector's options
            calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
                var optionEl = document.createElement('option');
                optionEl.value = localeCode;
                optionEl.selected = localeCode == initialLocaleCode;
                optionEl.innerText = localeCode;
            });

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

    <div id='top' >

        <u style="margin-top: 20px; font-weight: bold; text-aling: center;"><h4 >{{$title}} <b>{{$persona->nombres.' '.$persona->apellido_paterno.' '.$persona->apellido_materno}}</b> </h4></u> 

    <!-- Locales:
    <select id='locale-selector'></select> -->

    </div>
    </div class="row">
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
    <div>

    <div id="carga" style="display: none; background-color: #fff; text-align: center;"> <img src="{{{ asset('assets/images/loandig3.gif') }}}" width="250px" style="color: #900c3f;"></div>
    <div id='wrap'>
        <div id='calendar-wrap'>
            <div id='calendar'></div>
        </div>
    </div>
    @include('rrhh::scarrhh.vistasHojaCalculo.modals.modal-create')
    @include('rrhh::scarrhh.vistasHojaCalculo.modals.modal-edit')
    @include('rrhh::scarrhh.vistasHojaCalculo.modals.modal-fechas')
    @include('rrhh::scarrhh.vistasHojaCalculo.modals.modal-fepermiso')
</div>
<div class="modal fade autorizacion-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" style="text-align: center;"><b>Autorizacion</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
              
                <table class="table table-responsive">
                  <p style="margin: 15px; text-align: center; color: blue; font-size: 14px; font-weight: bold;">PRESIONE EL BOTON PARA IMPRIMIR LA AUTORIZACION</p>
                </table>
                <div class="d-grid gap-2">
                    <button type="button" href="{{ route('descargarPDF') }}" class="btn btn-success me-md-2"><a class="fa fa-download" target="_blank" style="margin-top: 2px; color: #fff"></a></button>
                    <button type="button" class="btn btn-primary descargar"><a href="{{ route('descargarAutorizacionPDF') }}" class="fa fa-print" target="_blank" style="margin-top: 2px; color: #fff"></a></button>
                </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).on('click','#btn_deleteEvento',function(e){
        //e.preventDefault();
        console.log($('#id_edit').val() + 'desde eliminar')
        var id = $('#id_edit').val();
        console.log(id);
            var bool=confirm("esta seguro de eliminar este Evento? "+id);
            if(bool){
                $.ajax({
                    url:"{{url("rrhh/deleteEvento")}}",
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

    function habilitari() {
        $("#personali").attr("disabled", false);
        $("#habilitari").attr("disabled", true);
        $("#btn_deleteEvento").attr("disabled", true);
        $("#guardarEvento").attr("disabled", true);
        $("#guardarpp").attr("disabled", true);
    }

    function pdfpermiso(id){
        var fecha1= $('#startt').val();
        var fecha2= $('#endt').val();
        console.log(id , fecha1 ,fecha1 , fecha2);
        $.ajax({
            url: "{{url("rrhh/pdfpermisos")}}",
            type:"get",
            data:{"id_persona":id, "fecha1":fecha1, "fecha2":fecha2},
            xhrFields: {
                responseType: 'blob'
            },
            beforeSend: function () {
                $('.fechas-modal-sm').modal("hide");
                $('#carga').show();
            },
            success:function(datos){
                //$('.reportegrupo-modal-sm').modal("hide");
                //$("#resultadoAjax").html("");
                $('#carga').hide();
                $("#startt").val('');
                $("#endt").val('');
                $("#personali").attr("disabled", true);
                $("#habilitari").attr("disabled", false);
                $("#acualiAai").attr("disabled", false);
                $("#guardarEvento").attr("disabled", false);
                $("#guardarpp").attr("disabled", false);
                $("#btn_deleteEvento").attr("disabled", false);
                var blob = new Blob([datos]); 
                var link = document.createElement('a');
                //link.href = URL.createObjectURL(blob);      ////para descargar
                link.href = window.URL.createObjectURL(datos);
                link.target = '_blank';
                link.stream = "permisos.pdf";
                //link.download = "mypdf.pdf";               ////para descargar
                link.click();
            },
            error: function(blob){
                console.log(blob);
            }
        });
    }
    
    $(document).on('click','.descargar', function(e){
        $(".autorizacion-modal-sm").modal("hide");
    });

    function permisos(id, url){
            var fecha1= $('#starttp').val();
            var fecha2= $('#endtp').val();
            console.log(id);

            $.ajax({
                url: url,
                type:"get",
                data:{"id_persona":id, "fecha1":fecha1, "fecha2":fecha2},
                beforeSend: function () {
                    $('.permisos-modal-sm').modal("hide");
                    //$('#carga').show();
                },
                success:function(datos){
                    if(datos.resp==200){
                        //$('#carga').hide();
                        toastr.success("CAlcuos realizados de Permisos");
                        $(".detalles").html(datos.permisos);

                    }
                    else {
                        toastr.error("no se realizo el calculo de dias permisos");
                    }
                },
                error: function(blob){
                    $('#carga').hide();
                }
            });
            $("#starttp").val('');
            $("#endtp").val('');
           
        }

</script>

@section('after-script')

@parent
    {!! Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}
    {!! Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js') !!}

@endsection



