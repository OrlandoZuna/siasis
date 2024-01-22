<!-- <html> -->
  <!-- <head> -->
    <!-- <title></title> -->
    <!-- <meta content=""> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> --> 
        <!-- <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet"> --> 
    @extends('rrhh::layouts.master')
@section('menu')
    @include('rrhh::complement.menu')
@endsection

@section('bar_top')
    @include('rrhh::complement.navs')
@endsection
@section('after-style')

    {!! Html::script('assets/js/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('assets/js/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('assets/plugins/colorpicker/bootstrap-colorpicker.min.css') !!}
    {!! Html::style('assets/plugins/timepicker/bootstrap-timepicker.min.css') !!}
    <style type="text/css">
        .myscroll {
            border: solid white 1px;
            overflow: scroll;
            height: 470px;
        }

        .header-col{
            background: #E3E9E5;
            color:#536170;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .header-calendar{
            background: #EE192D;color:white;
        }
        .box-day{
            border:1px solid #E3E9E5;
            height:150px;
        }
        .box-dayoff{
            border:1px solid #E3E9E5;
            height:150px;
            background-color: #ccd1ce;
        }
    </style>
@endsection

@section('content')
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --> 



    <div class="container">
      <div style="height:50px"></div>
      <p class="lead">
      <h3>Calendario</h3>


      <div class="row header-calendar"  >

        <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
          <a  href="{{ url('rrhh/Calendar/event/') }}/<?= $data['last']; ?>" style="margin:10px;">
            <i class="fas fa-home" style="font-size:30px;color:white;"></i>
          </a>
          <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
          <a  href="{{ url('rrhh/Calendar/event/') }}/<?= $data['next']; ?>" style="margin:10px;">
            <i class="fa fa-search" style="font-size:20px;color:white;"></i>
          </a>
        </div>

      </div>   
      <div class="row">
        <div class="col-md-12">
            <table class="table__kirito table-bordered">
                <thead >
                <tr>
                    <th>lunes</th>
                    <th>martes</th>
                    <th>miercoles</th>
                    <th>jueves</th>
                    <th>viernes</th>
                    <th>sabado</th>
                    <th>domingo</th>

                </tr>
                </thead>
                <tbody>
                     <!-- inicio de semana -->
                @foreach ($data['calendar'] as $weekdata)
                    <tr class="col">
                        <!-- ciclo de dia por semana -->
                        @foreach  ($weekdata['datos'] as $dayweek)

                            @if  ($dayweek['mes']==$mes)
                                <td class="col box-day">
                                {{ $dayweek['dia'] }}
                                </td>
                            @else
                                <td class="col box-dayoff">
                                </td>            
                            @endif

                        @endforeach
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div> 

    </div> <!-- /container -->
@endsection

