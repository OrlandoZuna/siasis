<div class="modal fade create-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title"><b>Nuevo Evento salida</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
              
                <table class="table table-responsive">
                  <?php echo $__env->make('rrhh::scarrhh.vistasHojaCalculo.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </table>
                <div class="d-grid gap-1">
                    <button class="btn btn-center btn-primary" id="guardarEvento"><i class="fa fa-save"></i> Guardar</button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $(".my-color").change(function(){
            $(this).css("background",$(this).val());
        });
    });

    $(document).on("click",'#guardarEvento', function(e){
        console.log('holaaaa');
        var title = $('#title').val();
        var tiposalida = $('#tiposalida').val();
        var inicio_time = $('#inicio_time').val();
        var fin_evento = $('#fin_evento').val();
        var start = $('#start').val();
        var end = $('#end').val();
        var id_horario = $('#id_horario').val();
        var id_persona = $('#id_persona').val();
        var color = $('#color').val();
        var url=URL_BASE+'/storeevento';
        console.log(url, color, id_horario, id_persona);
            $.ajax({
                url: url,
                type:'GET',
                data:{title, tiposalida, inicio_time, fin_evento, start, end, id_horario, id_persona, color},
                success:function(datos){
                    if(datos.resp==200){
                        toastr.success("se guardo correctamente el evento de Salida");
                        $(".autorizacion-modal-sm").modal("show");
                        calendar.refetchEvents();
                    }
                    else {
                        toastr.error("no se registro campos faltantes en el evento de Salida");
                        calendar.unselect();
                    }
                }
            });
            $(".create-modal-sm").modal("hide");
            $('#title').val('');
            $('#tiposalida').val(0);
            $('#inicio_time').val('');
            $('#fin_evento').val('')
            $('#start').val('');
            $('#end').val('');
            $('#id_horario').val(0);
            $('#id_persona').val();
            $('#color').attr('style', 'background:#ffffff; color:#ffffff');
    });

</script><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/vistasHojaCalculo/modals/modal-create.blade.php ENDPATH**/ ?>