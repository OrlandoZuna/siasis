$(document).ready(function(){
	validator.message['date'] = 'no es una cita real';
  $('form')
    .on('blur', 'input[required], input.optional, select.required', validator.checkField)
    .on('change', 'select.required', validator.checkField)
    .on('keypress', 'input[required][pattern]', validator.keypress);

  $('form').submit(function(e) {
    e.preventDefault();
    var submit = true;
    if($("#unidad_id").val()==0){
      var message = $('<div class="alert alert-danger alert-dismissible" style="display: none;">');
      var close = $('<button type="button" class="close" data-dismiss="alert">&times</button>');
      var response = $('<strong>SELECCIONE UNIDAD O CENTRO!!</strong>');
      message.append(close);
      message.append(response);
      message.appendTo($('#cabeceracenrounidaderstrforfunconarregistr')).fadeIn(300).delay(2000).fadeOut(800);
      submit = false;
    }
    if (!validator.checkAll($(this))){
      submit = false;
    }
    if (submit){
    	$("#oficina_descripcion_usuario").val($("#unidad_id option:selected").html());
      this.submit();
    }
    return false;
  });
  $('#wizard').smartWizard({
    buttonOrder: ['prev','next'],
    labelNext:'Siguiente',
    labelPrevious:'Anterior'
  });
  $('.radio').click(function(){
    var $valor=$(this).val();
    $.ajax({
      url:'/getunidadseguntipo',
      type:'get',
      data:{val:$valor},
      success:function(data){
        $("#unidad_id").empty();
        $("#unidad_id").append("<option value>Seleccione Unidad/Centro</option>");
        $(data).each(function(key, value){
          $("#unidad_id").append("<option value='"+value.id+"'> "+value.codigo_unidad+" - "+value.nombre_unidad+"</option>");
        });
        $("#codigo_usuario").val(null);
      },
      error:function(){

      }
    });
  });
  $("#unidad_id").change(function(e){
    var dater = $(this).val();
    if(dater!=0){
      $.ajax({
        url:'/getunidadsegunid',
        type:'get',
        data:{id:dater},
        success:function(data){
          $("#oficina_id").empty();
          $("#oficina_id").append("<option value='0'>Seleccione Oficina/Area</option>");
          $(data.data).each(function(key, value){
            $("#oficina_id").append("<option value='"+value.id+"'> "+value.codigo_unidad+" - "+value.nombre_unidad+"</option>");
          });
          $("#codigo_usuario").val(data.codigo);
        },
        error:function(data){

        }
      });
    }else{
      $("#codigo_usuario").val(null);
      $("#oficina_id").empty();
      $("#oficina_id").append("<option value='0'>Seleccione Oficina/Area (no necesario)</option>");
    }
  });
  $(document).on('keydown','#cargo_usuario',function(e){
    if(!(e.key).match(/^[A-Za-z0-9\,\_\"\+\:\-\(\)\;\|\.\%\º\ñ\Ñ\ ]+$/)){
      e.preventDefault();
    }
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
	$("#codigo_usuario").prop('readOnly',true);
	$('#viewcheketusuariocreatedisableda').on('click',function(){
    if ($(this).prop('checked'))
      $("#codigo_usuario").prop('readOnly',false);
    else
      $("#codigo_usuario").prop('readOnly',true);
  });
});