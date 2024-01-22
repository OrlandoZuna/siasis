<table class="table__kirito table-bordered"  id="table" name="table">
        <thead>
        <tr>
        <th>Id_Bio</th>
        <th>Id_Us</th>
        <th>Nro_Re</th>
        <th>Estado</th>
        <th>Fecha_hora</th>
        <th>Tipo</th>
        </tr>
        </thead>
        <tbody id="tbody">
        @foreach($asistencias as $asistencia)
            <tr>
            <td> {{ $asistencia->id_biometrico }}</td>
            <td> {{ $asistencia->id_user_b }}</td>
            <td> {{ $asistencia->Nregistro }}</td>
            <td> {{ $asistencia->state }}</td>
            <td> {{ $asistencia->timestamp }}</td>
            <td> {{ $asistencia->type }}</td>
            </tr>
        @endforeach
        </tbody>
</table>
<div class="row">  
<div class="col-lg-12 text-center">
    {{ $asistencias->links() }}
</div>
</div>