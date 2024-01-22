<table class="table__kiri table-bordered" style="width:99%">
  <thead>
  <tr >
    <th>Title</th>
    <th>Reg_de</th>
    <th>Ci_a</th>
    <th>ID_H</th>
    <th>ID_P</th>
    <th>Descripcion</th>
    <th>Inicio</th>
    <th>Fin</th>
    <th>Hora</th>
    <th>Turno_a</th>
    <th>Tipo_a</th>
    <th>Estado_a</th>
    <!-- <th>Color</th> -->
    <th>Opc.</th>
  </tr>
  </thead>
  <tbody>
    @foreach($actualss as $asis)
      <tr class="">
        <td> {{ $asis->title }}</td>
        <td> {{ $asis->nombre }}</td>
        <td> {{ $asis->ci_a }}</td>
        <td> {{ $asis->id_horario }}</td>
        <td> {{ $asis->id_persona }}</td>
        <td> {{ $asis->descripcion }}</td>
        <td> {{ $asis->start }}</td>
        <td> {{ $asis->end }}</td>
        <td> {{ $asis->hora }}</td>
        <td> {{ $asis->turno_a }}</td>
        <td> {{ $asis->tipo_a }}</td>
        <td bgcolor="{{$asis->color}}" style="color: #fff;"> {{ $asis->estado_a }}</td>
        <!-- <td bgcolor="{{$asis->color}}">
                    {{$asis->color}}
        </td> -->
        <td>
            <center>
                @permission('editar.horario')
                <a href="#" id="{{$asis->id}}" class="btn btn-primary" title="editar {{$asis->id}}" onclick="ver(this.id)" data-toggle="modal" 
                data-target=".edit-modal-sm" style="text-align: center; padding: 1px; margin: 2px; margin-left: 30%; border-radius: 10px !!important; "><i class="fa fa-edit" ></i></a>
                @endpermission
            </center>
        </td> 
      </tr>
      @endforeach
  </tbody>
</table>
<div class="row">  
<div class="col-lg-12 text-center">
    {{ $actualss->links() }}
</div>
</div>