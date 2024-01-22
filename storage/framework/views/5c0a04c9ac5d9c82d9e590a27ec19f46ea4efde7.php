

<?php $__env->startSection('content'); ?>
<div class="col-md-12">
  <div class="col-middle" >
    <div class="text-center text-center">
      <img src="<?php echo e(asset('layouterros/images/419.png')); ?>" width=40% height=40%>
      <div class="mid_center">
        <h1 style="color:#fff;text-shadow: 4px 4px 4px rgb(166, 166, 204);">419</h1>
        <h5 style="color: #fff; font-size:10px;text-shadow: 4px 4px 4px rgb(166, 166, 204);">SU SESSION A EXPIRADO INGRESE NUEVAMENTE </h5>
        <br>
        <a href="<?php echo e(route('admin.inicio')); ?>" class="btn btn-danger"> Retornar Al Inicio</a>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\resources\views/errors/419.blade.php ENDPATH**/ ?>