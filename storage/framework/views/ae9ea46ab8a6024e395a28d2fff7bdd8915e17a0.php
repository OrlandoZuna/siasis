<div class="modal modal-success fade edit-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header" style="background: #113F63;color:#fff">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2"><b>Editar Horario</b></h4>
            </div>
            <div class="modal-body" style="background: #CBDEED">
                <h4>Editar</h4>
                <?php echo Form::open(['route'=>['admin.update.horario',Crypt::encrypt(0)], 'role' => 'form', 'method' => 'put']); ?>

                <?php echo Form::hidden('id_edit',null,["value"=>"0","id"=>'id_edit']); ?>

                <table class="table table-responsive">
                    <tr>
                        <td><?php echo Form::label('start_time','Hora Ent:'); ?></td>

                        <td>
                            <?php echo Form::time('start_time',null,["class"=>"form-control","id"=>'start_time_edit']); ?>

                        </td>

                        <td>
                            <?php echo Form::label('end_time','Hora Sal:'); ?>

                        </td>

                        <td>
                            <?php echo Form::time('end_time',null,["class"=>"form-control","id"=>"end_time_edit"]); ?>

                        </td>
                    </tr>
                    <tr>
                        <td><?php echo Form::label('late_minutes','Toler Ent(mins)'); ?></td>
                        <td><?php echo Form::number('late_minutes',0,['class'=>'form-control',"id"=>"late_minutes_edit", "min"=>'5', "max"=>'30']); ?></td>
                        <td><?php echo Form::label('early_minutes','Toler Sal(mins)'); ?></td>
                        <td><?php echo Form::number('early_minutes',0,['class'=>'form-control',"id"=>"early_minutes_edit",'min'=>'5', "max"=>'360']); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Form::label('start_input','Inicio Ent:'); ?></td>
                        <td><?php echo Form::time('start_input',null,['min'=>01, 'max'=>22, 'class'=>'form-control',"id"=>"start_input_edit"]); ?></td>
                        <td><?php echo Form::label('end_input','Fin Ent:'); ?></td>
                        <td><?php echo Form::time('end_input',null,['class'=>'form-control',"id"=>"end_input_edit"]); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Form::label('start_output','Inicio Sal:'); ?></td>
                        <td><?php echo Form::time('start_output',null,['class'=>'form-control',"id"=>"start_output_edit", 'onclick'=>'cambio2()', 'min'=>"12:00", 'max'=>"22:00"]); ?></td>
                        <td><?php echo Form::label('end_output','Fin Sal:'); ?></td>
                        <td><?php echo Form::time('end_output',null,['class'=>'form-control',"id"=>"end_output_edit", 'onclick'=>'cambio3()']); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Form::label('work_day','Cuenta dia Trabajo:'); ?></td>
                        <td><?php echo Form::text('work_day',1,['class'=>'form-control',"id"=>"work_day_edit"]); ?></td>
                        <td><?php echo Form::label('name','Nombre:'); ?></td>
                        <td><?php echo Form::text('name',null,['class'=>'form-control',"id"=>"name_edit"]); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo Form::label('color','Color:'); ?></td>
                        <td colspan="3"><select name="color" id="color_edit" class="form-control my-color" style="color: #fff;">
                                <option value="#34bab2" style="background: #34bab2">Recomendado para horarios por la Ma&ntilde;ana #34bab2</option>
                                <option value="#2f9c95" style="background: #2f9c95">Recomendado para horarios por la Ma&ntilde;ana #2f9c95</option>
                                <option value="#57d4cc" style="background: #57d4cc">Recomendado para horarios por la Ma&ntilde;ana #57d4cc</option>
                                <option value="#51dbaa" style="background: #51dbaa">Recomendado para horarios por la Tarde #51dbaa</option>
                                <option value="#42b38b" style="background: #42b38b">Recomendado para horarios por la Tarde #42b38b</option>
                                <option value="#80e0be" style="background: #80e0be">Recomendado para horarios por la Tarde #80e0be</option>
                                <option value="#dee080" style="background: #dee080">Recomendado para horarios por la Noche #dee080</option>
                                <option value="#ced149" style="background: #ced149">Recomendado para horarios por la Noche #ced149</option>
                                <option value="#a3a617" style="background: #a3a617">Recomendado para horarios por la Noche#a3a617</option>
                                <option value="#eb343f" style="background: #eb343f">Recomendado para horarios Temporales #eb343f</option>
                                <option value="#c73a42" style="background: #c73a42">Recomendado para horarios Temporales #c73a42</option>
                                <option value="#ba4148" style="background: #ba4148">Recomendado para horarios Temporales #ba4148</option>
                                <option value="#9d84b5" style="background: #9d84b5">Recomendado para horarios Especiales #9d84b5</option>
                                <option value="#9252c4" style="background: #9252c4">Recomendado para horarios Especiales #9252c4</option>
                                <option value="#6d3699" style="background: #6d3699">Recomendado para horarios Especiales #6d3699</option>
                                <option value="#562bb3" style="background: #562bb3">Recomendado para horarios Diarios #562bb3</option>
                                <option value="#451e9c" style="background: #451e9c">Recomendado para horarios Diarios #451e9c</option>
                                <option value="#3c28b8" style="background: #3c28b8">Recomendado para horarios Diarios #3c28b8</option>
                            </select></td>
                        <!--td><?php echo Form::text('color',null,['class'=>'form-control my-color',"id"=>"my-color"]); ?></td-->
                        <td><!--<?php echo Form::label('sum','La tolerancia se suma al atrazo?'); ?>--></td>

                    </tr>
                </table>
                <button class="btn btn-primary" type="submit"> Guardar</button>
                <?php echo Form::close(); ?>


            </div>

        </div>
    </div>
</div>
    <script type="text/javascript">
        function cambio2(){
            console.log($("#start_input_edit").val());
            var date2 = moment($("#start_input_edit").val(), 'HH:mm').add(1, 'hours').format('HH:mm');

            $("#start_output_edit").attr("min", date2);
            
        }

        function cambio3(){
            var date3 = moment($("#start_output_edit").val(), 'HH:mm').add(1, 'hours').format('HH:mm');

            $("#end_output_edit").attr("min", date3);
            $("#end_time_edit").attr("min", date3);
        }
        
    </script>
<?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/scarrhh/schedule/modals/modal-edit.blade.php ENDPATH**/ ?>