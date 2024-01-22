@extends('errors::claro')

@section('content')
<style>

// Extra small devices (portrait phones, less than 576px)
@media (max-width: 575.98px) {
  h1{
    font-size:20px;
  }
 }

// Small devices (landscape phones, 576px and up)
@media (min-width: 576px) and (max-width: 767.98px) {
  h1{
    font-size:20px;
  }
}

// Medium devices (tablets, 768px and up)
@media (min-width: 768px) and (max-width: 991.98px) { ... }

// Large devices (desktops, 992px and up)
@media (min-width: 992px) and (max-width: 1199.98px) { ... }

// Extra large devices (large desktops, 1200px and up)
@media (min-width: 1200px) { ... }

</style>
<div class="col-md-12">
  <div class="col-middle" >
    <div class="text-center text-center">
      <img src="{{{ asset('layouterros/images/403.png') }}}">
      <h1 style="color:#fff;text-shadow: 4px 4px 4px rgb(166, 166, 204); font-size:90px;">403</h1>
      <div class="mid_center">
        <h1 style="color:#fff;text-shadow: 4px 4px 4px rgb(166, 166, 204);">USTED NO TIENE PERMISO</h1>
        <h5 style="color: #fff; font-size:10px;text-shadow: 4px 4px 4px rgb(166, 166, 204);">EL SITIO QUE DESEA ACCEDER NO TIENE  PERMISO </h5>
      </div>

    </div>
  </div>
</div>
@endsection
