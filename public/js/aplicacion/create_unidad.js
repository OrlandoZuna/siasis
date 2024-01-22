$(document).ready(function(){
	validator.message['date'] = 'no es una cita real';
    $('form')
      .on('blur', 'input[required], input.optional, select.required', validator.checkField)
      .on('change', 'select.required', validator.checkField)
      .on('keypress', 'input[required][pattern]', validator.keypress);

    $('form').submit(function(e) {
      e.preventDefault();
      var submit = true;
      if(!validator.checkAll($(this)))
      	submit = false;
      if (submit){
      	$("#codigo_superior").val($("#institucion_id option:selected").html());
        this.submit();
      }
      return false;
    });
	$("#codigo_unidad").prop('readOnly',true);
	$('#viewcoderunidadmiclikeche').on('click',function(){
		if($(this).prop('checked'))
	    	$("#codigo_unidad").prop('readOnly',false);
	  	else
	    	$("#codigo_unidad").prop('readOnly',true);
  	});
	$('#institucion_id').change(function(){
    	$.get("/pedircodigodeacuerdoaintiucionunidadcoding/"+($(this).val())+"",function(response){
     		$("#codigo_unidad").val(response);
	  	});
  	});
	$(document).on('keydown','#nombre_unidad',function(e){
		if(!(e.key).match(/^[A-Za-z0-9\,\_\"\+\:\-\(\)\.\ñ\Ñ\ ]+$/)){
			e.preventDefault();
		}
	});
  	$(document).on('keydown','#sigla_unidad',function(e){
		if (e.which == 13) {
			var valr = $("#nombre_unidad").val();
			var conca="";
			if(valr!=null){
				var arreglodescrip = valr.split(" ");
				arreglodescrip.forEach(function(element) {
				    conca=conca+""+((""+element).substring(0,1));
				});
				$("#sigla_unidad").val(conca);
			}
			return false;
		}else{
			if(!(e.key).match(/^[A-Za-z0-9\,\_\"\+\:\-\(\)\.\ñ\Ñ\ ]+$/))
				e.preventDefault();
		}
	});
});