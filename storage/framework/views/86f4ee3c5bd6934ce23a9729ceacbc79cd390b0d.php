
<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('rrhh::complement.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bar_top'); ?>
    <?php echo $__env->make('rrhh::complement.navs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: <?php echo config('rrhh.name'); ?>

    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('rrhh::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/index.blade.php ENDPATH**/ ?>