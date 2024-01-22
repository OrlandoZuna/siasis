<table class="table__kirito table-bordered"  id="table" name="table">
    <thead>
        <tr>
        <th>Ip_dio</th>
        <th>Id_Us</th>
        <th>Nro_Re</th>
        <th>Estado</th>
        <th>Fecha_hora</th>
        <th>Tipo</th>
        </tr>
    </thead>
    <tbody id="tbody">
        {{$tipo}}
        @foreach($asistencias as $asistencia)
            @if($asistencia->type == $tipo)
            <tr>
                <td> {{ $asistencia->id_biometrico }}</td>
                <td> {{ $asistencia->id_user_b }}</td>
                <td> {{ $asistencia->Nregistro }}</td>
                <td> {{ $asistencia->state }}</td>
                <td> {{ $asistencia->timestamp }}</td>
                <td> {{ $asistencia->type }}</td>        
            </tr>
            @endif
        @endforeach
    </tbody>
</table>
<div class="row">  
<div class="col-lg-12 text-center">
    {{ $asistencias->links() }}
</div>
</div>