<table class="table__kirito table-bordered">
    <thead >
    <tr>
        <th>Nombre_GrupoTrabajo</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($grupotrabajo as $trabajo)
        <tr class="mytr">
            <td class="mytd">{{$trabajo->nombre_trabajo}}</td>
            <td>
                <center>
                @permission('editar.horario')
                <a href="#" title="eliminar" onclick="alerta('{{$trabajo->id}}',this)"><i class="fa fa-trash"></i></a>
                <a href="#" id="{{$trabajo->id}}"  title="editar {{$trabajo->id}}" onclick="ver(this.id)" data-toggle="modal" data-target=".edit-modal-sm"><i class="fa fa-edit"></i></a>
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
    {{ $grupotrabajo->links() }}
</div>
</div>