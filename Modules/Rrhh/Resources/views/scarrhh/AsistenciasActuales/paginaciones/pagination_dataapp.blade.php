<table class="table__kiri table-bordered" style="width:99%">
  <thead>
  <tr >
    <th>Id_ho</th>
    <th>Id_per</th>
    <th>Ci_a</th>
    <th>Turno_a</th>
    <th>Tipo_a</th>
    <th>Estado_a</th>
    <th>Fecha</th>
    <th>Hora</th>
  </tr>
  </thead>
  <tbody>
    @foreach($data1 as $asis):
      <tr class="">
        <td> {{ $asis->id_horario }}</td>
        <td> {{ $asis->id_persona }}</td>
        <td> {{ $asis->ci_a }}</td>
        <td> {{ $asis->turno_a }}</td>
        <td> {{ $asis->tipo_a }}</td>
        <td> {{ $asis->estado_a }}</td>
        <td> {{ $asis->fecha }}</td>
        <td> {{ $asis->hora }}</td>
      </tr>
      @endforeach
  </tbody>
</table>
<div class="row">  
  <div class="col-lg-12 text-center">
    {!! $data1->links() !!}
  </div>
</div>