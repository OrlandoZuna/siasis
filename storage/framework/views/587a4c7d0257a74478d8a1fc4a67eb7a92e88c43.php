<style type="text/css">
	.eliminarUser{
      background:linear-gradient(10deg, #e73f0b, #a11f0c) !important;
    }
    .eliminarUser:hover{
      background:linear-gradient(10deg, #283655, #4d648d) !important;
    }
</style>
<table class="table__kirito table-bordered" style="width:99%">
        <thead>
        <tr >
          <th>UID</th>
          <th>UserId</th>
          <th>Name</th>
          <th>Role</th>
          <th>Password</th>
          <th>Card number</th>
          <th>Opciones</th>
        </tr>
        </thead>
        <tbody>
				
			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<tr class="">
					<td width="3%" style="text-align: center;"><?php echo e($user['uid']); ?></td>
					<td width="8%" style="text-align: center;"><?php echo e($user['userid']); ?></td>
					<td style="text-align: center;"><?php echo e($user['name']); ?></td>
					<td style="text-align: center;"><?php echo e($user['role']); ?></td>
					<td style="text-align: center;"><?php echo e($user['password']); ?></td>
					<td style="text-align: center; width: 20%;"><?php echo e($user['cardno']); ?></td>
              		<td> <button type="button" onclick ="eliminar (<?php echo e($user['uid']); ?>, '<?php echo e($ip); ?>', '<?php echo e($puerto); ?>',)" class="btn btn-primary eliminarUse"><i class="fa fa-trash"></i></button></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
        </tbody>
      </table><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/biometric/modals/usersRenderTable.blade.php ENDPATH**/ ?>