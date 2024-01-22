<?php $__env->startSection('content'); ?>

  <!-- Login Admin -->

      <div class="login-form">
          <!-- logo-login -->

          <div class="logo-login">
              <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="">
          </div>
          <?php echo Form::open(['url'=>'login', 'method'=>'post', 'role'=>'form', 'class' => 'form-signin']); ?>

          <?php echo e(csrf_field()); ?>

          <div class="text-left form-input<?php echo e($errors->has('username') || $errors->has('email') ? ' has-error' : ''); ?>">
            <label class="control-label" for="password">CORREO ELECTRONICO O CI:</label>
              <input id="login" type="text" class="form-control<?php echo e($errors->has('username') || $errors->has('email') ? ' is-invalid' : ''); ?>" name="login" value="<?php echo e(old('username') ?: old('email')); ?>" required autofocus>
                <?php if($errors->has('username') || $errors->has('email')): ?>
                  <span class="invalid-feedback">
                    <strong><?php echo e($errors->first('username') ?: $errors->first('email')); ?></strong>
                  </span>
                <?php endif; ?>
          </div>
          <div class="text-left form-input<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            <label class="control-label" for="password">CONTRASEÑA:</label>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required />
            <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>
          <div class="form-input pt-30">
            <input type="submit" name="submit" value="INGRESAR">
          </div>
          <?php echo Form::close(); ?>

          <center>
            <div class="form-input pt-30" style="align-content: center">
              <a href="<?php echo e(route('admin.inicio')); ?>" style="background-color: brown" class="btn btn-sm btn-primary"> Regresar Al Inicio                </a>
          </div>
          </center>
      </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('after-script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.log', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\resources\views/auth/login.blade.php ENDPATH**/ ?>