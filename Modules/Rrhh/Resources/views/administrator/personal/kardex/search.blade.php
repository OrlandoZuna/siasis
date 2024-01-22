<thead >
  <tr>
    <td width="1%" style="border-left:1px solid white;">Estado</td>
    <td width="20%" style="border-left:1px solid white;">Nombre Completo</td>
    <td width="10%" style="border-left:1px solid white;">C.I</td>
    <td width="6%" style="border-left:1px solid white;">Grupo_Asiganda</td>
    <td width="3%" style="border-left:1px solid white;">T_C</td>
    <td width="13%" style="border-left:1px solid white;">Email</td>
    <td width="12%" style="border-left:1px solid white;">Opciones</td>
  </tr>
</thead>
<tbody>
  @foreach($personals as $empl)
    <tr class="yestd">
      <td width="3%">          
        <div class="btn-group" style=" margin-left: 0%;" role="group" aria-label="Basic example">
            <a class="btn btn-warning nobaja" id= "{{ $empl->id }}" style="margin-top: 2px; color: #fff; border-radius: 20px; background: ; width:5px;" 
            title="HABILITAR A USUARIO PARA REGISTRO DE ASISTENCIA" disabled="true" onclick="nobaja(this.id)"><i class="fa fa-circle-o" style="margin-left: -5px;"></i></a>
            <a class="btn btn-danger baja" id= "{{ $empl->id }}" style="margin-top: 1px; border-radius: 20px; background: ; width:5px; text-aling: center;" 
            title="DAR DE BAJA USUARIO PARA LOS REGISTROS DE ASISTENCIA" onclick="baja(this.id)"><i class="fa fa-circle" style="margin-left: -5px;"></i></a>
        </div>
      </td>
      <td width="20%">{{$empl->nombres}}  {{$empl->apellido_paterno}}  {{$empl->apellido_materno}}</td>
      <td width="10%">{{$empl->ci}} {{$empl->ext}}</td>
      @if(Count($grupopersona)>0)
      <?php
        $nombregrupo= 'No asisnado';
        $id_grupo= '';
        foreach ($grupopersona as $key => $grupo) {
          if ($grupo->personal_id == $empl->id) {
            $nombregrupo = $grupo->nonbre_grupotrabajo;
            $id_grupo = $grupo->grupo_trabajo_id;
          }
        }
      ?>
      <td width="6%">
          {{$nombregrupo}}
      </td>
      @else
      <td width="6%">$nombregrupo</td>
      @endif
      @if($empl->id_tipo_contrato!=null)
      <?php
        $tipoc="Sin T_C";
        $nombrec="ninguno";
        foreach ($tipocontrato as $key => $contrato) {
          if ($contrato->id == $empl->id_tipo_contrato) {
            $tipoc = $contrato->tipo;
            $nombrec= $contrato->nombre_tipo_contrato;
          }
        }
      ?>
      <td width="6%" title="{{$nombrec}}">
          {{ $tipoc }}
      </td>
      @else
      <td width="6%"> Sin T_C</td>
      @endif
      @if ($empl->correo_electronico == null)
      <td width="13%">No Registrado</td> 
      @else
      <td width="13%">{{$empl->correo_electronico}}</td>
      @endif
      <td width="12%">
        <center>
        <!-- <a href="{{url("rrhh/meses")}}" title="Meses"><i class="fa fa-edit"></i></a> -->
        <div class="dropdown show">
          <a class="btn btn-success btn-asistencias dropdown-toggle" href="#" title=" designar a un grupo al usuario :{{ $empl->nombres }}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-users" style="color:white;"></i></a>
          <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuLink">
            @foreach ($grupos as $grupo)
              <a class="dropdown-item text-center valores" data-id="{{ $grupo->id }}" id="{{ $empl->id }}" onclick="designargrupo(this.id, idg='{{ $grupo->id }}', url='{{url('rrhh/guardarengrupo')}}')">{{$grupo->nombre_trabajo}}</a> <br>
            @endforeach
          </div>
        </div>
        <a class='btn btn-enventos' id="{{ $empl->id }}" title=" ir a Eventos de salida del usuario :{{ $empl->nombres }}" onclick="ajaxRenderSection(url='{{url('rrhh/eventossalida')}}', this.id)">
        <i class="fa fa-tags" style="color:white;"></i></a>
        <a class='btn btn-success btn-asistenciaspersonales' id="{{ $empl->id }}" title=" ir a Asistencias del usuario :{{ $empl->nombres }}" onclick=" ajaxRenderSection3(this.id, url='{{url('rrhh/asistenciasPersonal')}}')"><i class="fa fa-file-text"></i></a>
        <a class='btn btn-primary' id="{{ $empl->id }}" title="ir a desigancio de: {{ $empl->nombres }}" onclick=" ajaxRenderSectionDesignacion(this.id, url='{{url('rrhh/asistenciasDesignacion')}}')"><i class="fa fa-calendar-check-o"></i></a>
        </center>
      </td>
    </tr>
  @endforeach
  <tr style="display:inline;">
    <td style="border:none;position:absolute;bottom:15px;right:0px;left:0px;">
    {{ $personals->links() }}
    </td>
  </tr>
</tbody>