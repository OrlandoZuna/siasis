@extends('rrhh::layouts.master')
@section('menu')
    @include('rrhh::complement.menu')
@endsection

@section('bar_top')
    @include('rrhh::complement.navs')
@endsection

@section('after-style')
<style type="text/css">
    .myscroll {
        border: solid white 1px;
        overflow: scroll;
        height: 470px;
    }
    .containerasis {
      border: solid blue 3px;
      border-radius: 10px;
      position: relative;
      width: 100%;
      padding: 10px 12px;
      display: inline-block;
      background: #fff;
      border: 1px solid #414141;
      -webkit-column-break-inside: avoid;
      -moz-column-break-inside: avoid;
      column-break-inside: avoid;
      opacity: 1;
      transition: all .2s ease;
      border-radius:10px;
    }
    .btn{
        background:linear-gradient(10deg, #caf0f8, #00b4d8);
        font-family:monospace;
        color:rgb(0, 0, 0) !important;
        font-weight:bold;
        /* margin: 20px; */
    }
    .btn-p{
        background:linear-gradient(10deg, #57a1d6, #313652);
        font-family:monospace;
        color:rgb(255, 255, 255) !important;
        font-weight:bold;
        /* margin: 20px; */
    }
    .btn:hover{
        margin: 10px;
        overflow: hidden;
        background: linear-gradient(156deg, #03045e, #0077b6);
        color:rgb(0, 0, 0) !important;
        border-radius:15px 0 0 15px;
        font-family:monospace;
        font-weight:bold;
        color:white !important;
    }
    .btn-p:hover{
        margin: 10px;
        overflow: hidden;
        background: linear-gradient(156deg, #920f0f7a, #000000d1 );
        color:black !important;
        border-radius:15px 0 0 15px;
        font-family:monospace;
        font-weight:bold;
    }

    .eliminarUser{
      background:linear-gradient(10deg, #e73f0b, #a11f0c) !important;
    }
    .eliminarUser:hover{
      background:linear-gradient(10deg, #283655, #4d648d) !important;
    }
    h2 {
      text-align: center;
      font-weight: bold;
      font-family: monospace;
    }
    th{
      text-align: center;
      font-size: 13px;
    }
    td{
      text-align: center;
      font-size: 12px;
    }
    .tablas{
      margin-bottom: 20px;
    }
    .form-select-sm:hover{
      background-color: #0077b6;
      color: white;
      display: inline-block;
    }
    #opcion:hover{
      display: block;
    }
    .table__kiri {
        width: 100%;
        height: auto;
        position: relative;
        border: 1px solid #000;
    }
    .table__kiri thead {
    background: #113F63;
    color: #fff;
    }
    .table__kiri thead tr {
    height: 28px;
    }
    .table__kiri thead tr td {
    text-align: center;
    /* width: 12%; */
    border: 1px solid #fff;
    text-transform: uppercase;
    }
    .table__kiri tbody tr {
    height: 28px;
    }
    .table__kiri tbody tr td {
    padding-left: 10px;
    /* width: 12%; */
    border: 1px solid #fff;
    text-transform: uppercase;
    }
    .table__kiri tbody tr:nth-child(even) {
    background: #deeaf4;
    }

  </style>

    {!! Html::script('assets/js/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('assets/plugins/colorpicker/bootstrap-colorpicker.min.css') !!}
    {!! Html::style('assets/plugins/timepicker/bootstrap-timepicker.min.css') !!}

@endsection
@section('content')
<div  id="principalPanel">
  <div class= "row col-md-12 col-sm-12 col-xs-12" style="padding:15px;background:#2f5e80cc;border-radius:10px;">
    <div class="containerasis">
        <div class="text-center">
            <h2 style="text-transform:uppercase;font-family:monospace;font-weight:bold;font-size:24px;text-decoration:underline">{{$title}} DISPOSITIVOS</h2>
        </div>
      <div id="tablauserRender">
        <div class="tabla-usuarios">
          <div class="form-inlene" style="text-align: right;font-weight: bold;margin-top: 1px;
          margin-bottom: 15px;height: 9%;padding: 5px 0 5px 0;">
            <h2>Asistencias de App Movil</h2>
            <button type="button" class="btn btn-secondary importarApp" id="importarApp" onclick=" app()" style=" float: right ; margin-left: 40%; margin-botton: 10px; margin-right: 1%;">Importar Asistencias</button>

          </div>
          <div class= "renderUser">
            <table class="table__kiri table-bordered" style="width:99%;">
              <thead>
              <tr>
                <td>Id_ho</td>
                <td>Id_per</td>
                <td>Ci_a</td>
                <td>Turno_a</td>
                <td>Tipo_a</td>
                <td>Estado_a</td>
                <td>Fecha</td>
                <td>Hora</td>
              </tr>
              </thead>
              <tbody>
                @foreach($data1 as $asis)
                  <tr class="">
                    <td> {{ $asis->id_horario }}</td>
                    <td> {{ $asis->id_persona }}</td>
                    <td> {{ $asis->ci_a }}</td>
                    <td> {{ $asis->turno_a }}</td>
                    <td> {{ $asis->tipo_a }}</td>
                    <td> {{ $asis->estado_a }}</td>
                    <td> {{ $asis->fecha }}</td>
                    <td> {{ $asis->hora }}</td>
                  </tr>
                  @endforeach
              </tbody>

            </table>
            <div class="row">
              <div class="col-lg-12 text-center">
                {!! $data1->links() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div id="reloj" style="font-family: ‘DS-Digital’; width: 450px; background-color: black;font-size:100px;color: green ; text-align: center "></div> -->
      <div id="carga" style="display: none; background-color: #fff; text-align: center;"> <img src="{{{ asset('assets/images/loanding5.gif') }}}" width="150px" style="color: #900c3f;"></div>

      <div class="tablas_biometrico" style="margin-top:10px;">
        <div class="form-inlene" style="text-align: right;font-weight: bold;margin-top: 1px;
          margin-bottom: 15px;height: 9%;padding: 5px 0 5px 0;">
          <h2>Asistencias de Biometrico</h2>
            <button type="button" class="btn btn-secondary importarBiom" id="importarBiom" onclick=" biometrico()" style="margin-bottom: 10px; float: right; margin-right: 1%;">Importar Asistencias</button>
        </div>
        <div id="table_data">
          <table class="table__kiri table-bordered" style="width:99%" id="table" name="table">
              <thead>
              <tr>
                <th>Nregistro</th>
                <th>Id_Biometrico</th>
                <th>Id_usuario</th>
                <th>State</th>
                <th>timestamp</th>
                <th>type_Re</th>
              </tr>
              </thead>
              <tbody>
                @foreach($data as $asistencia)
                  <tr>
                    <td>{{ $asistencia->Nregistro }}</td>
                    <td>{{ $asistencia->id_biometrico }}</td>
                    <td>{{ $asistencia->id_user_b }}</td>
                    <td>{{ $asistencia->state }}</td>
                    <td>{{ $asistencia->timestamp }}</td>
                    <td>{{ $asistencia->type }}</td>
                  </tr>
                @endforeach

              </tbody>
          </table>

          <div class="row">
            <div class="col-lg-12 text-center">
              {!! $data->links() !!}
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection
@section('after-script')

 <!-- vista general de biometricos -->

<!-- modal create -->
<script type="text/javascript">
function app(){
    console.log('hola desde importar');
    $.ajax({
      type:'GET',
      url:URL_BASE+'/importarApp',
      //data:{dato},
        success:function(datos){
            if(datos.resp==200){
                toastr.success("las de la aplicacion se importaron con exito hacia las asistencias actuales");
            }
            else if (datos.resp==2000){
                toastr.success("es el primer biometrico con la importacion y guardado exitosa");
            }
            else {
                toastr.warning(" ya se importaron las asistencias");
            }
        },error:function(){
        toastr.error(" no hay asistencias a importar de la app a las asistencias actuales");
      }
    });
}

function biometrico(){
    console.log('hola desde importar asitencias de biometrico');
    $.ajax({
      type:'GET',
      url:URL_BASE+'/importarBiom',
      //data:{dato},
      beforeSend: function () {
              $("#carga").show();
            },
        success:function(datos){
            if(datos.resp==200){
                toastr.success("la importacion y guardado de datos del biometrico fue correcta");
                $("#carga").hide();
            }
            else if (datos.resp==2000){
                toastr.success("es el primer biometrico con la importacion y guardado exitosa");
                $("#carga").hide();
            }
            else {
                toastr.warning(" ya esta registrado la asistencia del biometrico");
                $("#carga").hide();
            }
        },error:function(){
        toastr.error(" no se mando valor");
        $("#carga").hide();
      }
    });
}

$('#importarApp').click();
//
//   function startTime(){

//   today=new Date();

//   h=today.getHours();

//   m=today.getMinutes();

//   s=today.getSeconds();

//   m=checkTime(m);

//   s=checkTime(s);

//   document.getElementById('reloj').innerHTML=h+":"+m+":"+s;

//   t=setTimeout('startTime()', 500);

//   //console.log($('#reloj').val());
//   return today;
// }

//   function checkTime(i)

//   {if (i<10) {i=0 + i;}return i;}
//   setInterval(startTime, 3000);
//   console.log($('#reloj').val());
//   //console.log(startTime());

//   window.onload=function(){startTime();}
//   console.log($('#reloj').val());
</script>
<script>
  /////render table biometrico
$(document).ready(function(){
$(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  var page = $(this).attr('href').split('page=')[1];
  console.log(page);
  fetch_data(page);
});

function fetch_data(page)
{
  $.ajax({
   url:"paginaciondeasistenciasbiometrico?page="+page,
   success:function(data)
   {
    $('#table_data').html(data);
   }
  });
}
});

</script>
<script type="text/javascript">
  $(document).on("click", ".pagination a", function(e) {
  e.preventDefault();
  // var _thisVar = $input.val();
  var urlPag_Now = $(this).attr('href');
  $.ajax({
    type:'GET',
    url: urlPag_Now,
    data:{},
    success: function(xhr_JsX) {
      $('.renderUser').html(xhr_JsX.list_personal);
    }
  });
});

</script>
@endsection


