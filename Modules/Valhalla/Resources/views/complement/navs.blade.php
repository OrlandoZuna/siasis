<style>
  .nav.navbar-nav>li>a:hover{
    background: #113F63;
    color:#fff !important;
  }
</style>
<div class="nav_menu" style="background-color: #CBDEED  ">
  <nav>
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>

    </div>
    <ul class="nav navbar-nav navbar-right">

      <li class="">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
  {{\Auth::user()->name}}
          <span class=" fa fa-angle-down"></span>
        </a>
        <ul class="dropdown-menu dropdown-usermenu pull-right">
          @permission('user.perfil')
          <li><a href="{{route('profile.index')}}">Perfil</a>
          </li>
          @endpermission
          <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Desconectar</a>
          <form id="logout-form" action="{{ url('/logout') }}" method="get" style="display: none;">{{ csrf_field() }}</form></li>
        </ul>
      </li>

    </ul>
  </nav>
</div>
