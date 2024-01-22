
    <tr>
        <td><?php echo Form::label('nombres','Nombres:'); ?></td>
        <td><?php echo Form::text('nombres',null,["class"=>"form-control"]); ?></td>

        <td><?php echo Form::label('apellidoP','Apellido paterno:'); ?></td>
        <td><?php echo Form::text('apellidoP',null,["class"=>"form-control"]); ?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('apellidoM',' Apellido materno:'); ?></td>
        <td><?php echo Form::text('apellidoM','',['class'=>'form-control','min'=>'0']); ?></td>
        <td><?php echo Form::label('ci','ingrese ci: '); ?></td>
        <td><?php echo Form::text('ci','',['class'=>'form-control','min'=>'0']); ?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('extension','Extension de C.I:'); ?></td>
        <td><?php echo Form::text('extension',null,['class'=>'form-control']); ?></td>

        <td><?php echo Form::label('profecion','Profesion de Persona:'); ?></td>
        <td><?php echo Form::text('profecion',null,['class'=>'form-control']); ?></td>
    </tr>
    <tr>
        <td>
            <label for="id_tipo_contrato" class="form-label">Tipos de Contrato</label>
            <select class="form-control" name="id_tipo_contrato" id="id_tipo_contrato">
                <?php $__currentLoopData = $tipocontrato; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contrato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>;
                    <option value="0" selected disabled hidden>seleccione</option>
                    <option value="<?php echo e($contrato->id); ?>"><?php echo e($contrato->nombre_tipo_contrato); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
            </select>
        </td> 
    </tr>
    
   
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/personal/form.blade.php ENDPATH**/ ?>