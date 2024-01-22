<?php $__env->startSection('after-style'); ?>


<style>




  .artboard {
    flex-flow: row;
    align-items: center;
    padding: 4rem;
    height: 100%;
    position: relative;
  }
  @media (max-width: 37.5em) {
    .artboard {
      padding: 1rem;
    }
  }

  .card {
    flex: initial;
    position: relative;
    height: 28rem;
    width: 24rem;
    -moz-perspective: 200rem;
    perspective: 200rem;
    margin: 2rem;
  }
  .card__side {
    height: 28rem;
    transition: all 0.8s ease;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    -webkit-backface-visibility: hidden;
    /* We don't want to see the back part of the element. */
    backface-visibility: hidden;
    /* We don't want to see the back part of the element. */
    border-radius: 3px;
    overflow: hidden;
    /* The image is overflowing the parent. */
    box-shadow: 0 2rem 6rem rgba(0, 0, 0, 0.15);
  }
  .card__side--front {
    background-image: linear-gradient(to right bottom, rgba(30, 11, 54, 0.65), rgba(55, 173, 202, 0.7)),url(https://cdn.spacetelescope.org/archives/images/screen/heic0406a.jpg)
  }
  .card__side--back {
    background-color: #fff;
    transform: rotateY(180deg);
  }
  .card:hover .card__side--back {
    transform: rotateY(0);
  }
  .card:hover .card__side--front {
    transform: rotateY(-180deg);
  }
  .card__theme {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    top: 54%;
    width: 90%;
    text-align: center;
  }
  .card__theme-box {
    color: #fff;
    margin-bottom: 8rem;
  }
  .card__subject {
    font-family: "Inconsolata", monospace;
    letter-spacing: 0.8rem;
    font-size: 1.6rem;
    text-transform: uppercase;
    margin-bottom: 1rem;
  }
  .card__title {
    font-family: "VT323", monospace;
    text-transform: uppercase;
    font-size: 6rem;
    font-weight: 100;
  }
  .card__cover {
    position: relative;
    background-size: cover;
    height: 8rem;
    -webkit-clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
    clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    background-image: linear-gradient(to right bottom, rgba(30, 11, 54, 0.65), rgba(55, 173, 202, 0.7)),url(https://cdn.spacetelescope.org/archives/images/screen/heic0406a.jpg)
  }
  .card__heading {
    text-align: center;
    color: #fff;
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 75%;
  }
  .card__heading-span {
    font-family: "VT323", monospace;
    font-size: 2.2rem;
    font-weight: 300;
    text-transform: uppercase;
    padding: rem 1.5rem;
    color: #fff;
  }
  .card__details {
    font-family: "Inconsolata", monospace;
    padding: 4rem 2rem;
  }
  .card__details ul {
    list-style: none;
    width: 80%;
    margin: 0 auto;
  }
  .card__details ul li {
    text-align: center;
    font-size: 1.8rem;
    padding: 1rem;
  }
  .card__details ul li:not(:last-child) {
    border-bottom: 1px solid #eee;
  }
  @media  only screen and (max-width: 37.5em), only screen and (hover: none) {
    .card {
      height: auto;
      border-radius: 3px;
      background-color: #fff;
      box-shadow: 0 2rem 6rem rgba(0, 0, 0, 0.15);
    }
    .card__side {
      height: auto;
      position: relative;
      box-shadow: none;
    }
    .card__side--front {
      clip-path: polygon(0 15%, 100% 0, 100% 100%, 0 100%);
    }
    .card__side--back {
      transform: rotateY(0);
    }
    .card:hover .card__side--front {
      transform: rotateY(0);
    }
    .card__details {
      padding: 3rem 2rem;
    }
    .card__theme {
      position: relative;
      top: 0;
      left: 0;
      transform: translate(0);
      width: 100%;
      padding: 5rem 4rem 1.5rem 4rem;
      text-align: right;
    }
    .card__theme-box {
      margin-bottom: 1.5rem;
    }
    .card__title {
      font-size: 4rem;
    }
  }
  </style>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('complement.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bar_top'); ?>
    <?php echo $__env->make('complement.navs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if (Auth::check() && Auth::user()->hasPermission('ver.cambio.unidad')): ?>
<center>
  <h1>Unidad Actual " <?php echo e(\Auth::user()->Unidad->name); ?> "</h1>
</center>
<a id="cambiarunidad" class="btn"> cambiar unidad</a>

<?php endif; ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-script'); ?>
<script>
  $(document).on("click","#cambiarunidad",function(){
    $(".sbndata-modal-sm").modal("show");
  });
  $(document).on('click','#verificar',function(e){
    e.preventDefault();
    var token = $('input[name=_token]').val();

    $.ajax({
      url: URL_BASE + '/savecbnpuck',
      type: 'POST',
      headers: {'X-CSRF-TOKEN': token},
      data:new FormData($("#formda")[0]),
      contentType: false,
      processData: false,
      success: function(data) {

       // console.log(URL_BASE+'/'+data);
        window.location.href=URL_BASE+'/'+data;
        //location.reload();
      }
    })
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\resources\views/home.blade.php ENDPATH**/ ?>