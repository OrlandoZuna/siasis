    {{Form::open(["route"=>["rrhh.pdfimag"],"id"=>"form_a","method"=>"post","role"=>"form","enctype"=>"multipart/form-data"])}}
    <input name="img" class="btn" type="file"  id="file"/>


    <button type="submit" class="btn" style="background-color: #2BC275; color: #fff"> guardar</button>
    {!! Form::close() !!}