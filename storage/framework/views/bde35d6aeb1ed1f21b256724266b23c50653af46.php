<!doctype html>
<html class="no-js" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> SIADSIS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('assets/images/logo.png')); ?>">

    <!-- CSS here -->
    <?php echo Html::style('portal/css/bootstrap.min.css'); ?>

    <?php echo Html::style('portal/css/owl.carousel.min.css'); ?>

    <?php echo Html::style('portal/css/slicknav.css'); ?>


    <?php echo Html::style('portal/css/flaticon.css'); ?>

    <?php echo Html::style('portal/css/progressbar_barfiller.css'); ?>

    <?php echo Html::style('portal/css/gijgo.css'); ?>

    <?php echo Html::style('portal/css/animate.min.css'); ?>

    <?php echo Html::style('portal/css/animated-headline.css'); ?>

    <?php echo Html::style('portal/css/magnific-popup.css'); ?>

    <?php echo Html::style('portal/css/fontawesome-all.min.css'); ?>

    <?php echo Html::style('portal/css/themify-icons.css'); ?>

    <?php echo Html::style('portal/css/slick.css'); ?>

    <?php echo Html::style('portal/css/nice-select.css'); ?>

    <?php echo Html::style('portal/css/style.css'); ?>

</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <?php $__env->startSection('pornav'); ?>
    <?php echo $__env->yieldSection(); ?>
    <main class="login-body" data-vide-bg="<?php echo e(asset('portal/img/login-bg.mp4')); ?>">

        <?php echo $__env->yieldContent('content'); ?>


    </main>



<!-- JS here -->
<?php echo Html::script('portal/js/vendor/modernizr-3.5.0.min.js'); ?>

<?php echo Html::script('portal/js/vendor/jquery-1.12.4.min.js'); ?>

<?php echo Html::script('portal/js/popper.min.js'); ?>

<?php echo Html::script('portal/js/bootstrap.min.js'); ?>

<?php echo Html::script('portal/js/jquery.slicknav.min.js'); ?>


<?php echo Html::script('portal/js/owl.carousel.min.js'); ?>

<?php echo Html::script('portal/js/slick.min.js'); ?>

<?php echo Html::script('portal/js/wow.min.js'); ?>

<?php echo Html::script('portal/js/animated.headline.js'); ?>

<?php echo Html::script('portal/js/jquery.magnific-popup.js'); ?>

<?php echo Html::script('portal/js/gijgo.min.js'); ?>

<?php echo Html::script('portal/js/jquery.vide.js'); ?>


<?php echo Html::script('portal/js/jquery.nice-select.min.js'); ?>

<?php echo Html::script('portal/js/jquery.sticky.js'); ?>

<?php echo Html::script('portal/js/jquery.barfiller.js'); ?>

<?php echo Html::script('portal/js/jquery.counterup.min.js'); ?>

<?php echo Html::script('portal/js/waypoints.min.js'); ?>


<?php echo Html::script('portal/js/jquery.countdown.min.js'); ?>

<?php echo Html::script('portal/js/hover-direction-snake.min.js'); ?>

<?php echo Html::script('portal/js/contact.js'); ?>

<?php echo Html::script('portal/js/jquery.form.js'); ?>

<?php echo Html::script('portal/js/jquery.validate.min.js'); ?>

<?php echo Html::script('portal/js/mail-script.js'); ?>

<?php echo Html::script('portal/js/jquery.ajaxchimp.min.js'); ?>

<?php echo Html::script('portal/js/plugins.js'); ?>

<?php echo Html::script('portal/js/main.js'); ?>




</body>
</html>
<?php /**PATH C:\xampp\htdocs\Web\resources\views/layouts/log.blade.php ENDPATH**/ ?>