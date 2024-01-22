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
      this.submit();
    }
    return false;
  });
  $(document).on('keydown','#sigla_financiador',function(e){
		if (e.which == 13) {
			var valr = $("#nombre_financiador").val();
			var conca="";
			if(valr!=null){
				var arreglodescrip = valr.split(" ");
				arreglodescrip.forEach(function(element) {
				    conca=conca+""+((""+element).substring(0,1));
				});
				$("#sigla_financiador").val(conca);
			}else
				$("#sigla_financiador").val(null);
			return false;
		}
	});
});
$(document).on('keydown','#descripcion',function(e){
  if(!(e.key).match(/^[A-Za-z0-9\,\_\"\+\:\-\(\)\;\|\.\%\º\ñ\Ñ\ ]+$/)){
    e.preventDefault();
  }
});