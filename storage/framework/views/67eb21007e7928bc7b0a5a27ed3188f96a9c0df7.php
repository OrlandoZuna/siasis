<div class="menu_section">
  <div class="con_ImCos" style= "color= red">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo.png')); ?>" type="image/x-icon" />
    <!-- <img src="<?php echo e(asset('assets/images/uatfblanco.png')); ?>" alt="Logo-UATF"> -->
    <h3 class="titleUnidPrin">Recursos Humanos</h3>
  </div>
  <hr>
  
  <ul class="nav side-menu J_HovSeItem">
    <li>
      <a href="<?php echo e(url('/')); ?>" class="J_JxNavLinkSty"><i class="fa fa-home"></i>Inicio</a>
    </li>
    <?php if (Auth::check() && Auth::user()->hasPermission('administracion.listrhh')): ?>
    <li><a class="J_JxNavLinkSty"><i class="fa fa-desktop"></i> <span class="title_SubNav">Administración </span><span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu J_NacHildBac">
        <div class="cont-title-navsub">
          <span>Administración</span>
        </div>
        <li class="InTolinkSub_Tit">
          <span class="title_Xs">Administración</span>
        </li>
        <?php if (Auth::check() && Auth::user()->hasPermission('administracion.personalrrhh')): ?>
        <li class="InTolinkSub">
          <a href="<?php echo e(route('rrhh.personals')); ?>" class="J_JxNavLinkStyXs"><i class="fa fa-user"></i> Personas</a>
        </li>
        <?php endif; ?>
        <?php if (Auth::check() && Auth::user()->hasPermission('administracion.personalrrhh')): ?>
        <li class="InTolinkSub">
          <a href="<?php echo e(route('admin.horarios.lista')); ?>" class="J_JxNavLinkStyXs"><i class="fa fa-hourglass"></i> Horarios</a>
        </li>
        <?php endif; ?>
        <!-- <?php if (Auth::check() && Auth::user()->hasPermission('administracion.personalrrhh')): ?>
        <li class="InTolinkSub">
          <a href="<?php echo e(route('admin.biometricos.lista')); ?>" class="J_JxNavLinkStyXs"><i class="fa fa-mobile"></i> Biometrico</a>
        </li>
        <?php endif; ?> -->
        <?php if (Auth::check() && Auth::user()->hasPermission('administracion.personalrrhh')): ?>
        <li class="InTolinkSub">
          <a href="<?php echo e(route('admin.biometricos.lis')); ?>" class="J_JxNavLinkStyXs"><i class="fa fa-fax"></i> Biometricos</a>
        </li>
        <?php endif; ?>
        <?php if (Auth::check() && Auth::user()->hasPermission('administracion.personalrrhh')): ?>
        <li class="InTolinkSub">
          <a href="<?php echo e(route('admin.grupotrabajo.lista')); ?>" class="J_JxNavLinkStyXs"><i class="fa fa-tasks"></i> Grupos</a>
        </li>
        <?php endif; ?>
        <?php if (Auth::check() && Auth::user()->hasPermission('administracion.personalrrhh')): ?>
        <li class="InTolinkSub">
          <a href="<?php echo e(route('admin.designaciongrupotrabajo.lista')); ?>" class="J_JxNavLinkStyXs"><i class="fa fa-slideshare"></i> Designar Grupos</a>
        </li>
        <?php endif; ?>
        <?php if (Auth::check() && Auth::user()->hasPermission('administracion.personalrrhh')): ?>
        <li class="InTolinkSub">
          <a href="<?php echo e(route('admin.asistenciaspositivos.lista')); ?>" class="J_JxNavLinkStyXs"><i class="fa fa-book"></i> Asistencias Equipos</a>
        </li>
        <?php endif; ?>
        <?php if (Auth::check() && Auth::user()->hasPermission('administracion.personalrrhh')): ?>
        <li class="InTolinkSub">
          <a href="<?php echo e(route('admin.tiposalida.lista')); ?>" class="J_JxNavLinkStyXs"><i class="fa fa-outdent"></i> Tipo Salidas</a>
        </li>
        <?php endif; ?>
        <?php if (Auth::check() && Auth::user()->hasPermission('administracion.personalrrhh')): ?>
        <li class="InTolinkSub">
          <a href="<?php echo e(route('admin.tipocontrato.lista')); ?>" class="J_JxNavLinkStyXs"><i class="fa fa-clipboard"></i> Tipo Contratos</a>
        </li>
        <?php endif; ?>
      </ul>
    </li>
    <?php endif; ?>
  </ul>
</div>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/complement/menu.blade.php ENDPATH**/ ?>