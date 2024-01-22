<table>
  <thead>
    <tr>
        <th>id user b</th>
        <th>timestamp</th>
        <th>type</th>
        <th>state</th>
    </tr>
  </thead>
  <tbody>
  <?php $__currentLoopData = $ejemplos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ejemplo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
        $state= 0;
        $type = 0;

        if ($ejemplo->state == "Huella")
          $state = 1;
        elseif ($ejemplo->state == 'Facial')
          $state = 2;
        elseif ($ejemplo->state == "Contraseña")
          $state = 3;
        elseif ($ejemplo->state == 'Card')
          $state = 4;
        else
          $state = 5;

        if ($ejemplo->type == "Entrada")
          $type = 0;
        elseif ($ejemplo->type == "Salida")
          $type = 1;
        else
          $type = 2;
      ?>
      <tr>
        <td> <?php echo e($ejemplo->id_user_b); ?> </td>
        <td> <?php echo e($ejemplo->timestamp); ?></td>
        <td><?php echo e($type); ?> </td>
        <td><?php echo e($state); ?> </td>
      </tr>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/reportes/xlss/vistas/ejemplo.blade.php ENDPATH**/ ?>