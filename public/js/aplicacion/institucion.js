$(document).ready(function(){
	var cardare = $("#visorisacionlogointitucion").val(); 
	$("#logo_institucion").fileinput({
	    overwriteInitial: true,
	    maxFileSize: 2500,
	    showClose: false,
	    showCaption: false,
	    browseLabel: '',
	    removeLabel: '',
	    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
	    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
	    removeTitle: 'Cancelar',
	    elErrorContainer: '#kv-avatar-errors',
	    msgErrorClass: 'alert alert-block alert-danger',
	    defaultPreviewContent: '<img src="logots/'+cardare+'" alt="Su logo" style="width:160px">',
	    layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
	    allowedFileExtensions: ["jpg", "png", "gif"]
	});
	$(document).on('keydown','#nombre_institucion',function(e){
		if(!(/^[A-Za-z0-9\ñ\Ñ\ ]+$/.test(e.key))){
			e.preventDefault();
		}
	});
	$(document).on('keydown','#sigla_institucion',function(e){
		if(!(e.key).match(/^[A-Za-z0-9\ñ\Ñ\ ]+$/)){
			e.preventDefault();
		}
	});
	$(document).on('keydown','#lugar_institucion',function(e){
		if(!(e.key).match(/^[A-Za-z0-9\,\_\"\+\:\-\(\)\;\|\.\%\º\ñ\Ñ\ ]+$/)){
			e.preventDefault();
		}
	});
	$(document).on('keydown','#direccion_institucion',function(e){
		if(!(e.key).match(/^[A-Za-z0-9\,\_\"\+\:\-\(\)\;\|\.\%\º\ñ\Ñ\ ]+$/)){
			e.preventDefault();
		}
	});
	$(document).on('keydown','#nombre_responsable',function(e){
		if(!(/^[A-Za-z\ñ\Ñ\ ]+$/.test(e.key))){
			e.preventDefault();
		}
	});
	$(document).on('keydown','#telefono_institucion',function(e){
		if ($.inArray(e.keyCode, [32, 46, 8, 9, 27, 13, 110, 189]) !== -1 ||
            (e.keyCode == 65 && e.ctrlKey === true) ||
            (e.keyCode == 67 && e.ctrlKey === true) ||
            (e.keyCode == 88 && e.ctrlKey === true) ||
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
	});
	$("#registinstitutiontemplate").keypress(function(e){
        if (e.which == 13)
            return false;
    });
	$("#registinstitutiontemplate").submit(function(e) {
		e.preventDefault();
		subirinstituciontion();
		return false;
	});
});
function subirinstituciontion(){
	var dato = new FormData($("#registinstitutiontemplate")[0]);
	var id = $("#idintitucioncar").val();
	var route = $('#registinstitutiontemplate');
	var url = route.attr('action').replace(':ID', id);
	var token = $("#token").val();
	$.ajax({
	  	headers: {'X-CSRF-TOKEN': token},
	    url:url,
	    data:dato,
	    dataType:'json',
	    type:'POST',
	    cache: false,
	    processData: false,
	    contentType: false,
	    success:function(response){
	      	if(response.success){
				showSuccess(response.msg);
				location.reload();
		    }else
	    		showErrorMessage("Error al guardar datos de intitucion!");
      	},
	  	error:function(data){
        	var errors = '';
        	for(datos in data.responseJSON){
            	errors += data.responseJSON[datos] + '<br>';
        	}
        	showErrorMessage(errors);
	  	}
    });
}