<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} | @yield('title')</title>
  <link rel="shortcut icon" href="{{{ asset('assets/images/logo.png') }}}" type="image/x-icon" />
  {!! Html::style('assets/js/bootstrap/dist/css/bootstrap.min.css') !!}
  {!! Html::style('assets/js/font-awesome/css/font-awesome.min.css') !!}
  {!! Html::style('assets/js/nprogress/nprogress.css') !!}
  {!! Html::style('assets/css/animate.min.css') !!}
  {!! Html::style('assets/css/custom.css') !!}
  
  {!! Html::script('assets/js/jquery/dist/jquery.min.js') !!}
  @yield('after-style')
</head>
<body class="login" style="padding:0;
margin:0;overflow-y: hidden;background:radial-gradient(black 15%, transparent 16%) 0 0,radial-gradient(black 15%, transparent 16%) 8px 8px,radial-gradient(rgba(255,255,255,.1) 15%, transparent 20%) 0 1px,radial-gradient(rgba(255,255,255,.1) 15%, transparent 20%) 8px 9px;background-color:#060D3C;background-size:16px 16px;font-family: 'Lato', sans-serif !important;">
  <div>
    <div class="login_wrapper">
      @yield('content')
    </div>
  </div>
  @yield('after-script')
</body>
</html>