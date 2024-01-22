<div class="modal fade create-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2" style="text-align: center;"><b>Nuevo Biometrico</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
              
                <?php echo Form::open(['route'=>'biometrico.save', 'role' => 'form', 'method' => 'post']); ?>

                <table class="table table-responsive">
                <form id="formulario"> 
                    <tr>
                        <td>
                            <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="escribe el nombre "
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                            <label for="lugar">Lugar</label>
                            <input type="text"
                                class="form-control" name="lugar" id="lugar" placeholder="excriba el lugar">
                            </div>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                            <label for="ip">Ip</label>
                            <input type="text" class="form-control" name="ip" id="ip" placeholder=" escriba la ip ">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="puerto">Puerto</label>
                            <input type="text"
                                class="form-control" name="puerto" id="puerto" placeholder="" value="4370">
                            </div>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" name="estado" id="estado" placeholder="" value="inactivo">
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                            <label for="version">Version</label>
                            <input type="text"
                                class="form-control" name="version" id="version" value="000000">
                            </div>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" name="modelo" id="modelo" placeholder="" value="zkteco">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="Nserie">Nserie</label>
                            <input type="text"class="form-control" name="Nserie" id="Nserie" placeholder="" value="000000">
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                            <label for="fecha_creacion">Fecha_creacion</label>
                            <input type="text" class="form-control" name="fecha_creacion" id="fecha_creacion" value="<?php echo e($fecha); ?>">
                            </div>
                        </td>
                    </tr>

                </form>
                </table>
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/biometric/modals/modal-create.blade.php ENDPATH**/ ?>