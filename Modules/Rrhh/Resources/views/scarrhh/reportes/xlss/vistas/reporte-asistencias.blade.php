
<table>

    <thead>
        <tr>
            <td></td>
            <td></td>
            <td>U.A.T.F.</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Dep. Per.</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Res_Asis_de:</td>
            <td>{{$mes}}</td>
            <td>de: {{strval($año)}} </td>
            
        </tr>
        <tr>
            <td>Desde : </td>
            <td>{{ strval($fecha1) }}</td>
            <td>Tipo_Contrato:</td>
            <td> {{ $nombre_tc }}</td>
            <td>Hasta:</td>
            <td> {{ strval($fecha2) }}</td>
        </tr>
        <tr></tr>
    <tr>
        <th>N.</th>
        <th>NOMBRES</th>
        <th>CI</th>
        <th>ABAN.</th>
        <th>PERM.</th>
        <th>ATRA.</th>
        <th>FALT.</th>
        <th>D_TR.</th>
        <th>T_dI.</th>
        <th>B_TE</th>
        <th>TO_H.</th>
    </tr>
    </thead>
    @php
    $con = 0;
    $dia= "";
    $no = 1;
    $values = 0; 
    $atrasis = 0;
    $faltis = 0;
    $permis = 0;
    $abandos = 0;
    $bonotes = 0;
    @endphp
    @foreach ($per_tc as $tc)
        @php
        $value = 0; 
        $atrasi = 0;
        $falti = 0;
        $permi = 0;
        $abando = 0;
        $bonote = 0;
        $t_h = 0;
        @endphp

    <tbody>
        @foreach ($cadena as $fecha)
            @php
            $existe= 0;

            $dia = DATE::create($fecha)->format('w');
            foreach ($grupohorarioentradas as $asistencias){
                if ($asistencias->start == strval($fecha)){
                    $existe ++;
                } 
            }
            $con ++;

            foreach($grupohorario as $actual){
                if ($actual->id_persona == $tc->id && $actual->start == $fecha) {
                    if ($actual->estado_a == "en hora" || $actual->estado_a == "atrasado" || $actual->estado_a == "salida" || $actual->estado_a == 'abandono' || $actual->estado_a == 'permiso'){
                        $value = $value + $actual->valor_asistencia;
                        $values = $values + $actual->valor_asistencia;
                    }
                    if ($actual->estado_a == "atrasado"){
                        $atrasi = $atrasi + 1;
                        $atrasis = $atrasis + 1;
                    }
                    if ($actual->estado_a == "abandono"){
                        $abando = $abando + 1;
                        $abandos = $abandos + 1;
                    }
                    if ($actual->estado_a == "permiso"){
                        $permi = $permi + 1;
                        $permis = $permis + 1;
                    }
                    else{
                        if ($actual->estado_a == "falta"){
                            $falti = $falti + $actual->valor_asistencia;
                            $faltis = $faltis + $actual->valor_asistencia;;
                        }
                    } 
                } 
            }
            @endphp
            @if ((float)$existe > 0)  
                @php
                    $con ++;
                    $bonotes ++;
                    if ((int)$dia != 6 && (int)$dia != 0) {
                        $bonote ++;  
                    } 
                @endphp
                @foreach ($grupohorarioentradas as $asistencia)
                    @if ($asistencia->start == $fecha && $asistencia->id_persona == $tc->id)
                        @foreach ($grupohorariosalidas as $asis)
                            @if($asis->turno_a == $asistencia->turno_a && $asis->start == $fecha && $asis->id_persona == $tc->id)
                                <?php  
                                    $intervaloMm= DATE::CreateFromFormat('H:i:s', $asis->hora)->diffInMinutes(DATE::createFromFormat('H:i:s', $asistencia->hora));  
                                    $intervaloM=gmdate('H:i', $intervaloMm * 60);
                                    $t_h = $t_h + floatval($intervaloM);
                                ?> 
                            @endif
                        @endforeach                                           
                    @endif
                @endforeach
            @endif  
        @endforeach
        <tr>
            <td>{{$no++}}</td>
            <td>{{$tc->nombres.' '.$tc->apellido_paterno.' '.$tc->apellido_materno}}</td>
            <td>{{$tc->ci}}</td>
            <td>{{$abando}}</td>
            <td>{{$permi}}</td>
            <td>{{$atrasi}}</td>
            <td>{{$falti}}</td>
            <td> {{$value}} </td>
            <td> {{$falti + $value}} </td>
            @if ($value == 0 && $falti == 0)
                <?php
                    $bonote = 0;              
                ?>
            @endif
            <td> {{$bonote - $falti}} </td>
            <td> {{$t_h}} </td>
            @php

            @endphp
        </tr> 

    @endforeach
    <tr></tr>
    <tr>
        <td> TOTAL</td>
        <td>{{$nombre_tc}}</td>
        <td>{{$nombre_tc}}</td>
        <td>{{$abandos}}</td>
        <td>{{$permis}}</td>
        <td>{{$atrasis}}</td>
        <td>{{$faltis}}</td>
        <td> {{$values}} </td>
        <td> {{$faltis + $values}} </td>
        <td></td>
    </tr>
    </tbody>
</table>