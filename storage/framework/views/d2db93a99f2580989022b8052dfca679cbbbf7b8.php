<?php $__env->startSection('pornav'); ?>
    <?php echo $__env->make('complement.pornav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    .my_card{
        background-color: #1c3c50;
        width: 30rem;
        color: #fff;
        border: 2px solid #ccc;
    }
    .my_card-body{
        background-color: #1c3c50;
        height: 60px
    }
    .my_card-title{
        color: #fff;
        text-align: center;
        text-transform: uppercase;
        line-height: 100%;
        font-family: fantasy;
        font-size: 20px;
    }
    .my_card-text{
        color: #fff;
        font: bold 90% monospace;
    }
    .my_button{
        background-color: #ab3030;
    }
    .my_card-footer{
        align-items: center;
        height: 100px;
    }
    .my-card-img-top{
        width: 29.5rem;
        height: 250px;
    }
</style>
    <section class="team-area section-padding40 section-bg1" style="background-image: linear-gradient(to right top, #a4a7ae, #afb8bd, #bec9c9, #d0d9d5, #e6e9e1);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section-tittle text-center mb-105" >
                        <h2 style="color:#1c3c50">Nuestros Sitios Web</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $webs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="my_card" >
                      <img src="<?php echo e($wb->icono); ?>" class="my-card-img-top" >
                      <div class="my_card-body">
                        <h5 class="my_card-title"><?php echo e($wb->nombre); ?></h5>
                        <p class="my_card-text"><?php echo $wb->descripcion; ?></p>
                      </div>
                      <div class="my_card-footer">

                          <a href="<?php echo e($wb->enlace); ?>" class="btn my_button" target="_black">ingresar</a>
                      </div>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\resources\views/home/webs.blade.php ENDPATH**/ ?>