<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ricardo rojas cruz">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{{ asset('assets/images/logo.png') }}}" type="image/x-icon" />
    @yield('before-style')

    {!! Html::style('migrate-4.3/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('migrate-4.3/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('migrate-4.3/nprogress/nprogress.css') !!}
    {!! Html::style('migrate-4.3/iCheck/skins/flat/green.css') !!}
    {!! Html::style('migrate-4.3/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') !!}
    {!! Html::style('migrate-4.3/jqvmap/dist/jqvmap.min.css') !!}
    {{-- {!! Html::style('migrate-4.3/bootstrap-daterangepicker/daterangepicker.css') !!} --}}
    {!! Html::style('migrate-4.3/build/css/custom.min.css') !!}
    {!! Html::style('assets/admin/css/admin.css') !!}
    <link href="{{ asset('assets/toastr/toastr.min.css') }}" rel="stylesheet">
    @yield('after-style')

    <style>


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

  </head>

    @yield('after-style')
  </head>

  <body class="nav-md" style="background-color:#0d1316">
    <div class="container body">
      <div class="main_container">
        @yield('content')
      </div>
    </div>

      {!! Html::script('migrate-4.3/jquery/dist/jquery.min.js') !!}
      {!! Html::script('migrate-4.3/bootstrap/dist/js/bootstrap.bundle.min.js') !!}


      {!! Html::script('migrate-4.3/nprogress/nprogress.js') !!}

      {!! Html::script('migrate-4.3/bootstrap-progressbar/bootstrap-progressbar.min.js') !!}

      {!! Html::script('migrate-4.3/build/js/custom.min.js') !!}

      <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>




@yield('after-script')

</body>
</html>



