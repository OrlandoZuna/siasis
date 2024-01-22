$(document).ready(function(){

	$('#doc_excel').bind('change', function() {
	  	var f = this.files[0];
	  	var val = $(this).val().toLowerCase();
		var regex = new RegExp("(.*?)\.(xls|XLS|xlsx|XLSX)$");
		if(!(regex.test(val))){
			$(this).filestyle('clear');
			var message = $('<div class="alert alert-error error-message" style="display: none;">');
		    var close = $('<button type="button" class="close" data-dismiss="alert">&times</button>');
		    var response = $('<strong> El Archivo no es valido por favor suba otro(formato excel)!!</strong>');
		    message.append(close);
		    message.append(response);
		    message.appendTo($('#notificacion_resul_fcdu')).fadeIn(300).delay(2000).fadeOut(500);
		}else{
	        if (f.size > 4388608 || f.fileSize > 4388608){
	        	$(this).filestyle('clear');
	        	var message = $('<div class="alert alert-error error-message" style="display: none;">');
			    var close = $('<button type="button" class="close" data-dismiss="alert">&times</button>');
			    var response = $('<strong> Archivo exede el peso maximo. (Max. 4 MB)!</strong>');
			    message.append(close);
			    message.append(response);
			    message.appendTo($('#notificacion_resul_fcdu')).fadeIn(300).delay(2000).fadeOut(500);
	        }
	     }

	});

	$("#cargar_exceldatoscoti").keypress(function(e) {
        if (e.which == 13)
            return false;
    });

	$("#cargar_exceldatoscoti").submit(function(e){
		e.preventDefault();
		subir_excel();
		return false;
	});			
});

function subir_excel(){
	var dato = new FormData($("#cargar_exceldatoscoti")[0]);
	var route = $('#cargar_exceldatoscoti');
	var url = route.attr('action');
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
	    beforeSend: function(){
	    	$("#notificacion_resul_fcdu").html($("#cargador_mensagee").html()); 
	    },
	    success: function(response){
	      	if(response.success){
	      		$("#notificacion_resul_fcdu").html('<strong class="alert alert-success alert-dismissible fade in">cotizaciones guardadas satisfactoriamente!!!</strong>');
		      	//$('#cargar_exceldatoscoti').trigger("reset");
		      	setTimeout(function(){document.location.href = 'cotizacion';}, 1500);
	      	}
	      	else{
	      		$("#notificacion_resul_fcdu").html('<strong class="alert alert-error alert-dismissible fade in">Error al cargar cotizaciones!!!</strong>').fadeIn(200).delay(2000).fadeOut(800);
	      	}
	    },
	    error: function(){
	    	$("#notificacion_resul_fcdu").html('<strong class="alert alert-error alert-dismissible fade in">Error al cargar cotizaciones!!</strong>').fadeIn(200).delay(2000).fadeOut(800);
	    }
    });
}