<!DOCTYPE html>
<html lang="en" style="background-color: #f5f5f5;">
    <head>
        <title>pdf</title>
        <meta charset="UTF-8">
        <meta name="http-equiv="X-UA-Compatible" content="IE-chrome">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- {!! Html::script('assets/js/bootstrap/dist/js/bootstrap.min.js') !!}
        {!! Html::script('assets/js/bootstrap/dist/css/bootstrap.min.css') !!} -->
        <!-- {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
        {!! Html::style('assets/plugins/colorpicker/bootstrap-colorpicker.min.css') !!}
        {!! Html::style('assets/plugins/timepicker/bootstrap-timepicker.min.css') !!} -->

        <link href="{{ public_path('assets/js/bootstrap/dist/js/bootstrap.min.js') }}" rel="stylesheet" type="text/javscript">
        <link href="{{ public_path('assets/js/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <style type="text/css">
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
            body {
                background-color: #f5f5f5 !important;
            }
            #encabezado {
                display: flex;
                align-items:center;
                height: 85px;
            }
            #imgpersonal{
                margin-top: 5px;
                float: right;  
                width: 75px;
            }
            #imguatf{
                margin-top: 5px;
                float: left;
                width:70PX;
            }
            #textoencabezado{
                margin-top: 20px;
                text-align:center;
            }
            /* p{
                text-align: center;
                margin-bottom: 0px;
            } */
            #uno{
                font-size: 10px;
                font-weight: bold;
                margin-bottom: 0px;
            }
            #dos{
                font-size: 10px;
                margin-bottom: 0px;
            }
            #tres{
                font-size: 12px;
                font-weight: bold;
                margin-top: 5px;
                text-border: center;
            }
            #cuerpo1{
                display: block;
                margin-top: 10px;
                align-items:center;
                height: 30px;
            }
            #cuerpo1 p{
                border: 1px solid #525659;
                border-radius: 7px;
                color: black;
                font-size: 10px;
                text-transform: uppercase;
            }
            #cuerpo2{
                border: 1px solid #525659;
                border-radius: 7px;
                align-items:center;
                height:15px;
                margin-bottom: 3px;
            }
            #cuerpo2 p{
                padding: 0 10 0 10;
                color: black;
                
            }
            #cuerpo3{
                align-items:center;
                height: 80px;
                margin-bottom: 0px;
            }
            #cuerpo3 p{
                margin-top: -5px;
                font-size: 10px;
                text-align: center;
                border: 1px solid #525659;
                border-radius: 7px;
                color: black;
                padding: 2px 10px 2px 10px;
                text-transform: uppercase; 
            }
            b{
                color: black;
            }
            #cuerpofirmas{
                margin-top: -8px;
                position:relative;
                align-items:center;
                height: 70px;
                margin-bottom: 2px;
            }
            section{
                height: 60px;
            }
            #cuerpofirmas section nav{

                text-align: center;
                border: 1px solid #525659;
                color: black;
                padding: 2px 5px 2px 5px;
                height: 40px;
            }
            #cuerpofirmas section p{
                margin-top:0px;
                text-align: center;
                color: black;
                padding: 2px 0px 2px 0px;
                font-size: 12px;
                font-weight: bold;
                font-size: 10px;
            }
            #cuerpoportero{
                position:relative;
                align-items:center;
                height: 40px;
                margin-bottom: 10px;
                margin-top: -8px;
            }
            section{
                height: 30px;
            }
            #cuerpoportero section nav{

                text-align: center;
                border: 1px solid #525659;
                color: black;
                padding: 5px 10px 5px 10px;
                height: 15px;
            }
            #cuerpoportero section p{
                margin-top:0px;
                text-align: center;
                color: black;
                font-size: 10px;
                padding: 2px 0px 2px 0px;
                font-weight: bold;
            }
        </style>

    </head>
    <body style="background-image: url(assets/images/uatfblanco.png); background-size: 100PX;">
        <div class="container">
            <div class="col-12" id="encabezado">
                <img src="assets/images/logo.png" alt="uatf" id="imguatf">
                <div id="textoencabezado">
                    <p id="uno">UNIVERSIDAD AUTONOMA "TOMAS FRIAS"</p>
                    <p id="dos">DIRECCION ADMINISTRATIVA Y FINANCIERA</p>
                    <p id="dos">DEPARTAMENTO DE PERSONAL</p>
                    <p id="tres"><u>PERMISO DE SALIDA</u> </p>
                </div>

                <img id="imgpersonal" src="assets/images/LOGO CIRCULAR COLOR.png" alt="personal"> 
            </div> 
            <div id="cuerpo1">
                <p style="float:left; padding: 2px 10px 2px 10px;">NOMBRE DEL(A) FUNCIONARIO (A): {{$persona->nombres}} {{$persona->apellido_paterno}} {{$persona->apellido_materno}}</p>
                <p style="float: right; padding: 2px 10px 2px 10px;"> CON C.I.: {{$persona->ci}}</p>
            </div>
            <div id="cuerpo2">
                <p style="font-size:10px;">UNIDAD:</p>
            </div>
            <p style="text-align: center; font-size: 10px; font-weight: bold;">ESTA AUTORIZADO PARA AUSENTARSE DE SU TRABAJO POR EL TIEMPO</p>
            <div id="cuerpo3">
                <p>ESTA AUTORIZADO PARA SALIR POR MOTIVO DE : <b>{{$ultimoevento->descripcion}}</b></p>
                <p> DESDE HORAS: <b>{{$ultimoevento->inicio_time}}</b>  HASTA HORAS: <b>{{$ultimoevento->fin_evento}}</b> PREVISTAMENTE...</p>
                <p>EN FECHA: POTOSI <b>{{$dia}}</b> DEL MES <b>{{$mes}}</b> DEL AÑO <b>{{$year}}</b></p>
            </div>
            <p style="font-size:10px; font-weight: bold; padding-left: 10px;">FIRMAN INTERESADOS(A) :</p>
            <div id="cuerpofirmas">
                <section style="padding-left: 10px; float:left; width: 207px;">
                    <nav>
        
                    </nav>
                    <p>FUNCIONARIO SOLICITANTE</p>
                </section>
                <section style=" padding-left: 20px;float:left; width: 207px;">
                    <nav>
                        
                    </nav>
                    <p>JEFE INMEDIATO SUPERIOR</p>
                </section>
                <section style=" padding-left: 20px; float:left; width: 207px;">
                    <nav>
                        
                    </nav>
                    <p>DEPARTAMENTO DE PERSONAL</p>
                </section>
            </div>
            <p style="font-size: 10px; font-weight: bold; padding-left: 10px;">REGISTRO DE HORA POR PORTERO(A) :</p>
            <div id="cuerpoportero">
                <section style="padding-left: 10px; float:left; width: 207px;">
                    <nav>
        
                    </nav>
                    <p>HORA SALIDA</p>
                </section>
                <section style=" padding-left: 20px;float:left; width: 207px;">
                    <nav>
                        
                    </nav>
                    <p>HORA DE RETORNO</p>
                </section>
                <section style=" padding-left: 20px; float:left; width: 207px;">
                    <nav>
                        
                    </nav>
                    <p>TIEMPO REAL SALIDA</p>
                </section>
            </div>
        </div>
    </body>


</html>