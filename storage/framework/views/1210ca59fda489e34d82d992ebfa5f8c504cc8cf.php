<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Data-Center-Área-de-desarrollo">
    <title><?php echo e(config('app.name')); ?> | <?php echo e($title); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo.png')); ?>" type="image/x-icon" />
    <?php echo $__env->yieldContent('before-style'); ?>
    <?php echo Html::style('assets/js/bootstrap/dist/css/bootstrap.css'); ?>

    <?php echo Html::style('assets/js/font-awesome/css/font-awesome.min.css'); ?>

    <?php echo Html::style('assets/js/nprogress/nprogress.css'); ?>

    <link href="<?php echo e(asset('assets/toastr/toastr.min.css')); ?>" rel="stylesheet">
    <?php echo Html::style('assets/css/custom.css'); ?>

    <?php echo Html::style('assets/admin/css/admin.css'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/assets_principal/Menu-Nav.css')); ?>">
    <?php
      $environment = config('app.echoport');
    ?>
        <style type="text/css">
        .water
        {
          width:100px;
          height: 100px;
          background-color: skyblue;
          border-radius: 50%;
          position: relative;
          box-shadow: inset 0 0 30px 0 rgba(0,0,0,.5), 0 4px 10px 0 rgba(0,0,0,.5);
          overflow: hidden;
          z-index: 1;
          margin-top: 100px;
          webkitTransform:rotate(-50deg);
          msTransform:rotate(-50deg);
          transform:rotate(-50deg);
        }
        .water:before, .water:after
        {
          content:'';
          position: absolute;
          width:150px;
          height: 250px;
          top:-150px;
          background-color: #fff;
        }
        .water:before
        {
          border-radius: 45%;
          background:rgba(255,255,255,.7);
          animation:wave 5s linear infinite;
        }
        .water:after
        {
          border-radius: 35%;
          background:rgba(255,255,255,.3);
          animation:wave 5s linear infinite;
        }
        @keyframes  wave{
          0%{
            transform: rotate(0);
          }
          100%{
            transform: rotate(380deg);
          }
        }
    </style>
    <?php echo $__env->yieldContent('after-style'); ?>
    <?php echo Html::script('assets/js/jquery/dist/jquery.min.js'); ?>

  </head>
  <body class="nav-md" >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed F_colJxSidebar">
          <div class="left_col scroll-view S_colJxSidebar">
            <div class="navbar nav_title T_tleNavJxSideb">
              <a href="<?php echo URL::to('home'); ?>" class="site_title Link_ImgLog"><img src="<?php echo e(asset('assets/images/logo.png')); ?>" class="ImgLogPrinSideb"><span class="titlePrinSys"><?php echo e(config('app.name')); ?></span></a>
            </div>
            <div class="clearfix" ></div>
            <br>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <?php $__env->startSection('menu'); ?>
              <?php echo $__env->yieldSection(); ?>
              <div class="sidebar-footer hidden-small">

              </div>
            </div>
          </div>
        </div>
        <div class="top_nav">
          <?php $__env->startSection('bar_top'); ?>
          <?php echo $__env->yieldSection(); ?>
        </div>
        <div class="right_col" role="main">
          <div class="loader" style="position: fixed;top: 0;left: 0;width: 100%;height: 100vh;background: rgba(63, 63, 63, 0.637);z-index: 9999;text-align: center;">
            <div class="water" style="position: relative;top: 23%;left:45%;width: 100px;"></div>
          </div>
          <?php echo $__env->yieldContent('content'); ?>
        </div>
      </div>
    </div>
      <?php echo Html::script('assets/js/bootstrap/dist/js/bootstrap.min.js'); ?>


      <?php echo Html::script('assets/js/nprogress/nprogress.js'); ?>

      <?php echo Html::script('assets/js/moment/moment.js'); ?>


      <?php echo Html::script('assets/js/custom.js'); ?>

      <?php echo Html::script('assets/fastclick/lib/fastclick.js'); ?>

      <?php echo Html::script('assets/nprogress/nprogress.js'); ?>




      <script src="<?php echo e(asset('assets/toastr/toastr.min.js')); ?>"></script>

      <script>
        var URL_BASE='<?php echo e(url("/")); ?>';
        var URL_BASEP='<?php echo e(url("/planificacion")); ?>';
        var _TOKEN='<?php echo e(csrf_token()); ?>';
        function buscarencolumna (columna,este)
        {

            var tableReg = $(este).parent("td").parent("tr").parent("thead").parent("table")[0];
            var searchText =$(este).val().toLowerCase();
            var cellsOfRow="";
            var found=false;
            var compareWith="";

            for (var i = 1; i < tableReg.rows.length; i++)
            {
                cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                found = false;
                    compareWith = cellsOfRow[columna].innerHTML.toLowerCase();
                    if(compareWith[0]!='<'){
                        if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
                        {
                            found = true;
                        }
                    }
                if(found)
                {
                    tableReg.rows[i].style.display = '';
                } else {
                    tableReg.rows[i].style.display = 'none';
                }
            }
        }
      </script>



      <script>
      <?php if(session()->has('notify')): ?>
         toastr.<?php echo e(session()->get('notify')['type']); ?>('<?php echo e(session()->get('notify')['message']); ?>');
      <?php endif; ?>

      <?php if(isset($notify)): ?>
         toastr.<?php echo e($notify['type']); ?>('<?php echo e($notify['message']); ?>');
      <?php endif; ?>
      <?php if(count($errors)>0): ?>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              toastr.error('<?php echo e($error); ?>');
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      </script>
       <script>
        window.onload = function(){ document.querySelector(".loader").style.display = "none"; }
      </script>
      <!--
      <script>
            window.laravel_echo_port=6001;
    </script>
   <script src="//<?php echo e(Request::getHost()); ?>:<?php echo e($environment); ?>/socket.io/socket.io.js"></script>
   <script src="<?php echo e(url('/js/app.js')); ?>"></script>-->

    <?php echo $__env->yieldContent('after-script'); ?>
  </body>
</html>



<?php /**PATH C:\xampp\htdocs\Web\resources\views/layouts/principal.blade.php ENDPATH**/ ?>