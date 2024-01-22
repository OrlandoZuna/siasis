    <table class="table__kirito table-bordered">
        <thead >
        <tr>
            <th>Nombre_GrupoTrabajo</th>
            
            <th>Nombre persona</th>
            
            <th>Ci Persona</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody id="body">
        <?php $__currentLoopData = $designaciongrupo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trabajo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="mytr" id="usuarios_<?php echo e($trabajo->id); ?>">
                <td><?php echo e($trabajo->nonbre_grupotrabajo); ?></td>
                
                <td><?php echo e($trabajo->nombre_persona); ?></td>
                
                <td><?php echo e($trabajo->ci); ?></td>
                <td>
                    <center>
                    <?php if (Auth::check() && Auth::user()->hasPermission('editar.horario')): ?>
                    <a href="#" title="eliminar" onclick="alerta('<?php echo e($trabajo->id); ?>',this)"><i class="fa fa-trash"></i></a>
                    <a href="#" id="<?php echo e($trabajo->id); ?>"  title="editar <?php echo e($trabajo->id); ?>" onclick="ver(this.id)" data-toggle="modal" data-target="#edit-modal"><i class="fa fa-edit"></i></a>
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
        <?php echo e($designaciongrupo->links()); ?>

    </div>
    </div>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/designaciongrupo/indexrender.blade.php ENDPATH**/ ?>