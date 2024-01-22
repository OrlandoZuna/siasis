@extends('layouts.portal')
@section('pornav')
    @include('complement.pornav')
@endsection

@section('content')
<div class="slider-area slider-bg ">
  <div class="slider-active">
      <div class="single-slider d-flex align-items-center slider-height ">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-lg-6 col-md-9 ">
                      <div class="hero__caption">
                          <h1 data-animation="fadeInLeft" data-delay=".6s">{{$info->objetivo}}</h1>
                          <p data-animation="fadeInLeft" data-delay=".8s">{!!$info->descripcion!!}</p>
                          <div class="slider-btns">
                            @if (Route::has('login'))
                            @auth
                                <a style="background-color: rgb(35, 88, 134)" href="{{route('home')}}"  data-animation="fadeInLeft" data-delay="1s" class="btn radius-btn">Ir a Mi Panel</a>

                            @else
                              <a style="background-color: rgb(35, 88, 134)" data-animation="fadeInLeft" data-delay="1s" href="{{route('login')}}" class="btn radius-btn">Login</a>
                            @endauth
                            @endif

                          </div>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="hero__img d-none d-lg-block f-right">
                          <img src="{{$info->logo}}" alt="" data-animation="fadeInRight" data-delay="1s">
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

@section('after-script')

@endsection


