


<?php $__env->startSection('after-style'); ?>
            <?php echo Html::style('assets/plugins/datatables/dataTables.bootstrap.css'); ?>

    <?php echo Html::style('assets/plugins/colorpicker/bootstrap-colorpicker.min.css'); ?>

    <?php echo Html::style('assets/plugins/timepicker/bootstrap-timepicker.min.css'); ?>

    <style type="text/css">
        .myscroll {
            border: solid white 1px;
            overflow: scroll;
            height: 470px;
        }
    </style>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('complement.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bar_top'); ?>
    <?php echo $__env->make('complement.navs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('before-style'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (Auth::check() && Auth::user()->hasPermission('crear.horario')): ?>
            <a class="btn btn-app btn-mycolor" data-toggle="modal" data-target=".create-modal-sm">
                <span class="badge bg-red"><?php echo e(count($hours)); ?> registros</span>
                <i class="fa fa-plus"></i>
                Nuevo
            </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table__kirito table-bordered">
                <thead >
                <tr>
                    <th>Nombre</th>
                    <th>Hora de Entrada</th>
                    <th>Hora de Salida</th>
                    <th>Tolerancia Entrada</th>
                    <th>Tolerancia Salida</th>
                    <th>Inicio de Entrada</th>
                    <th>Fin de Entrada</th>
                    <th>Inicio de Salida</th>
                    <th>Fin de Salida</th>
                    <th>Dia Trabajo</th>
                    <th>Color</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $hours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="mytr"   >
                        <td class="mytd"><?php echo e($hour->name); ?></td>
                        <td class="mytd" style="text-align: center;"><?php echo e($hour->start_time); ?></td>
                        <td class="mytd" style="text-align: center;"><?php echo e($hour->end_time); ?></td>
                        <td class="mytd" style="text-align: center;"><?php echo e($hour->late_minutes); ?>min</td>
                        <td class="mytd" style="text-align: center;"><?php echo e($hour->early_minutes); ?>min</td>
                        <td class="mytd" style="text-align: center;"><?php echo e($hour->start_input); ?></td>
                        <td class="mytd" style="text-align: center;"><?php echo e($hour->end_input); ?></td>
                        <td class="mytd" style="text-align: center;"><?php echo e($hour->start_output); ?></td>
                        <td class="mytd" style="text-align: center;"><?php echo e($hour->end_output); ?></td>
                        <td class="mytd" style="text-align: center;"><?php echo e($hour->work_day); ?></td>
                        <td bgcolor="<?php echo e($hour->color); ?>">
                            <?php echo e($hour->color); ?>

                        </td>
                        <td>
                            <center>
                            <?php if (Auth::check() && Auth::user()->hasPermission('editar.horario')): ?>
                            <!--<a href="#" title="eliminar" onclick="alerta('<?php echo e($hour->id); ?>',this)"><i class="fa fa-trash"></i></a>-->
                            <a href="#" title="eliminar" onclick="alerta('<?php echo e($hour->id); ?>',this)"><i class="fa fa-trash"></i></a>

                            <a href="#" id="<?php echo e($hour->id); ?>"  title="editar <?php echo e($hour->id); ?>" onclick="ver(this.id)" data-toggle="modal" data-target=".edit-modal-sm"><i class="fa fa-edit"></i></a>
                            <?php endif; ?>
                            <?php if (Auth::check() && Auth::user()->hasPermission('eliminar.horario')): ?>
                            <a href="#" title="eliminar" onclick="alerta('<?php echo e($hour->id); ?>',this)"><i class="fa fa-trash"></i></a>
                            <?php endif; ?>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>


    <?php echo $__env->make('admin.schedule.modals.modal-create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php echo $__env->make('admin.schedule.modals.modal-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-script'); ?>
##parent-placeholder-518cf8338c525b9b9840516cc667fb67f75d82ca##
    <?php echo Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js'); ?>

    <?php echo Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js'); ?>

    <script>
        function alerta(id,row) {
            var bool=confirm("esta seguro de eliminar este horario? "+id);
            if(bool){
                $.ajax({
                    url:"<?php echo e(url("rrhh/deleteShedules")); ?>",
                    type:"get",
                    data:{"id":id},
                    success:function(datos){
                        if(datos.resp==200){
                            toastr.success("Eliminacion correcta");
                            $(row).parent('center').parent("td").parent("tr").remove();
                        }

                    }
                });
            }
        }
    </script>
    <script type="text/javascript">
        $(function () {
            $(".my-color").change(function(){
                $(this).css("background",$(this).val());
            });
            $(".time").timepicker({
                showInputs: false
            });
        });
        function ver(id){
            $.ajax({
                url:"<?php echo e(url("rrhh/getSchedule")); ?>",
                type:"get",
                data:{"id":id},
                success:function(datos){
                    document.getElementById('name_edit').value=datos[0]["name"];
                    document.getElementById('id_edit').value=datos[0]["id"];
                    document.getElementById('start_time_edit').value=datos[0]["start_time"];
                    document.getElementById('end_time_edit').value=datos[0]["end_time"];
                    document.getElementById('late_minutes_edit').value=datos[0]["late_minutes"];
                    document.getElementById('early_minutes_edit').value=datos[0]["early_minutes"];
                    document.getElementById('start_input_edit').value=datos[0]["start_input"];
                    document.getElementById('end_input_edit').value=datos[0]["end_input"];
                    document.getElementById('start_output_edit').value=datos[0]["start_output"];
                    document.getElementById('end_output_edit').value=datos[0]["end_output"];
                    document.getElementById('work_day_edit').value=datos[0]["work_day"];
                    document.getElementById('color_edit').value=datos[0]["color"];
                    document.getElementById('color_edit').style.background=datos[0]["color"];
                    if(datos[0]["sum"]){
                        $('#si_sum').attr('checked',true);
                        $('#no_sum').attr('checked',false);
                    }else{
                        $('#no_sum').attr('checked',true);
                        $('#si_sum').attr('checked',false);
                    }
                }
            });
            $("#modelo").attr("data-toggle","modal");
            $("#modelo").attr("data-target",".edit-modal-sm");
        }

    </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/admin/schedule/index.blade.php ENDPATH**/ ?>