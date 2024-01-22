var bolean1=true;
$("#abre-hidden").click(function(){
	if(bolean1){
	
		$("#form-hidden-create").css("right","0");
		bolean1=false;
	}else{
	
		$("#form-hidden-create").css("right","-380px");	
		bolean1=true;
	}
});
$("#cerrar_hidden").click(function(){

    $("#form-hidden-create").css("right","-380px");
    bolean1=true;
});