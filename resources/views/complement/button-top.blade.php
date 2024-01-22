<div class="row" style="box-shadow: 0 0 7px 0px #CBDEED"> 
	<a href="{{URL::previous()}}" class="btn btn-app btn-mycolor"><i class="fa fa-reply"></i>Atras</a>
    <button class="btn btn-app btn-mycolor" id="abre-hidden"><i class="fa fa-pencil"></i>Nuevo</button>
    @if($slot != null)
		{{$slot}}
    @endif
</div>