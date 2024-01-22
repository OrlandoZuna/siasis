<table class="table__kirito table-bordered">
    <thead >
    <tr>
        <th>Nombre</th>
        <th>Hora de Entrada</th>
        <th>Hora de Salida</th>
        <th>Tolerancia Entrada</th>
        <th>Tolerancia Salida</th>
        <th>Inicio de Entrada</th>
        <th>Fin de Entrada</th>
        <th>Inicio de Salida</th>
        <th>Fin de Salida</th>
        <th>Dia Trabajo</th>
        <th>Color</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($hours as $hour)
        <tr class="mytr">
            <td class="mytd">{{$hour->name}}</td>
            <td class="mytd" style="text-align: center;">{{$hour->start_time}}</td>
            <td class="mytd" style="text-align: center;">{{$hour->end_time}}</td>
            <td class="mytd" style="text-align: center;">{{$hour->late_minutes}}min</td>
            <td class="mytd" style="text-align: center;">{{$hour->early_minutes}}min</td>
            <td class="mytd" style="text-align: center;">{{$hour->start_input}}</td>
            <td class="mytd" style="text-align: center;">{{$hour->end_input}}</td>
            <td class="mytd" style="text-align: center;">{{$hour->start_output}}</td>
            <td class="mytd" style="text-align: center;">{{$hour->end_output}}</td>
            <td class="mytd" style="text-align: center;">{{$hour->work_day}}</td>
            <td bgcolor="{{$hour->color}}">
                {{$hour->color}}
            </td>
            <td>
                <center>
                @permission('editar.horario')
                <!--<a href="#" title="eliminar" onclick="alerta('{{$hour->id}}',this)"><i class="fa fa-trash"></i></a>-->
                <a href="#" title="eliminar" onclick="alerta('{{$hour->id}}',this)"><i class="fa fa-trash"></i></a>
                <a href="#" id="{{$hour->id}}"  title="editar {{$hour->id}}" onclick="ver(this.id)" data-toggle="modal" data-target=".edit-modal-sm"><i class="fa fa-edit"></i></a>
                @endpermission
                @permission('eliminar.horario')
                <a href="#" title="eliminar" onclick="alerta('{{$hour->id}}',this)"><i class="fa fa-trash"></i></a>
                @endpermission
                </center>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="row">  
<div class="col-lg-12 text-center">
    {{ $hours->links() }}
</div>
</div>