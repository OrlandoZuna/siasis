
function nu(este){
	var i=$(este).data("i");
	$("#nu"+i+" li#li"+i).css("display","none");
	$("#nu"+i).append($('<li><input data-t="proyecto" data-i="'+i+'" type="text"><button onclick="su(this)" class="btn btn-success btn-xs"><i class="fa fa-save"></i></button><button data-i="'+i+'" onclick="ca(this)" class="btn btn-danger btn-xs"><i class="fa fa-close"></i></button></li>'));
}
function ca(este){
	var i=$(este).data("i");
	$("#nu"+i+" li#li"+i).css("display","block");
	var ont=$(este).parent('li').remove();
}

function su(este){
	var ont=$(este).parent('li').children("input").val();
	var s=$(este).parent('li').children("input").data('i');
	var t=$(este).parent('li').children("input").data('t');
	var l=$(este).parent('li');
	$.ajax({
		url:URL_BASE+"/proyectos",
		type:'post',
		data:{	unidad_id:s,name:ont,_token:_TOKEN,tipo:t},
		success:function(data){
			if(data.status==200){
				var i=data.data.unidad_id;
				var ii=data.data.id;
				$("#nu"+i+" li#li"+i).css("display","block");
				l.remove();
				if(s==0){
					$("#nu"+i).append($('<li>'+data.data.name+'<ul id="nu'+ii+'"><li id="li'+ii+'"><a href="#" onclick="nu(this)" data-i="'+ii+'" style="color: red"><i class="fa fa-plus"></i></a></li></ul></li>'));
				}else{
					$("#nu"+i).append($('<li><a class="name" href="'+URL_BASE+'/proyectos/'+data.data.id+'">'+data.data.name+'  </a></li>'));
				}
				
				toastr.success(data.msn);
			}else{
				toastr.success(data.msn);
			}
		}
	});
}

