<div class="modal fade create-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2"><b>Nuevo Grupo de Trabajo</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
                <h4>Nuevo</h4>
              
                {!! Form::open(['route'=>'save.trabajo', 'role' => 'form', 'method' => 'post']) !!}
                <table class="table table-responsive">
                    
                    <tr>
                        <td>{!! Form::label('nombre_trabajo','Nombre Grupo de Trabajo: ') !!}</td>
                        <td>{!! Form::text('nombre_trabajo',null,["class"=>"form-control"])!!}</td>
                    </tr>

                </table>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>