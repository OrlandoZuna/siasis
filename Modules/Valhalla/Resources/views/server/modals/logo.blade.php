<div class="modal fade logo-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">

          <div class="modal-header" style="background-color: #120c6e;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2"><b>Actualizar logo</b></h4>
          </div>
          <div class="modal-body" style="background: #bac7df">
              {!! Form::open(['route'=>['admin.valhala.putlogo',Crypt::encrypt(0)],'role' => 'form', 'method' => 'put']) !!}
              <select name="tipo" id="" class="form-control">
                <option value="logo">logo</option>
                <option value="fondo">fondo</option>
              </select>
              <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback"  style="text-align: left;">
                  <img id="img" src="{{{ asset('assets/images/logo.png') }}}" width="100px" height="100px" style="border-radius: 50%">
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                      <label class="btn-bs-file btn btn-light" >
                        <input type="file"  id="inp" />
                    </label>
                    <span class="fa fa-file-o form-control-feedback right" aria-hidden="true"></span>
                </div>
            </div>
            <div class="row">
              <button type="submit" id="btn_submit" class="btn btn-success"><i class="fa fa-save"></i>Guardar</button>
          </div>
          <textarea name="imagen" id="b64" style="visibility:hidden"></textarea>
              {!! Form::close() !!}

          </div>

      </div>
  </div>
</div>
