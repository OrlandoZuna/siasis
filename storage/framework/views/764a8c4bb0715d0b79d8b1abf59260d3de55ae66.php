
<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('rrhh::complement.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bar_top'); ?>
    <?php echo $__env->make('rrhh::complement.navs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('after-style'); ?>

    <?php echo Html::script('assets/js/bootstrap/dist/js/bootstrap.min.js'); ?>

    <?php echo Html::script('assets/js/bootstrap/dist/css/bootstrap.min.css'); ?>

    <?php echo Html::style('assets/plugins/datatables/dataTables.bootstrap.css'); ?>

    <?php echo Html::style('assets/plugins/colorpicker/bootstrap-colorpicker.min.css'); ?>

    <?php echo Html::style('assets/plugins/timepicker/bootstrap-timepicker.min.css'); ?>

<style type="text/css">
    .myscroll {
        border: solid white 1px;
        overflow: scroll;
        height: 470px;
    }
    .contpanel{
        position: relative;
        width: 100%;
        padding: 10px 12px;
        display: inline-block;
        background: #fff;
        border: 1px solid #414141;
        -webkit-column-break-inside: avoid;
        -moz-column-break-inside: avoid;
        column-break-inside: avoid;
        opacity: 1;
        transition: all .2s ease;
        border-radius:10px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('before-style'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (Auth::check() && Auth::user()->hasPermission('crear.horario')): ?>
            <a class="btn btn-app btn-mycolor" data-toggle="modal" data-target=".create-modal-sm">
                <span class="badge bg-red"><?php echo e(count($tipocontrato)); ?> registros</span>
                <i class="fa fa-plus"></i>
                Nuevo
            </a>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding:15px;background:#2f5e80cc;border-radius:10px;">
        <div class = " contpanel">
            <div class="text-center">
                <h2 style="text-transform:uppercase;font-family:monospace;font-weight:bold;font-size:24px;text-decoration:underline"><?php echo e($title); ?></h2>
            </div>
        
            <table class="table__kirito table-bordered">
                <thead >
                <tr>
                    <th>Nombre Tipo Contrato</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $tipocontrato; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="mytr">
                        <td class="mytd"><?php echo e($contrato->nombre_tipo_contrato); ?></td>
                        <td class="mytd"><?php echo e($contrato->tipo); ?></td>
                        <td>
                            <center>
                            <?php if (Auth::check() && Auth::user()->hasPermission('editar.horario')): ?>
                            <a href="#" title="eliminar" onclick="alerta('<?php echo e($contrato->id); ?>',this)"><i class="fa fa-trash"></i></a>

                            <a href="#" id="<?php echo e($contrato->id); ?>"  title="editar <?php echo e($contrato->id); ?>" onclick="ver(this.id)" data-toggle="modal" data-target=".edit-modal-sm"><i class="fa fa-edit"></i></a>
                            <?php endif; ?>
                            <?php if (Auth::check() && Auth::user()->hasPermission('eliminar.horario')): ?>
                            <a href="#" title="eliminar" onclick="alerta('<?php echo e($contrato->id); ?>',this)"><i class="fa fa-trash"></i></a>
                            <?php endif; ?>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>

    <?php echo $__env->make('rrhh::scarrhh.tipocontrato.modals.modal-create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('rrhh::scarrhh.tipocontrato.modals.modal-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-script'); ?>
##parent-placeholder-518cf8338c525b9b9840516cc667fb67f75d82ca##
    <?php echo Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js'); ?>

    <?php echo Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js'); ?>

    <script>
        function alerta(id,row) {
            var bool=confirm("esta seguro de eliminar el tipo de contrato? "+id);
            if(bool){
                $.ajax({
                    url:"<?php echo e(url("rrhh/deletetipocontrato")); ?>",
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
        // $(function () {
        //     $(".my-color").change(function(){
        //         $(this).css("background",$(this).val());
        //     });
        //     $(".time").timepicker({
        //         showInputs: false
        //     });
        // });
        function ver(id){
            $.ajax({
                url:"<?php echo e(url("rrhh/gettipocontrato")); ?>",
                type:"get",
                data:{"id":id},
                success:function(datos){
                    document.getElementById('nombre_tipo_contrato_edit').value=datos[0]["nombre_tipo_contrato"];
                    document.getElementById('id_edit').value=datos[0]["id"];
                    document.getElementById('tipo_edit').value=datos[0]["tipo"];
                }
            });
            $("#modelo").attr("data-toggle","modal");
            $("#modelo").attr("data-target",".edit-modal-sm");
        }

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('rrhh::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/tipocontrato/index.blade.php ENDPATH**/ ?>