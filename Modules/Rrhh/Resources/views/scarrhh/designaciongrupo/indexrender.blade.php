    <table class="table__kirito table-bordered">
        <thead >
        <tr>
            <th>Nombre_GrupoTrabajo</th>
            {{-- <th hidden="true">Id persona</th> --}}
            <th>Nombre persona</th>
            {{-- <th hidden="true">Ide GrupoTrabajo</th> --}}
            <th>Ci Persona</th>
            <th>Opciones</th>
        </tr>
        </thead>
        <tbody id="body">
        @foreach($designaciongrupo as $trabajo)
            <tr class="mytr" id="usuarios_{{$trabajo->id}}">
                <td>{{$trabajo->nonbre_grupotrabajo}}</td>
                {{-- <td hidden="true">{{$trabajo->personal_id}}</td> --}}
                <td>{{$trabajo->nombre_persona}}</td>
                {{-- <td hidden="true">{{$trabajo->grupo_trabajo_id}}</td> --}}
                <td>{{$trabajo->ci}}</td>
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
