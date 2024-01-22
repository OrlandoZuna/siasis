<div class="modal fade sbndata-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">

          <div class="modal-header" style="background-color: #3b4653; color:#fff;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
              </button>
              <h4 class="modal-title" style="text-aling:center;position:absolute"><b>Verificar Estudiante</b></h4>
          </div>
          <div class="modal-body" style="background: #cfd2d8">
            <div class="row">
              <div class="modal-body" style="background: #cfd2d8">
                <div class="row">
                  <form id="formda">
                    <div class="col col-md-12">
                      <div class="col col-md-10">
                       <select name="unidad_" id="unidad_id" class="form-control">
                         @foreach ($data as $da)
                            <option value="{{ $da['identificador'] }}">{{ $da['unidad_id'] }}</option>
                         @endforeach
                       </select>
                        <span class="help-block ru-error msgerror" style="margin-bottom:-3px;"></span>
                      </div>
                      <div class="col col-md-2"><button class="btn btn-success" id="verificar"> <i class="fa fa-hand-o-right"></i>  Verificar</button> </div>
                    </div>
                  </form>
                </div>

              </div>

            </div>

          </div>

      </div>
  </div>
</div>
