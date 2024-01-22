$(document).ready(function(){
	  validator.message['date'] = 'no es una cita real';
    $('form')
      .on('blur', 'input[required], input.optional, select.required', validator.checkField)
      .on('change', 'select.required', validator.checkField)
      .on('keypress', 'input[required][pattern]', validator.keypress);

    $('form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      if (!validator.checkAll($(this))) {
        submit = false;
      }
      if (submit){
      	$("#oficina_descripcion_usuario").val($("#unidad_id option:selected").html());
        this.submit();
      }
      return false;
    });

	$("#codigo_usuario").prop('readOnly',true);
	$('#viewcheketusuariocreatedisableda').on('click',function(){
    if ($(this).prop('checked'))
      $("#codigo_usuario").prop('readOnly',false);
    else
      $("#codigo_usuario").prop('readOnly',true);
  });
  $(document).on('keydown','#cargo_usuario',function(e){
    if(!(e.key).match(/^[A-Za-z0-9\,\_\"\+\:\-\(\)\;\|\.\%\º\ñ\Ñ\ ]+$/)){
      e.preventDefault();
    }
  });
	$('#unidad_id').change(function() {
    $.get("/gtcodingusuarioencargadforunichc/"+($(this).val())+"",function(response){
      if(response.success){
        $("#codigo_usuario").val(response.codiciti);
        $("#oficina_id").empty();
        $("#oficina_id").append("<option value='0'> </option>");
        $(response.codigrutr).each(function(key, value){
          $("#oficina_id").append("<option value='"+value.id+"'> "+value.codigo_unidad+" - "+value.nombre_unidad+"</option>");
        });
      }else{
        $("#codigo_usuario").val(null);
        $("#oficina_id").empty();
        $("#oficina_id").append("<option value='0'> </option>");
      }
    });
    return false;
  });
  $(document).on('keydown','#nombre_usuario',function(e){
    if(!(/^[A-Za-z\ñ\Ñ\ ]+$/.test(e.key))){
      e.preventDefault();
    }
  });
  $(document).on('keydown','#apellido_usuario_paterno',function(e){
    if(!(/^[A-Za-z\ñ\Ñ\ ]+$/.test(e.key))){
      e.preventDefault();
    }
  });
  $(document).on('keydown','#apellido_usuario_materno',function(e){
    if(!(/^[A-Za-z\ñ\Ñ\ ]+$/.test(e.key))){
      e.preventDefault();
    }
  });
});