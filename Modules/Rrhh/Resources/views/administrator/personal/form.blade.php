
    <tr>
        <td>{!! Form::label('nombres','Nombres:')!!}</td>
        <td>{!! Form::text('nombres',null,["class"=>"form-control"])!!}</td>

        <td>{!! Form::label('apellidoP','Apellido paterno:') !!}</td>
        <td>{!! Form::text('apellidoP',null,["class"=>"form-control"]) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('apellidoM',' Apellido materno:') !!}</td>
        <td>{!! Form::text('apellidoM','',['class'=>'form-control','min'=>'0']) !!}</td>
        <td>{!! Form::label('ci','ingrese ci: ') !!}</td>
        <td>{!! Form::text('ci','',['class'=>'form-control','min'=>'0']) !!}</td>
    </tr>
    <tr>
        <td>{!! Form::label('extension','Extension de C.I:') !!}</td>
        <td>{!! Form::text('extension',null,['class'=>'form-control']) !!}</td>

        <td>{!! Form::label('profecion','Profesion de Persona:') !!}</td>
        <td>{!! Form::text('profecion',null,['class'=>'form-control']) !!}</td>
    </tr>
    <tr>
        <td>
            <label for="id_tipo_contrato" class="form-label">Tipos de Contrato</label>
            <select class="form-control" name="id_tipo_contrato" id="id_tipo_contrato">
                @foreach ($tipocontrato as $contrato );
                    <option value="0" selected disabled hidden>seleccione</option>
                    <option value="{{$contrato->id}}">{{$contrato->nombre_tipo_contrato}}</option>
                @endforeach   
            </select>
        </td> 
    </tr>
    
   
