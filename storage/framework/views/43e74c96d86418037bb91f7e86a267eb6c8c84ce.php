<div class="conatiner">

        <style type="text/css">

            #wrap {

                margin: 10px auto;
                padding: 0 10px;
                border: 1px solid #ccc;
            }

            #name {
                margin: 3px 0;
                cursor: move;
            }

            #calendar-wrap {

                margin: 10px;
                margin-bottom: 30px;
                min-width: 400px;
                width: 98%;
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
                max-width: 1100px;
                margin: 0px ;
                padding: 0 10px;
                background: linear-gradient(156deg, #99cdff, #336799);
            }
            .table__kiri thead {
                background: #113F63;
                color: #fff;
            }

            .table__kiri thead tr {
                height: 28px;
            }

            .table__kiri thead tr th {
                text-align: center;
                /* width: 12%; */
                border: 1px solid #fff;
                /* text-transform: uppercase; */
                font-size: 14px;
            }

            .table__kiri tbody tr {
                height: 28px;
            }

            .table__kiri tbody tr td {
                padding-left: 10px;
                /* width: 12%; */
                border: 1px solid #fff;
                /* text-transform: uppercase; */
                font-size: 13px;
            }

            .table__kiri tbody tr:nth-child(even) {
                background: #deeaf4;
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
                    $('#fh_inicio').val('<?php echo e($fecha); ?>');
                    $(".designarpersonal-modal-sm").modal("show");
                    console.log(arg);
                    console.log(drop);
                    console.log(moment(arg.start).format('DD-MM-YY'));
                    console.log(arg.startStr,  arg.endStr);
                    calendar.unselect();
                },
                
                eventClick: function(arg) {
                    var evento = arg.event;
                    console.log(evento);
                    console.log(evento.id);
                    var title = evento.title;
                    var title = evento.ci;
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
                            url:"<?php echo e(url("rrhh/getdesignacionesgrupo")); ?>",
                            type:"get",
                            data:{"id":id},
                            success:function(datos){
                                
                                if(datos.resp==200){
                                    toastr.success("editacion correcta");
                                    calendar.unselect();
                                }
                                document.getElementById('title_edit').value=datos[0]["title"];
                                document.getElementById('unidad_edit').value=datos[0]["unidad"];
                                document.getElementById('id_edit').value=datos[0]["id"];
                                document.getElementById('ci_edit').value=datos[0]["ci"];
                                document.getElementById('horario_id_edit').value=datos[0]["horario_id"];
                                document.getElementById('personal_id_edit').value=datos[0]["personal_id"];
                                document.getElementById('nombre_h_edit').value=datos[0]["nombre_h"];
                                document.getElementById('start_edit').value=datos[0]["start"];
                                document.getElementById('end_edit').value=datos[0]["end"];
                                document.getElementById('work_day_edit').value=datos[0]["work_day"];
                                document.getElementById('created_at_edit').value=datos[0]["created_at"];
                                document.getElementById('color_edit').value=datos[0]["color"];
                                document.getElementById('color_edit').style.background=datos[0]["color"];

                                if(datos.resp==200){
                                    toastr.success("Editacion correcta correcta");
                                    calendar.unselect();
                                }
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
                    url: "<?php echo e(url("rrhh/mostrardesignacionesg")); ?>",
                    method: "GET",
                    extraParams: {
                        id : '<?php echo e($id_persona); ?>',
                    },
                    textColor: 'white'
                }
                
            });


            calendar.render();

    </script>

    <div id='top'>
        <u style="margin-top: 20px; font-weight: bold; text-aling: center;"><h4 style="text-align: center;"><?php echo e($title); ?> <b><?php echo e($persona->nombres.' '.$persona->apellido_paterno.' '.$persona->apellido_materno); ?></b> </h4></u> 

    <!-- Locales:
    <select id='locale-selector'></select> -->

    </div>
    <div id='wrap'>
        <div id='calendar-wrap'>
            <div id='calendar'></div>
        </div>
    </div>
</div>
    <?php echo $__env->make('rrhh::scarrhh.AsistenciasActuales.designaciones.personal.create-designacion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('rrhh::scarrhh.AsistenciasActuales.designaciones.model-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
            
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


<?php $__env->startSection('after-script'); ?>
##parent-placeholder-518cf8338c525b9b9840516cc667fb67f75d82ca##
    <?php echo Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js'); ?>

    <?php echo Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js'); ?>


<?php $__env->stopSection(); ?>



<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/AsistenciasActuales/designaciones/vista-designaciones.blade.php ENDPATH**/ ?>