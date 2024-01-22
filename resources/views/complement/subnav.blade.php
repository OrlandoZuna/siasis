<style>
  .nav.navbar-nav>li>a:hover{
    background:#C6F3F1
    color:#0B1111 !important;
  }
</style>

<div class="nav_menu" style="background-color: #70A0C6">
  <nav class="navbar navbar-default" role="navigation" style="background-color: #70A0C6">
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
              data-target=".navbar-ex1-collapse">
        <span class="sr-only">Desplegar navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><i ><img src="{{{ asset('assets/personal_icons/winner-document.png') }}}"/></i>Otros Documentos</a></li>

               <li><a href="#"><i ><img src="{{{ asset('assets/personal_icons/fb2.png') }}}"/></i> Documentos Personales</a></li>
              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i><img src="{{{ asset('assets/personal_icons/zip.png') }}}"/></i> Hoja De Vida
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu" style="background-color: #70a0c6">
                    <li style="background-color: #70a0c6 "><a href="#" style="color: #fff "><i ><img src="{{{ asset('assets/personal_icons/parse-resumes.png') }}}"/></i> Exp. laboral</a></li>
                    <li style="background-color: #70a0c6 "><a href="#" style="color: #fff "><i ><img src="{{{ asset('assets/personal_icons/online-pricing.png') }}}"/></i> Cursos</a></li>
                    <li style="background-color: #70a0c6 "><a href="#" style="color: #fff "><i ><img src="{{{ asset('assets/personal_icons/bookmark.png') }}}"/></i> Estudios</a></li>
                </ul>
              </li>
              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i><img src="{{{ asset('assets/personal_icons/add-file.png') }}}"/></i> Documentos Institucionales
                </a>
                <ul id="menu1" class=" opp dropdown-menu list-unstyled msg_list" role="menu" style="background-color: #70a0c6">
                  <li style="background-color: #70a0c6;"><a href="#" style="color: #fff "><i ><img src="{{{ asset('assets/personal_icons/delete-bookmark.png') }}}"/></i> Designacion/Contrato</a></li>
                    <li style="background-color: #70a0c6 "><a href="#" style="color: #fff "><i ><img src="{{{ asset('assets/personal_icons/home.png') }}}"/></i> Bajas Medicas</a></li>
                    <li style="background-color: #70a0c6 "><a href="#" style="color: #fff "><i ><img src="{{{ asset('assets/personal_icons/mailbox-closed-flag-down.png') }}}"/></i> Vacaciones</a></li>
                    <li style="background-color: #70a0c6 "><a href="#" style="color: #fff "><i ><img src="{{{ asset('assets/personal_icons/opened-folder.png') }}}"/></i> Memorandum</a></li>
                    <li style="background-color: #70a0c6 "><a href="#" style="color: #fff "><i ><img src="{{{ asset('assets/personal_icons/adobe-acrobat.png') }}}"/></i> Recategorizacion</a></li>
                    <li style="background-color: #70a0c6 "><a href="#" style="color: #fff "><i> <img src="{{{ asset('assets/personal_icons/news.png') }}}"/></i> Resoluciones</a></li>
                </ul>
              </li>
        </li>
      </ul>
    </div>
  </nav>
</div>

