<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> SIADSIS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{{ asset('assets/images/logo.png') }}}">

    <!-- CSS here -->
    {!! Html::style('portal/css/bootstrap.min.css') !!}
    {!! Html::style('portal/css/owl.carousel.min.css') !!}
    {!! Html::style('portal/css/slicknav.css') !!}

    {!! Html::style('portal/css/flaticon.css') !!}
    {!! Html::style('portal/css/progressbar_barfiller.css') !!}
    {!! Html::style('portal/css/gijgo.css') !!}
    {!! Html::style('portal/css/animate.min.css') !!}
    {!! Html::style('portal/css/animated-headline.css') !!}
    {!! Html::style('portal/css/magnific-popup.css') !!}
    {!! Html::style('portal/css/fontawesome-all.min.css') !!}
    {!! Html::style('portal/css/themify-icons.css') !!}
    {!! Html::style('portal/css/slick.css') !!}
    {!! Html::style('portal/css/nice-select.css') !!}
    {!! Html::style('portal/css/style.css') !!}
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{{ asset('assets/images/logo.png') }}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @section('pornav')
    @show
    <main class="login-body" data-vide-bg="{{{ asset('portal/img/login-bg.mp4') }}}">

        @yield('content')


    </main>



<!-- JS here -->
{!! Html::script('portal/js/vendor/modernizr-3.5.0.min.js') !!}
{!! Html::script('portal/js/vendor/jquery-1.12.4.min.js') !!}
{!! Html::script('portal/js/popper.min.js') !!}
{!! Html::script('portal/js/bootstrap.min.js') !!}
{!! Html::script('portal/js/jquery.slicknav.min.js') !!}

{!! Html::script('portal/js/owl.carousel.min.js') !!}
{!! Html::script('portal/js/slick.min.js') !!}
{!! Html::script('portal/js/wow.min.js') !!}
{!! Html::script('portal/js/animated.headline.js') !!}
{!! Html::script('portal/js/jquery.magnific-popup.js') !!}
{!! Html::script('portal/js/gijgo.min.js') !!}
{!! Html::script('portal/js/jquery.vide.js') !!}

{!! Html::script('portal/js/jquery.nice-select.min.js') !!}
{!! Html::script('portal/js/jquery.sticky.js') !!}
{!! Html::script('portal/js/jquery.barfiller.js') !!}
{!! Html::script('portal/js/jquery.counterup.min.js') !!}
{!! Html::script('portal/js/waypoints.min.js') !!}

{!! Html::script('portal/js/jquery.countdown.min.js') !!}
{!! Html::script('portal/js/hover-direction-snake.min.js') !!}
{!! Html::script('portal/js/contact.js') !!}
{!! Html::script('portal/js/jquery.form.js') !!}
{!! Html::script('portal/js/jquery.validate.min.js') !!}
{!! Html::script('portal/js/mail-script.js') !!}
{!! Html::script('portal/js/jquery.ajaxchimp.min.js') !!}
{!! Html::script('portal/js/plugins.js') !!}
{!! Html::script('portal/js/main.js') !!}



</body>
</html>
