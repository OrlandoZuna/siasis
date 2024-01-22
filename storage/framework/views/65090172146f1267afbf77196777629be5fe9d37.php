<div class="modal fade create-edit-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2" style="text-align: center;"><b>Editar Datos Biometrico</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">

                <?php echo Form::open(['route'=>'biometrico-Editar.save', 'role' => 'form', 'method' => 'post']); ?>

                <?php echo Form::hidden('id_b',null,["value"=>"0","id"=>'id_b']); ?>

                <table class="table table-responsive">
                <form id="formulario">
                    <tr>
                        <td>
                            <div class="form-group">
                            <label for="nombre_b">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre_b">
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                            <label for="lugar_b">Lugar</label>
                            <input type="text"
                                class="form-control" name="lugar" id="lugar_b">
                            </div>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                            <label for="ip_b">Ip</label>
                            <input type="text" class="form-control" name="ip" id="ip_b">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="puerto_b">Puerto</label>
                            <input type="text"
                                class="form-control" name="puerto" id="puerto_b" readonly>
                            </div>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                            <label for="estado_b">Estado</label>
                            <input type="text" class="form-control" name="estado" id="estado_b">
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                            <label for="version_b">Version</label>
                            <input type="text"
                                class="form-control" name="version" id="version_b" readonly>
                            </div>
                        </td>

                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                            <label for="modelo">Modelo</label>
                            <input type="text" class="form-control" name="modelo" id="modelo_b" readonly>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="Nserie">Nserie_b</label>
                            <input type="text"class="form-control" name="Nserie" id="Nserie_b" readonly>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                            <label for="fecha_creacion">Fecha_creacion</label>
                            <input type="text" class="form-control" name="fecha_creacion" id="fecha_creacion_b" readonly>
                            </div>
                        </td>
                    </tr>

                </form>
                </table>
                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/biometric/modals/modal-edit.blade.php ENDPATH**/ ?>