<table>
  <thead>
    <tr>
        <th>id user b</th>
        <th>timestamp</th>
        <th>type</th>
        <th>state</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($ejemplos as $ejemplo )
      @php
        $state= 0;
        $type = 0;

        if ($ejemplo->state == "Huella")
          $state = 1;
        elseif ($ejemplo->state == 'Facial')
          $state = 2;
        elseif ($ejemplo->state == "Contraseña")
          $state = 3;
        elseif ($ejemplo->state == 'Card')
          $state = 4;
        else
          $state = 5;

        if ($ejemplo->type == "Entrada")
          $type = 0;
        elseif ($ejemplo->type == "Salida")
          $type = 1;
        else
          $type = 2;
      @endphp
      <tr>
        <td> {{ $ejemplo->id_user_b}} </td>
        <td> {{$ejemplo->timestamp}}</td>
        <td>{{$type}} </td>
        <td>{{$state}} </td>
      </tr>
  @endforeach
  </tbody>
</table>
