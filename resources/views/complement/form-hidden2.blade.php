<div class="panel_hidden_left" id="form-hidden-create">
    <div class="row" style="padding-bottom: 20px;">
        <div class="col-md-12" style="text-align: center">
            <h2>{{$title}}</h2>
        </div>
    </div>
    {{$slot}}
    <div class="row">
	    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback"  style="display: flex;justify-content: center;">
	        <button type="button" class="btn btn-danger btn-sx" id="cerrar_hidden"><i class="fa fa-close"></i> Cerrar</button>
	    </div>
	</div>
</div>