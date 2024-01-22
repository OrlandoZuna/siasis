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
    .contpanel{
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
</style>
@endsection

@section('title', $title)

@section('before-style')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @permission('crear.horario')
            <a class="btn btn-app btn-mycolor" data-toggle="modal" data-target=".create-modal-sm">
                <span class="badge bg-red">{{count($tipocontrato)}} registros</span>
                <i class="fa fa-plus"></i>
                Nuevo
            </a>
            @endpermission
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding:15px;background:#2f5e80cc;border-radius:10px;">
        <div class = " contpanel">
            <div class="text-center">
                <h2 style="text-transform:uppercase;font-family:monospace;font-weight:bold;font-size:24px;text-decoration:underline">{{$title}}</h2>
            </div>
        
            <table class="table__kirito table-bordered">
                <thead >
                <tr>
                    <th>Nombre Tipo Contrato</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tipocontrato as $contrato)
                    <tr class="mytr">
                        <td class="mytd">{{$contrato->nombre_tipo_contrato}}</td>
                        <td class="mytd">{{$contrato->tipo}}</td>
                        <td>
                            <center>
                            @permission('editar.horario')
                            <a href="#" title="eliminar" onclick="alerta('{{$contrato->id}}',this)"><i class="fa fa-trash"></i></a>

                            <a href="#" id="{{$contrato->id}}"  title="editar {{$contrato->id}}" onclick="ver(this.id)" data-toggle="modal" data-target=".edit-modal-sm"><i class="fa fa-edit"></i></a>
                            @endpermission
                            @permission('eliminar.horario')
                            <a href="#" title="eliminar" onclick="alerta('{{$contrato->id}}',this)"><i class="fa fa-trash"></i></a>
                            @endpermission
                            </center>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

    @include('rrhh::scarrhh.tipocontrato.modals.modal-create')
    @include('rrhh::scarrhh.tipocontrato.modals.modal-edit')
@endsection

@section('after-script')
@parent
    {!! Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}
    {!! Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js') !!}
    <script>
        function alerta(id,row) {
            var bool=confirm("esta seguro de eliminar el tipo de contrato? "+id);
            if(bool){
                $.ajax({
                    url:"{{url("rrhh/deletetipocontrato")}}",
                    type:"get",
                    data:{"id":id},
                    success:function(datos){
                        if(datos.resp==200){
                            toastr.success("Eliminacion correcta");
                            $(row).parent('center').parent("td").parent("tr").remove();
                        }

                    }
                });
            }
        }
    </script>
    <script type="text/javascript">
        // $(function () {
        //     $(".my-color").change(function(){
        //         $(this).css("background",$(this).val());
        //     });
        //     $(".time").timepicker({
        //         showInputs: false
        //     });
        // });
        function ver(id){
            $.ajax({
                url:"{{url("rrhh/gettipocontrato")}}",
                type:"get",
                data:{"id":id},
                success:function(datos){
                    document.getElementById('nombre_tipo_contrato_edit').value=datos[0]["nombre_tipo_contrato"];
                    document.getElementById('id_edit').value=datos[0]["id"];
                    document.getElementById('tipo_edit').value=datos[0]["tipo"];
                }
            });
            $("#modelo").attr("data-toggle","modal");
            $("#modelo").attr("data-target",".edit-modal-sm");
        }

    </script>

@endsection
