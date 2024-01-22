<table class="table__kirito table-bordered">
    <thead >
    <tr>
        <th>Nombre_GrupoTrabajo</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $grupotrabajo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trabajo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="mytr">
            <td class="mytd"><?php echo e($trabajo->nombre_trabajo); ?></td>
            <td>
                <center>
                <?php if (Auth::check() && Auth::user()->hasPermission('editar.horario')): ?>
                <a href="#" title="eliminar" onclick="alerta('<?php echo e($trabajo->id); ?>',this)"><i class="fa fa-trash"></i></a>
                <a href="#" id="<?php echo e($trabajo->id); ?>"  title="editar <?php echo e($trabajo->id); ?>" onclick="ver(this.id)" data-toggle="modal" data-target=".edit-modal-sm"><i class="fa fa-edit"></i></a>
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->hasPermission('eliminar.horario')): ?>
                <a href="#" title="eliminar" onclick="alerta('<?php echo e($trabajo->id); ?>',this)"><i class="fa fa-trash"></i></a>
                <?php endif; ?>
                </center>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="row">  
<div class="col-lg-12 text-center">
    <?php echo e($grupotrabajo->links()); ?>

</div>
</div><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/grupotrabajo/indexrender.blade.php ENDPATH**/ ?>