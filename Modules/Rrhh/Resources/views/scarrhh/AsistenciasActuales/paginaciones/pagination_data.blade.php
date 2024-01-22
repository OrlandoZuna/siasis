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