<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Data-Center-Área-de-desarrollo">
    <title>{{ config('app.name') }} | {{$title}}</title>
    <link rel="shortcut icon" href="{{{ asset('assets/images/logo.png') }}}" type="image/x-icon" />
    @yield('before-style')
    {!! Html::style('assets/js/bootstrap/dist/css/bootstrap.css') !!}
    {!! Html::style('assets/js/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/js/nprogress/nprogress.css') !!}
    <link href="{{ asset('assets/toastr/toastr.min.css') }}" rel="stylesheet">
    {!! Html::style('assets/css/custom.css') !!}
    {!! Html::style('assets/admin/css/admin.css') !!}
    <link rel="stylesheet" href="{{asset('assets/assets_principal/Menu-Nav.css')}}">
    @php
      $environment = config('app.echoport');
    @endphp
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
        @keyframes wave{
          0%{
            transform: rotate(0);
          }
          100%{
            transform: rotate(380deg);
          }
        }
    </style>
    @yield('after-style')
    {!! Html::script('assets/js/jquery/dist/jquery.min.js') !!}
  </head>
  <body class="nav-md" >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed F_colJxSidebar">
          <div class="left_col scroll-view S_colJxSidebar">
            <div class="navbar nav_title T_tleNavJxSideb">
              <a href="{!!URL::to('home')!!}" class="site_title Link_ImgLog"><img src="{{{ asset('assets/images/logo.png') }}}" class="ImgLogPrinSideb"><span class="titlePrinSys">{{ config('app.name') }}</span></a>
            </div>
            <div class="clearfix" ></div>
            <br>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              @section('menu')
              @show
              <div class="sidebar-footer hidden-small">

              </div>
            </div>
          </div>
        </div>
        <div class="top_nav">
          @section('bar_top')
          @show
        </div>
        <div class="right_col" role="main">
          <div class="loader" style="position: fixed;top: 0;left: 0;width: 100%;height: 100vh;background: rgba(63, 63, 63, 0.637);z-index: 9999;text-align: center;">
            <div class="water" style="position: relative;top: 23%;left:45%;width: 100px;"></div>
          </div>
          @yield('content')
        </div>
      </div>
    </div>
      {!! Html::script('assets/js/bootstrap/dist/js/bootstrap.min.js') !!}

      {!! Html::script('assets/js/nprogress/nprogress.js') !!}
      {!! Html::script('assets/js/moment/moment.js') !!}

      {!! Html::script('assets/js/custom.js')!!}
      {!! Html::script('assets/fastclick/lib/fastclick.js')!!}
      {!! Html::script('assets/nprogress/nprogress.js')!!}



      <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>

      <script>
        var URL_BASE='{{url("/")}}';
        var URL_BASEP='{{url("/planificacion")}}';
        var _TOKEN='{{csrf_token()}}';
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
      @if(session()->has('notify'))
         toastr.{{session()->get('notify')['type']}}('{{session()->get('notify')['message']}}');
      @endif

      @if(isset($notify))
         toastr.{{$notify['type']}}('{{$notify['message']}}');
      @endif
      @if(count($errors)>0)
          @foreach ($errors->all() as $error)
              toastr.error('{{$error}}');
          @endforeach
      @endif
      </script>
       <script>
        window.onload = function(){ document.querySelector(".loader").style.display = "none"; }
      </script>
      <!--
      <script>
            window.laravel_echo_port=6001;
    </script>
   <script src="//{{ Request::getHost() }}:{{$environment}}/socket.io/socket.io.js"></script>
   <script src="{{ url('/js/app.js') }}"></script>-->

    @yield('after-script')
  </body>
</html>



