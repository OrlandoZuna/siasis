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
    </style>
@endsection

@section('title', $title)

@section('before-style')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @permission('crear.horario')
            <a class="btn btn-app btn-mycolor" data-toggle="modal" data-target=".create-modal-sm">
                <span class="badge bg-red">{{count($designaciongrupo)}} registros</span>
                <i class="fa fa-plus"></i>
                Nuevo
            </a>
            @endpermission
        </div>
    </div>
    <div class="row col-md-12 col-sm-12 col-xs-12" id="Con_AllD" style="padding:15px;background:#2f5e80cc;border-radius:10px;">
        <div style="padding: 10px; background:#fcfcfc; border-radius:10px; border: 1px solid black;">
            <div class="text-center">
                <h2 style="text-transform:uppercase;font-family:monospace;font-weight:bold;font-size:24px;text-decoration:underline">{{$title}}</h2>
            </div>
            <br>
            <div id="renderdesignacion">
                <table class="table__kirito table-bordered">
                    <thead >
                    <tr>
                        <th>Nombre_GrupoTrabajo</th>
                        {{-- <th hidden="true">Id persona</th> --}}
                        <th>Nombre persona</th>
                        {{-- <th hidden="true">Id GrupoTrabajo</th> --}}
                        <th>Ci Persona</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody id="body">
                    @foreach($designaciongrupo as $trabajo)
                        <tr class="mytr" id="usuarios_{{$trabajo->id}}">
                            <td class="mytd">{{$trabajo->nonbre_grupotrabajo}}</td>
                            {{-- <td class="mytd" hidden="true">{{$trabajo->personal_id}}</td> --}}
                            <td class="mytd">{{$trabajo->nombre_persona}}</td>
                            {{-- <td class="mytd" hidden="true">{{$trabajo->grupo_trabajo_id}}</td> --}}
                            <td class="mytd">{{$trabajo->ci}}</td>
                            <td>
                                <center>
                                @permission('editar.horario')
                                <a href="#" title="eliminar" onclick="alerta('{{$trabajo->id}}',this)"><i class="fa fa-trash"></i></a>

                                <a href="#" id="{{$trabajo->id}}"  title="editar {{$trabajo->id}}" onclick="ver(this.id)" data-toggle="modal" data-target="#edit-modal"><i class="fa fa-edit"></i></a>
                                @endpermission
                                @permission('eliminar.horario')
                                <a href="#" title="eliminar" onclick="alerta('{{$trabajo->id}}',this)"><i class="fa fa-trash"></i></a>
                                @endpermission
                                </center>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                <div class="col-lg-12 text-center">
                    {{ $designaciongrupo->links() }}
                </div>
                </div>
            </div>
        </div>
        @include('rrhh::scarrhh.designaciongrupo.modals.modal-edit')
        @include('rrhh::scarrhh.designaciongrupo.modals.modal-create')
    </div>


@endsection

@section('after-script')
@parent
    {!! Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}
    {!! Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js') !!}
    <script>
        function alerta(id,row) {
            var bool=confirm("esta seguro de eliminar este horario? "+id);
            if(bool){
                $.ajax({
                    url:"{{url("rrhh/deletedesignaciongrupo")}}",
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

        $(function () {
            $(".my-color").change(function(){
                $(this).css("background",$(this).val());
            });
            $(".time").timepicker({
                showInputs: false
            });
        });
        function ver(id){
            console.log(id);
            $.ajax({
                url:"{{url("rrhh/getdesignaciongrupo")}}",
                type:"get",
                data:{"id":id},
                success:function(datos){
                    document.getElementById('nonbre_grupotrabajo_edit').value=datos[0]["nonbre_grupotrabajo"];
                    document.getElementById('id_edit').value=datos[0]["id"];
                    document.getElementById('id_persona_edit').value=datos[0]["personal_id"];
                    document.getElementById('id_grupotrabajo_edit').value=datos[0]["grupo_trabajo_id"];
                    document.getElementById('ci_edit').value=datos[0]["ci"];
                }
            });
            $("#modelo").attr("data-toggle","modal");
            $("#modelo").attr("data-target",".edit-modal-sm");
        }
    </script>
    <script type="text/javascript">
        $(document).on('click','.designarGrupoGuardar',function(e){
            //e.preventDefault();
            var id_grupotrabajo = $('#id_grupotrabajo').val();
            var ci = $('#ci').val();
            console.log(ci);
            $.ajax({
                url:"{{url("rrhh/createdesignaciongrupo")}}",
                type:"get",
                data:{id_grupotrabajo, ci},
                success:function(datos){
                    if(datos.resp==200){
                        console.log(datos.person);
                        usuario = datos.person
                        $('#body').prepend(`
                            <tr id="usuarios_${usuario.id}">
                                <td>${usuario.nonbre_grupotrabajo}</td>
                                <td>${usuario.nombre_persona}</td>
                                <td>${usuario.ci}</td>
                                <td>
                                    <center>
                                    @permission('editar.horario')
                                    <a href="#" title="eliminar" onclick="alerta('${usuario.id}',this)"><i class="fa fa-trash"></i></a>

                                    <a href="#" id="${usuario.id}"  title="editar ${usuario.id}" onclick="ver(this.id)" data-toggle="modal" data-target="#edit-modal"><i class="fa fa-edit"></i></a>
                                    @endpermission
                                    </center>
                                </td>
                            </tr>
                        `);

                        toastr.success("guardado correcto de la desgnacion de grupo");

                    }
                    else if(datos.resp==250){
                        toastr.warning("no se guardo datos ya esta desiganado aun grupo la persona");
                    }
                    else {
                        toastr.error("no existe perosna en la base de datos");
                    }
                }
            });
            $(".create-modal-sm").modal("hide");
            $('#id_grupotrabajo').val(0);
            $('#ci').val('');
        });

        $(document).on('click','#saveDG',function(e){
            //e.preventDefault();
            var id_grupotrabajo = $('#id_grupotrabajo_edit').val();
            var id_dg = $('#id_edit').val();
            console.log(id_dg, id_grupotrabajo);
            $.ajax({
                url:"{{url("rrhh/updatedesignaciongrupo")}}",
                type:"get",
                data:{id_grupotrabajo, id_dg},
                success:function(datos){
                    if(datos.resp==200){
                        console.log(datos.person);
                        usuario = datos.person
                        $("#usuarios_"+usuario.id+" td:nth-child(1)").html(usuario.nonbre_grupotrabajo);
                        $("#usuarios_"+usuario.id+" td:nth-child(2)").html(usuario.nombre_persona);
                        $("#usuarios_"+usuario.id+" td:nth-child(3)").html(usuario.ci);


                        toastr.success("actualizado correcto de la desgnacion de grupo");

                    }
                    else if(datos.resp==250){
                        toastr.warning("no se guardo datos ya esta desiganado aun grupo la persona");
                    }
                    else {
                        toastr.error("no existe perosna en la base de datos");
                    }
                }
            });
            $("#edit-modal").modal("hide");
        });
    </script>
    <script type="text/javascript">

    $(document).on("click", ".pagination a", function(e) {
        e.preventDefault();
        // var _thisVar = $input.val();
        // console.log($('#id_b')[0].innerText);
        var urlPag_Now = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1]
        $.ajax({
            type:'GET',
            url: urlPag_Now,
            data:{},
            success: function(xhr_JsX) {

                $('#renderdesignacion').html(xhr_JsX.list_desiganciones);
            }
        });
    });
</script>

@endsection


