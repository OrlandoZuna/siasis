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
        <tr class="mytr">
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
<div class="row">  
<div class="col-lg-12 text-center">
    <?php echo e($hours->links()); ?>

</div>
</div><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/schedule/indexrender.blade.php ENDPATH**/ ?>