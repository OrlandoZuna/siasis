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
      $("#descripcion_fuentefinanciamiento").val($("#fuente_financiamiento_id option:selected").html());
      this.submit();
    }
    return false;
  });
  $(document).on('keydown','#sigla_organismo_financiador',function(e){
		if (e.which == 13) {
			var valr = $("#descripcion_organismo_financiador").val();
			var conca="";
			if(valr!=null){
				var arreglodescrip = valr.split(" ");
				arreglodescrip.forEach(function(element) {
				    conca=conca+""+((""+element).substring(0,1));
				});
				$("#sigla_organismo_financiador").val(conca);
			}
			return false;
		}else{
      if(!(e.key).match(/^[A-Za-z0-9\,\_\"\+\:\-\(\)\;\|\.\%\º\ñ\Ñ\ ]+$/)){
        e.preventDefault();
      }
    }
	});
});
$(document).on('keydown','#descripcion_organismo_financiador',function(e){
  if(!(e.key).match(/^[A-Za-z0-9\,\_\"\+\:\-\(\)\;\|\.\%\º\ñ\Ñ\ ]+$/)){
    e.preventDefault();
  }
});