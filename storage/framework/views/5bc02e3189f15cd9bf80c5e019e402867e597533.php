<table class="table__kirito table-bordered" style="width:99%" id="table" name="table">
      <thead>
      <tr>
        <th>UID</th>
        <th>Id</th>
        <th>State</th>
        <th>timestamp</th>
        <th>type</th>
      </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo $attendance['uid']; ?></td>
            <td><?php echo $attendance['id']; ?></td>
            <td><?php echo $attendance['state']; ?></td>
            <td><?php echo $attendance['timestamp']; ?></td>
            <td><?php echo $attendance['type']; ?></td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
</table>
<div class="row">  
<div class="col-lg-12 text-center">
    <?php echo e($attendances->links()); ?>

</div>
</div><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/biometric/rendertablaasis.blade.php ENDPATH**/ ?>