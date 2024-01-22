<div class="modal fade publication-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">

          <div class="modal-header" style="background-color: #120c6e;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2"><b>Actualizar logo</b></h4>
          </div>
          <div class="modal-body" style="background: #bac7df">
              {!! Form::open(['route'=>['admin.valh.savepubli',Crypt::encrypt(0)],'role' => 'form', 'method' => 'post','enctype'=>'multipart/form-data']) !!}
              <div class="col col-md-12">
                <div class="row">
                <div class="col col-md-6">
                  <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback"  style="text-align: left;">
                    <img id="img" src="{{{ asset('assets/images/logo.png') }}}" width="100px" height="100px" style="border-radius: 50%">
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                        <label class="btn-bs-file btn btn-light" >
                          <input type="file"  id="inp" />
                      </label>
                  </div>
                </div>
                <div class="col col-md-6">
                  <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback"  style="text-align: left;">
                    <label>Nombre</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                      <input class="form-control" name="nombre" >
                      <span class="fa fa-file-o form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="col col-md-6">
                  <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback"  style="text-align: left;">
                    <label>enlace</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                      <input class="form-control" name="enlace" >
                      <span class="fa fa-file-o form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="col col-md-6">
                  <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback"  style="text-align: left;">
                    <label>Tipo</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                      <select class="form-control" name="tipo">
                          <option value="website"> website</option>
                          <option value="app"> app</option>
                      </select>
                      <span class="fa fa-file-o form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>
                <div class="col col-md-6">
                  <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback"  style="text-align: left;">
                    Archivo
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                        <label class="btn-bs-file btn btn-light" >
                          <input type="file"  name="archivo" />
                      </label>
                  </div>
                </div>
                <div class="col col-md-6">
                  <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback"  style="text-align: left;">
                    <label>publicacion</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                      <select class="form-control" name="stado">
                          <option value="local"> local</option>
                          <option value="web"> web</option>
                      </select>
                      <span class="fa fa-file-o form-control-feedback right" aria-hidden="true"></span>
                  </div>
                </div>
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
