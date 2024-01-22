<div class="nav_menu" id="J_MenuNavDex">
  <nav>
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="JxContentOptUser">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
          <?php echo e(\Auth::user()->name); ?>

          <span class="fa fa-angle-down"></span>
        </a>
        <ul class="dropdown-menu dropdown-usermenu pull-right">
          <li><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Desconectar</a>
          <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="get" style="display: none;"><?php echo e(csrf_field()); ?></form></li>
        </ul>
      </li>
    </ul>
  </nav>
</div>
<?php /**PATH C:\xampp\htdocs\Web\resources\views/complement/navs.blade.php ENDPATH**/ ?>