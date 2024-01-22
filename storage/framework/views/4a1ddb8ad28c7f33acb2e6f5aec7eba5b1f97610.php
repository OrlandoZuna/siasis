<?php $__env->startSection('pornav'); ?>
    <?php echo $__env->make('complement.pornav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="slider-area slider-bg ">
  <div class="slider-active">
      <div class="single-slider d-flex align-items-center slider-height ">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-6 col-md-9 ">
                      <div class="hero__caption">
                          <h1 data-animation="fadeInLeft" data-delay=".6s"><?php echo e($info->objetivo); ?></h1>
                          <p data-animation="fadeInLeft" data-delay=".8s"><?php echo $info->descripcion; ?></p>
                          <div class="slider-btns">
                            <?php if(Route::has('login')): ?>
                            <?php if(auth()->guard()->check()): ?>
                                <a style="background-color: rgb(35, 88, 134)" href="<?php echo e(route('home')); ?>"  data-animation="fadeInLeft" data-delay="1s" class="btn radius-btn">Ir a Mi Panel</a>

                            <?php else: ?>
                              <a style="background-color: rgb(35, 88, 134)" data-animation="fadeInLeft" data-delay="1s" href="<?php echo e(route('login')); ?>" class="btn radius-btn">Login</a>
                            <?php endif; ?>
                            <?php endif; ?>

                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="hero__img d-none d-lg-block f-right">
                          <img src="<?php echo e($info->logo); ?>" alt="" data-animation="fadeInRight" data-delay="1s">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-script'); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.portal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\resources\views/welcome.blade.php ENDPATH**/ ?>