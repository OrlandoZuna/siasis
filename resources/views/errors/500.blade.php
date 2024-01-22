@extends('errors::minimal')

@section('content')
<div class="col-md-12">
  <div class="col-middle" >
    <div class="text-center text-center">
      <img src="{{{ asset('layouterros/images/500.png') }}}" width=40% height=40%>
      <div class="mid_center">
        <h5 style="color: #fff; font-size:10px;text-shadow: 4px 4px 4px rgb(166, 166, 204);">EN ESTOS  MOMENTOS TENEMOS PROBLEMAS CON EL SERVIDOR </h5>
        <br>
        <a href="{{ route('admin.inicio') }}" class="btn btn-danger"> Retornar Al Inicio</a>
      </div>
    </div>
  </div>
</div>
@endsection
