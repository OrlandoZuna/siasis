
    <tr>
      <td>
        <label for="title">Nombre</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="escribe el titulo ">
      </td>
      <td>
        <label for="tiposalida">Tipo Salida Permiso</label>
        <select class="form-control" name="tiposalida" id="tiposalida">
            <?php $__currentLoopData = $tiposalidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="0" selected disabled hidden>seleccione</option>
                <option value="<?php echo e($salida->id); ?>"><?php echo e($salida->nombre_tiposalida); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
        </select>
      </td>
    </tr>

    <tr>
      <td>
        <label for="inicio_time">hora_inico</label>
        <input type="time" class="form-control" name="inicio_time" id="inicio_time" placeholder="08:00">        
      </td>
      <td>
        <label for="fin_evento" class="form-label">hora_retorno</label>
        <input type="time" class="form-control" name="fin_evento" id="fin_evento" placeholder="18:30">
      </td>
    </tr>
    
    <tr>
      <td>
        <label for="start">Inicio_Evento</label>
        <input type="text" class="form-control" name="start" id="start" placeholder="date">
      </td>
      <td>
        <label for="end">Fin_Evento</label>
        <input type="text" class="form-control" name="end" id="end" placeholder="date_fin">
      </td>
    </tr>

    <tr>
      <td>
        <label for="id_horario" class="form-label">Horario de la persona</label>
        <select class="form-control id_horario" name="id_horario" id="id_horario">
          <?php $__currentLoopData = $hoursi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $houri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="0" selected disabled hidden>seleccione</option>
            <option value="<?php echo e($houri->id); ?>"><?php echo e($houri->name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </td>
      <td hidden="true">
        <label for="id_persona" class="form-label">id_persona</label>
        <input type="text" class="form-control" name="id_persona" id="id_persona" value="<?php echo e($id_persona); ?>" placeholder="colocar id_persona" >
      </td>
      <td>
        <label for="nombre_p" class="form-label">nombre_p</label>
        <input type="text" class="form-control" name="nombre_p" id="nombre_p" value="<?php echo e($persona->nombres.' '.$persona->apellido_paterno); ?>" placeholder="colocar nombre_p">
      </td>
    </tr>
    <tr>
        <td><?php echo Form::label('color','Color:'); ?></td>
        <td colspan="3"><select name="color" id = "color" class="form-control my-color" style="color: #fff">
                <option value="#2874A6" style='background:#2874A6'>Recomendado para permisos Temporales mañana #2874A6</option>
                <option value="#2471A3" style='background:#2471A3'>Recomendado para permisos Temporales tarde #2471A3</option>
                <option value="#9B59B6" style='background:#9B59B6'>Recomendado para permisos entrada mañana #9B59B6</option>
                <option value="#8E44AD" style='background:#8E44AD'>Recomendado para permisos salida mañana #8E44AD</option>
                <option value="#1E8449" style='background:#1E8449'>Recomendado para permisos entrada tarde #1E8449</option>
                <option value="#117A65" style='background:#117A65'>Recomendado para permisos salida tarde #117A65</option>
                <option value="#F39C12" style='background:#F39C12'>Recomendado para permisos de medio tiempo #F39C12</option>
                <option value="#34495E" style='background:#34495E'>Recomendado para permisos vacacion #34495E </option>
                <option value="#717D7E" style='background:#717D7E'>Recomendado para permisos otro #717D7E</option>
                <option value="#78281F" style='background:#78281F'>Recomendado para abandono #78281F </option> 
              
            </select></td>

    </tr>

<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/vistasHojaCalculo/form.blade.php ENDPATH**/ ?>