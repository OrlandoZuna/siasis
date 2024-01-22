<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('rrhh::complement.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bar_top'); ?>
    <?php echo $__env->make('rrhh::complement.navs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<style>
/*TABLE_STYLE  */
.J_vPanel {
    position: relative;
    width: 100%;
    padding: 10px 12px;
    display: inline-block;
    background: #fff;
    border: 1px solid #414141;
    -webkit-column-break-inside: avoid;
    -moz-column-break-inside: avoid;
    column-break-inside: avoid;
    opacity: 1;
    transition: all .2s ease;
    border-radius:10px;
}
.J_vContent {
    position: relative;
    width: 100%;
    float: left;
    clear: both;
    background: #eaeaea;
}
.C_ContBtnS_J{
  margin-bottom:15px;
  margin-top:10px;
}
.J_ContainerNr {
  height: 660px;
  overflow-y: auto;
}
/* Tamaño del scroll */
.J_ContainerNr::-webkit-scrollbar {
  width: 8px;
  height: 8px;
}
/* Estilos barra (thumb) de scroll */
.J_ContainerNr::-webkit-scrollbar-thumb {
  background: #7a7a7a;
  border-radius: 4px;
}
.J_ContainerNr::-webkit-scrollbar-thumb:active {
  background-color: #7a85db;
}
.J_ContainerNr::-webkit-scrollbar-thumb:hover {
  background: #db7a7a;
  -webkit-box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
          box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
}
/* Estilos track de scroll */
.J_ContainerNr::-webkit-scrollbar-track {
  background: #c5c5c5;
  border-radius: 4px;
}
.J_ContainerNr::-webkit-scrollbar-track:hover,
.J_ContainerNr::-webkit-scrollbar-track:active {
  background: #737f88;
}

.Table_JMod {
  width: 100%;
  height: auto;
}
.Table_JMod thead {
  background:linear-gradient(0deg, #277284, #215566) !important;
  color: #fff;
  font-family:monospace;
  font-weight: 900;
  font-size:13px;
  text-align:center;
  border:1px solid black;
  letter-spacing: 1px;
}
.Table_JMod thead tr {
  height: 40px;
}
.Table_JMod thead tr th {
  text-align: center;
  border: 1px solid #fff;
  text-transform: uppercase;
}
.Table_JMod tbody{
  background-color:rgb(252, 252, 252);
}
.Table_JMod tbody tr {
  height: 28px;
  text-align:center;
  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size:13px;
}
.Table_JMod tbody tr td {
  padding-left: 10px;
  border: 1px solid #fff;
  /* text-transform: uppercase; */
}
.Table_JMod tbody tr:hover{
  background:#418ca945 !important;
}
/*///*/

  .example_b {
  color: #000 !important;
  text-transform: uppercase;
  text-decoration: none;
  padding: 9px;
  border-radius: 10px;
  display: inline-block;
  border: 2px solid #484848;
  transition: all 0.4s ease 0s;
  }
  #newUser{
  background: #60a3bc;
  }
  #P_baja{
    background:#60a3bc;
  }
  #p_planta{
    background:#60a3bc;
  }
  #p_docente{
    background: #60a3bc;
  }

  #modalinfoU {
    text-align: center;
  }

  @media  screen and (min-width: 768px) {
  #modalinfoU:before {
    display: inline-block;
    vertical-align: middle;
    content: " ";
    height: 100%;
  }
  }

  #modalinfoU .modal-dialog {
    display: inline-block;
    text-align: left;
    vertical-align: middle;
  }

  .btn-enventos{
    display: inline-block !important;
    position: relative !important;
    margin-left:10px ! important;
    background:linear-gradient(10deg, #486b00, #2e4600) !important;

  }
  .btn-asistencias{
    background:linear-gradient(10deg, #66a5ad, #07575b) !important;
  }
  .dropdown{
    /* position: relative; */
    /* border:1px solid black; */
    display: inline-block !important;
    float:left;
    margin-left: 15px;
    width: 15%;

  }
  .dropdown-menu{
    text-align: center;
    background: linear-gradient(50deg, #66a5ad, #fcfcfc) !important;
  }
  .dropdown-menu a{
    font-weight: bold;
    font-size: 13px;"
    text-transform: uppercase;
    text-align: center;
    padding: 15%;
  }
  center{
    text-align: center;
    float: left;
    margin: auto;
    display: inline;
  }

</style>

<?php $__env->startSection('content'); ?>
  <div class="" id="principalPanel">


    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12" id="Con_AllD" style="padding:15px;background:#2f5e80cc;border-radius:10px;">
        <div class="J_vPanel">
          <div class="text-center">
            <h2 style="text-transform:uppercase;font-family:monospace;font-weight:bold;font-size:24px;text-decoration:underline"><?php echo e($title); ?></h2>
          </div>
          <br>

          <!-- Modal -->
          <div class="modal fade" id="modalinfoU" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <button type="button" style="position:absolute;top: 0;right: 0;color: #e6724b;opacity: 1;z-index: 99;font-size: 36px;" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="modal-body" style="padding:0;" id="containerinfoUs"></div>
                <div id="footThisModal"></div>
              </div>
            </div>
          </div>

          <div id="totalModal"></div>

          

          <div class="J_vContent" style="position:relative">
            <div class="form-inline" style="text-align: right;font-family: monospace;font-weight: bold;margin-top: 1px;margin-bottom: 12px;background: #ffffff;height: 60px;padding: 5px 0 5px 0;">
              <div class="contai col-md-4" style="text-align:left; width:50%">
              <button type="button" class="btn btn-success designar" title="CREAR DESIGNACION DE HORARIOS POR GRUPO" data-toggle="modal" data-target="#grupohorario" style="background: #62abac"><i class="fa fa-plus-square"></i> Ho.</button>
              <button type="button" class="btn btn-primary actualizarDesigancion" title="ACTUALIZAR DESIGNACION DE HORARIOS POR GRUPO" data-toggle="modal" data-target="#grupohorarioactualizar" style=""> <i class="fa fa-refresh"></i> Ho.</button>
              <button class='btn btn-success' title=" REPORTE ASISTENCIAS POR GRUPO"  data-toggle="modal" data-target="#reportegrupo"><i class="fa fa-file-pdf-o"></i> Gr.</button>
              <button class='btn btn-primary' title="REPORTE ASISTENCIAS POR TIPO DE CONTRATO PDF"  data-toggle="modal" data-target="#reportetc"><i class="fa fa-file-pdf-o"></i> T_C</button>
              <button class='btn btn-success' title="REPORTE RESUMIADA POR TIPO DE CONTRATO EXCEL"  data-toggle="modal" data-target="#reporteexcel"><i class="fa fa-file-excel-o"></i> T_c</button>
              <button class='btn btn-primary' title="REPORTES PERMISOS_SALIDAS POR TIPO CONTRATO PDF"  data-toggle="modal" data-target="#reporteps"><i class="fa fa-file-pdf-o"></i> P_S</button>
              <!-- <a href=" <?php echo e(url('rrhh/Desp')); ?>">des</a> -->
            </div>
              <div class="text-title" style="width:74%"> BUSCAR POR :</div>
                <select name="" id="SelThisCh" onchange="ChangeSelonThis(this)" class="form-control" style="border-radius:6px;border:1px solid black;">
                  <option hidden selected disabled>Seleccione</option>
                  <option value="N_mesFul">Nombres</option>
                  <option value="A_patNo">A. Paterno</option>
                  <option value="A_matNo">Ap. Materno</option>
                  <option value="C_i">Cedula</option>
                  <option value="E_ilM">Email</option>
                </select>
                <span id="loadIc" style="position:absolute;padding: 10px;min-width: 40px;right:0;"></span>
                <input id="pruebainput" data-typfullname="columnone" placeholder="Buscar" type="text" class="form-control" style="width:23%; border-radius:6px;text-align:center;border:1px solid black;">
            </div>

            <div id="carga" style="display: none; background-color: #fff; text-align: center;"> <img src="<?php echo e(asset('assets/images/loanding6.gif')); ?>" width="250px" style="color: #900c3f;"></div>

            <div class="J_ContainerNr" id="aqui">
              <div id="pantalla"></div>
              <table class="table table-hover Table_JMod" style="">
                <thead >
                  <tr>
                    <td width="1%" style="border-left:1px solid white;">Estado</td>
                    <td width="20%" style="border-left:1px solid white;">Nombre Completo</td>
                    <td width="10%" style="border-left:1px solid white;">C.I.</td>
                    <td width="6%" style="border-left:1px solid white;">Grupo_Asignado</td>
                    <td width="3%" style="border-left:1px solid white;">T_C</td>
                    <td width="13%" style="border-left:1px solid white;">Email</td>
                    <td width="12%" style="border-left:1px solid white;">Opciones</td>
                  </tr>
                </thead>
                <tbody  id="containerData">
                  <?php $__currentLoopData = $personals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="yestd">
                      <?php if($empl->baja == 1): ?>
                      <td width="3%">
                        <div class="btn-group" style=" margin-left: 0%;" role="group" aria-label="Basic example">
                            <a class="btn btn-warning nodarbaja" id= "nodarbaja" style="margin-top: 2px; color: #fff; border-radius: 20px; background: ; width:5px;"
                            title="HABILITAR A USUARIO PARA REGISTRO DE ASISTENCIA" disabled onclick="nobaja(idp='<?php echo e($empl->id); ?>')"><i class="fa fa-circle-o" style="margin-left: -5px;"></i></a>
                            <a class="btn btn-danger darbaja" id= "<?php echo e($empl->id); ?>" style="margin-top: 1px; border-radius: 20px; background: ; width:5px; text-aling: center;"
                            title="DAR DE BAJA USUARIO PARA LOS REGISTROS DE ASISTENCIA" onclick="baja(this.id)"><i class="fa fa-circle" style="margin-left: -5px;"></i></a>
                        </div>
                      </td>
                      <?php else: ?>
                      <td width="3%">
                        <div class="btn-group" style=" margin-left: 0%;" role="group" aria-label="Basic example">
                            <a class="btn btn-warning nodarbaja" id= "nodarbaja" style="margin-top: 2px; color: #fff; border-radius: 20px; background: ; width:5px;"
                            title="HABILITAR A USUARIO PARA REGISTRO DE ASISTENCIA" onclick="nobaja(idp='<?php echo e($empl->id); ?>')"><i class="fa fa-circle-o" style="margin-left: -5px;"></i></a>
                            <a class="btn btn-danger darbaja" id= "<?php echo e($empl->id); ?>" style="margin-top: 1px; border-radius: 20px; background: ; width:5px; text-aling: center;"
                            title="DAR DE BAJA USUARIO PARA LOS REGISTROS DE ASISTENCIA" onclick="baja(this.id)" disabled><i class="fa fa-circle" style="margin-left: -5px;"></i></a>
                        </div>
                      </td>
                      <?php endif; ?>
                      <td width="20%"><?php echo e($empl->nombres); ?>  <?php echo e($empl->apellido_paterno); ?>  <?php echo e($empl->apellido_materno); ?></td>
                      <td width="10%"><?php echo e($empl->ci); ?> <?php echo e($empl->ext); ?></td>
                      <!-- <?php if($empl->designacion!=null): ?>
                      <td width="10%">
                        <a href="#">
                          <?php echo e($empl->designacion->Unidad->name); ?> <br> <?php echo e($empl->designacion->Cargo->nombre); ?>

                        </a>
                      </td>
                      <?php else: ?>
                      <td width="11%">No asiganado</td>
                      <?php endif; ?> -->
                      <?php if(Count($grupopersona)>0): ?>
                      <?php
                        $nombregrupo= 'No asisnado';
                        $id_grupo= '';
                        foreach ($grupopersona as $key => $grupo) {
                          if ($grupo->personal_id == $empl->id) {
                            $nombregrupo = $grupo->nonbre_grupotrabajo;
                            $id_grupo = $grupo->grupo_trabajo_id;
                          }
                        }
                      ?>
                      <td width="6%">
                          <?php echo e($nombregrupo); ?>

                      </td>
                      <?php else: ?>
                      <td width="6%">$nombregrupo</td>
                      <?php endif; ?>
                      <?php if($empl->id_tipo_contrato!=null): ?>
                      <?php
                        $tipoc="S_T_C";
                        $nombrec="ninguno";
                        foreach ($tipocontrato as $key => $contrato) {
                          if ($contrato->id == $empl->id_tipo_contrato) {
                            $tipoc = $contrato->tipo;
                            $nombrec= $contrato->nombre_tipo_contrato;
                          }
                        }
                      ?>
                      <td width="6%" title="<?php echo e($nombrec); ?>">
                          <?php echo e($tipoc); ?>

                      </td>
                      <?php else: ?>
                      <td width="6%"> S_T_C</td>
                      <?php endif; ?>
                      <?php if($empl->correo_electronico == null): ?>
                      <td width="13%">No Registrado</td>
                      <?php else: ?>
                      <td width="13%"><?php echo e($empl->correo_electronico); ?></td>
                      <?php endif; ?>
                      <td width="12%">
                        <center>

                        <!-- <a href="<?php echo e(url("rrhh/meses")); ?>" title="Meses"><i class="fa fa-edit"></i></a> -->
                        <!-- <a class='btn btn-asistencias' id="<?php echo e($empl->id); ?>" title=" ir a Asistencias para importar" onclick=" ajaxRenderSection2(this.id, url='<?php echo e(url('rrhh/AsisActual')); ?>' )">
                        <i class="fa fa-book" style="color:white;"></i></a> -->
                        <div class="dropdown show">
                          <a class="btn btn-success dropdown-toggle btn-asistencias" title=" designar a un grupo al usuario :<?php echo e($empl->nombres); ?>"
                          role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <i class="fa fa-users" style="color:white;"></i></a>

                          <div class="dropdown-menu text-aling-center" aria-labelledby="dropdownMenuLink">
                            <?php $__currentLoopData = $grupos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grupo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <a class="dropdown-item valores" data-id="<?php echo e($grupo->id); ?>" id="<?php echo e($empl->id); ?>"
                              onclick="designargrupo(this.id, idg='<?php echo e($grupo->id); ?>', url='<?php echo e(url('rrhh/guardarengrupo')); ?>')"><?php echo e($grupo->nombre_trabajo); ?></a><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                        </div>
                        <a class='btn btn-enventos' id="<?php echo e($empl->id); ?>" style="" title=" ir a Eventos de salida del usuario :<?php echo e($empl->nombres); ?>" onclick="ajaxRenderSection(url='<?php echo e(url('rrhh/eventossalida')); ?>', this.id)">
                        <i class="fa fa-tags" style="color:white;"></i></a>

                        <a class='btn btn-success btn-asistenciaspersonales' id="<?php echo e($empl->id); ?>" title=" ir a Asistencias del usuario :<?php echo e($empl->nombres); ?>" onclick=" ajaxRenderSection3(this.id, url='<?php echo e(url('rrhh/asistenciasPersonal')); ?>')"><i class="fa fa-file-text"></i></a>

                        <a class='btn btn-primary' id="<?php echo e($empl->id); ?>" title="ir a desigancio de: <?php echo e($empl->nombres); ?>" onclick=" ajaxRenderSectionDesignacion(this.id, url='<?php echo e(url('rrhh/asistenciasDesignacion')); ?>')"><i class="fa fa-calendar-check-o"></i></a>

                        </center>
                      </td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <tr style="display:inline;">
                    <td style="border:none;position:absolute;bottom:15px;right:0px;left:0px;">
                    <?php echo e($personals->links()); ?>

                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>

        </div>
      </div>
    </div>
</div>
<?php echo $__env->make('rrhh::scarrhh.grupohorario.modals.modal-create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('rrhh::scarrhh.grupohorario.modals.modal-actualizar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('rrhh::scarrhh.reportes.modals.modal-reportegrupo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('rrhh::scarrhh.reportes.modals.modal-repotetc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('rrhh::scarrhh.reportes.xlss.modals.modal-exceltc', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('rrhh::scarrhh.reportes.modals.modal-reporteps', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('after-script'); ?>
<script type="text/javascript">


//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 1500;  //time in ms, 5 second for example
var $input = $('#pruebainput');
var _SelOptTy;
var urlPag_Now;
function ChangeSelonThis(me){
  _SelOptTy = $(me).val();
  $input.val('');
  getResponsTyping();
}

      //alert( Date($.now()) );
      // var dt = new Date();
      // var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
      //console.log(time);
    // Cuando le dás click muestra #content


      function clicke(){

        $('.designar').click(function(){
        $("#grupohorario").toggleClass("show");
        });

        $(".designar").trigger("click");
      }
    // Simular click creategrupo-modal-sm
      // if (time == "0:4:00") {
      //   $(".designar").trigger("click");
      // }
      // else{
      //   console.log(time);
      // }



      //setInterval(ajaxRenderSection, 3000);

///////////// render de  evento de  salidas y entradaas en horarios de trabajo///////////////////
function ajaxRenderSection(url, id_p) {
  console.log(url + id_p);
  //console.log($('#persona').val());
  var id_persona = id_p

  console.log(id_persona);

        $.ajax({
            type: 'GET',
            url: url,
            data:{'idPer':id_persona},
            dataType: 'json',
            success: function (data, id_persona) {
              console.log(id_persona);
              console.log(url + "VHISDHVBDHF");
                $('#principalPanel').empty().append($(data, id_persona));
                console.log(id_persona);
            },
            error: function (data) {
              console.log(data);
                var errors = data.responseJSON;
                console.log(errors);
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
            }
        });
}

function designargrupo(id_p, id_g, url) {
  console.log(url + id_p + id_g);
  var ids= $( '.valores' );
  var id_persona = id_p;

  console.log(id_persona);

        $.ajax({
            type: 'GET',
            url: url,
            data:{id_p, id_g},
            dataType: 'json',
            success: function (datos) {
              if(datos.resp==200){
                toastr.success("guardado correcto de la desgnacion de grupo");
              }
              else if(datos.resp==250){
                  toastr.warning("no se guardo datos ya esta desiganado aun grupo la persona");
              }
              else {
                  toastr.error("no existe perosna en la base de datos");
              }

            },
            error: function (data) {
              console.log(data);
                var errors = data.responseJSON;
                console.log(errors);
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
            }
        });
}

function ajaxRenderSection3(id_p, url) {
  console.log(url + id_p);
  //console.log($('#persona').val());
  var id_persona = id_p

  console.log(id_persona);

        $.ajax({
            type: 'GET',
            url: url,
            data:{'idPer':id_persona},
            dataType: 'json',
            success: function (data, id_persona) {
              console.log(id_persona);
              console.log(url + "VHISDHVBDHF");
                $('#principalPanel').empty().append($(data, id_persona));
                console.log(id_persona);
            },
            error: function (data) {
              console.log(data);
                var errors = data.responseJSON;
                console.log(errors);
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
            }
        });
}

function ajaxRenderSectionDesignacion(id_p, url) {
  console.log(url + id_p);
  //console.log($('#persona').val());
  var id_persona = id_p

  console.log(id_persona);

        $.ajax({
            type: 'GET',
            url: url,
            data:{'idPer':id_persona},
            dataType: 'json',
            success: function (data, id_persona) {
              console.log(id_persona);
              console.log(url + "VHISDHVBDHF");
                $('#principalPanel').empty().append($(data, id_persona));
                console.log(id_persona);
            },
            error: function (data) {
              console.log(data);
                var errors = data.responseJSON;
                console.log(errors);
                if (errors) {
                    $.each(errors, function (i) {
                        console.log(errors[i]);
                    });
                }
            }
        });
}
///////////////////////////////para ir calendario eventos///////
$(document).on("click", "#irCalendar", function(e) {
  e.preventDefault();
  console.log($("#irCalendar").val());
  var url = "<?php echo e(url("rrhh/meses")); ?>";
  var value= $("#irCalendar").val();
  J_lookTa(url);
});
function J_lookTa(url, value){
  console.log(url+ value);
   $.get(url, function(data, status){
    $('#data854').html(data.cabecera);
   });
  $.ajax({
    type:'GET',
    url:url,
    beforeSend:function(){
    },
    success:function(data){
      $('#principalPanel').empty().append($(data));
      //$('#principalPanel').html(data);
    }
  });
}

////// eliminar Personal /////
// function alerta(id,row) {
//     var bool=confirm("esta seguro de eliminar este horario? "+id);
//     if(bool){
//         $.ajax({
//             url:"<?php echo e(url("rrhh/deleteShedules")); ?>",
//             type:"get",
//             data:{"id":id},
//             success:function(datos){
//                 if(datos.resp==200){
//                     toastr.success("Eliminacion correcta");
//                     $(row).parent('center').parent("td").parent("tr").remove();
//                 }

//             }
//         });
//     }
// }


// function SearchColumn(asd){
//     var _this = $(asd).val();
//     $.ajax({
//       type:'GET',
//       url:URL_BASE+'/searching',
//       data:_this,
//       beforeSend:function(){

//       },
//       success:function(xhr_succ){
//       },error:function(err_scc){
//       }
//     });
// }

var x = window.matchMedia("(max-width: 700px)")
var containerTbod = document.getElementById('containerData');
var icLoad = document.getElementById('loadIc');
var backback = document.getElementById('pantalla');

$(document).on("click", ".pagination a", function(e) {
  e.preventDefault();
  var _thisVar = $input.val();
  urlPag_Now = $(this).attr('href');
  console.log(urlPag_Now);
  $.ajax({
    type:'GET',
    url: urlPag_Now,
    data:{'_thisVar':_thisVar,'_SelOptTy':_SelOptTy},
    success: function(xhr_JsX) {
      $('.Table_JMod').html(xhr_JsX.list_personal);
    }
  });
});

//on keyup, start the countdown
$input.on('keyup', function(e){
  if(e.keyCode >= 48 && e.keyCode <= 56 || e.keyCode >= 65 && e.keyCode <= 90 || e.keyCode >= 96 && e.keyCode <= 105 || e.keyCode === 8){
    var hola = $input.val();
    urlPag_Now = undefined;
    clearTimeout(typingTimer);
    if(hola){
      if(x.matches){
      }else{
        // backback.style.cssText='width: 100%;height:620px;top: 5.1em;position: absolute;background-color:rgba(0, 0, 0, 0.15);z-index: 9999;';
      }
      typingTimer = setTimeout(getResponsTyping, doneTypingInterval);
    }else{
      //document.getElementById('containerData').innerHTML = '<p>hola</p>';
      getResponsTyping();
    }
  }
});
//on keydown, clear the countdown
$input.on('keydown', function(e){
  icLoad.innerHTML = '';
  if(e.keyCode >= 48 && e.keyCode <= 56 || e.keyCode >= 65 && e.keyCode <= 90 || e.keyCode === 8 || e.keyCode >= 96 && e.keyCode <= 105){
    var icnLoading = document.createElement('i');
    icnLoading.style.cssText='color:black;font-size:15px;';
    icnLoading.className = "fa fa-spinner fa-spin";
    clearTimeout(typingTimer);
    icLoad.appendChild(icnLoading);
    }
});
//user is "finished typing," do something
function getResponsTyping(){
  var _this = $('#pruebainput').val();
  const app = document.querySelector('#containerData');
  $.ajax({
    type:'GET',
    url:URL_BASE+'/searching',
    data:{'_thisVar':_this,'_SelOptTy':_SelOptTy},
    beforeSend:function(){ },
    success:function(xhr_succ){
      icLoad.innerHTML = '';
      $(".Table_JMod").html(xhr_succ.list_personal);
    },error:function(err_scc){
      console.log('error')
    }
  });
}

/////////ModInfoUser_Per///////////////
$(document).on('click','#SeeInfoUs',function(e){
  e.preventDefault();
  e.stopImmediatePropagation();
  let _this = $(this);
  let _thisUsReference = _this.data("usseeinf");
  let _footerThis = document.getElementById('footThisModal');
  $.ajax({
    type:'GET',
    url:URL_BASE+'/GetModalInfoUs',
    data:{'_thisUsReference':_thisUsReference},
    cache:false,
    beforeSend:function(){_this.button("loading")},
    success:function(xhr){
      $("#modalinfoU").modal("show");
      $("#containerinfoUs").html(xhr.infoUserSelect);
      _footerThis.className = 'modal-footer';
      _footerThis.style.cssText = 'background:linear-gradient(338deg, #bc6161, #261c36)';
      _this.button("reset")
    },error:function(){

    }
  });
});

/////////_OpeMod_EditedPer//////////////////
$(document).on('click','#EditOpenFrom',function(e){
  e.preventDefault();
  var _thisBtnEdVal= $(this);
  var Ind_XThis = _thisBtnEdVal.closest("tr").index();
  var _ValueSearch = $(this).data('ieditedopmp');
  ///const_mod
  document.getElementById('totalModal').textContent = '';
  var InitMod = document.getElementById('totalModal');
  InitMod.className = 'modal fade bd-example-modal-lg';
  InitMod.setAttribute('role','dialog');
  InitMod.setAttribute('aria-labelledby','exampleModalLongTitle');
  InitMod.setAttribute('aria-hidden','true');
  var secondiv = document.createElement('div');
  secondiv.className = 'modal-dialog modal-lg';
  secondiv.setAttribute('role','document');
  var thirthdiv = document.createElement('div');
  thirthdiv.className = 'modal-content';
  var quartdiv = document.createElement('div');
  quartdiv.className = 'modal-header';
  quartdiv.style.background = 'linear-gradient(176deg, rgb(24 66 107), rgb(25 55 79 / 82%))';
  quartdiv.setAttribute('role','document');
  quartdiv.innerHTML = '<button type="button" style="color:#ffffff;" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h5 style="color:#ffe0a6;text-align:center;font-family:monospace;font-weight:bold;font-size:17px;" class="modal-title" id="myModalLabel">ACTUALIZAR DATOS</h5>';
  var DivBody = document.createElement('div');
  DivBody.className = 'modal-body';
  DivBody.style.background = 'linear-gradient(174deg, rgb(202 191 151 / 84%), rgba(21, 21, 21, 0))';
  DivBody.setAttribute('id','contentBody');
  var divContMsg = document.createElement('div');
  divContMsg.setAttribute('id','containerMsg');
  // var divModalFoot = document.createElement('div');
  // divModalFoot.className = 'modal-footer';
  // divModalFoot.setAttribute('id','footerModal');
  // divModalFoot.innerHTML = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'
  thirthdiv.appendChild(quartdiv);
  thirthdiv.appendChild(DivBody);
  //thirthdiv.appendChild(divModalFoot);
  thirthdiv.appendChild(divContMsg);
  secondiv.appendChild(thirthdiv);
  InitMod.appendChild(secondiv);
  $.ajax({
    type:'GET',
    url:URL_BASE+'/OpenModEditedP',
    data:{'_ValueSearch':_ValueSearch,'Ind_XThis':Ind_XThis},
    cache:false,
    beforeSend:function(){_thisBtnEdVal.button("loading")},
    success:function(xhrResp){
      $("#contentBody").html(xhrResp.selectUserP);
      if(!xhrResp.PhotoConfirm){
        let aqui = document.getElementById('defect-im');
        aqui.innerHTML = `<button data-genperus="${xhrResp.JxGenPersUs}" class="btn" id="activeImDefect" data-uschangpho="${xhrResp.JxIdPersUs}" style="font-size: 11px;border-radius: 10px;padding: 4px 6px;background:rgb(210 77 77);font-weight:bold; border: 1px solid #2d2d2d;box-shadow: 1px 2px #737373; color: #e8e8e8;">Imagen Por Defecto</button>`;
      }
      $("#totalModal").modal("show");
      _thisBtnEdVal.button("reset");

    },error:function(){
      _thisBtnEdVal.button("reset");
    }
  });
});

function CalculateYear(date) {
  var today = new Date();
  var cumpleanos = new Date(date);
  var year = today.getFullYear() - cumpleanos.getFullYear();
  var m = today.getMonth() - cumpleanos.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < cumpleanos.getDate())) {year--;}
  return year;
}
/////subm_updatingPer////
$(document).on('click','#updateSubm',function(e){
  e.preventDefault();
  var _thisVar = $input.val();
  let _this = $(this);
  let _dataidUs = _this.data("peridinf");
  let _indexThis = _this.data("idxthis");
  var bodyinfo = document.getElementById('containerData');
  var token = $('input[name=_token]').val();
  var _DateVerif = CalculateYear($("#fecha_nacimiento").val());
  var data = new FormData($("#form_editPe")[0]);
  data.append('_dataidUs',_dataidUs);
  data.append('_DateVerif',_DateVerif);
  data.append('_token',token);
  $.ajax({
    type:'POST',
    headers:{'X-CSRF_TOKEN':token},
    url:URL_BASE+'/updateUserP',
    data: data,
    processData: false,
    contentType: false,
    beforeSend:function(){_this.button("loading")},
    success:function(xhr_successfull){
      if(urlPag_Now === undefined){
        $.ajax({
          type:'GET',
          url:URL_BASE+'/searching',
          data:{_thisVar,_SelOptTy},
          success:function(xhr_succ){
            $("#containerData").html(xhr_succ.list_personal);
            _this.button("reset");
            $("#totalModal").modal("hide");
            bodyinfo.rows[_indexThis].style.background ='#ffb30057';
            setTimeout(()=>{
              bodyinfo.rows[_indexThis].style.background ='white';
            }, 2000);
          }
        });
      }else{
        $.ajax({
          type:'GET',
          url: urlPag_Now,
          data:{'_thisVar':_thisVar,'_SelOptTy':_SelOptTy},
          success: function(xhr_JsX){
            $('#containerData').html(xhr_JsX.list_personal);
            _this.button("reset");
            $("#totalModal").modal("hide");
            bodyinfo.rows[_indexThis].style.background ='#ffb30057';
            setTimeout(()=>{
              bodyinfo.rows[_indexThis].style.background ='white';
            }, 2000);
          }
        });
      }
      document.getElementById('totalModal').textContent = '';document.getElementById('totalModal').removeAttribute("style");
      document.getElementById('totalModal').removeAttribute("class");document.getElementById('totalModal').removeAttribute("role");
      document.getElementById('totalModal').removeAttribute("aria-labelledby");document.getElementById('totalModal').removeAttribute("aria-hidden");
    },error:function(){

    }
  });
});

///CreateUsPer///
$(document).on('click','#newUser',function(e){
  e.preventDefault();
  let _thisLoabtCr = $(this);
  document.getElementById('totalModal').textContent = '';
  let _mSgPerMs = '_this_msg';
  var InitMod = document.getElementById('totalModal');
  InitMod.className = 'modal fade bd-example-modal-lg';
  InitMod.setAttribute('role','dialog');
  InitMod.setAttribute('aria-labelledby','exampleModalLongTitle');
  InitMod.setAttribute('aria-hidden','true');
  var secondiv = document.createElement('div');
  secondiv.className = 'modal-dialog modal-lg';
  secondiv.setAttribute('role','document');
  var thirthdiv = document.createElement('div');
  thirthdiv.className = 'modal-content';
  var quartdiv = document.createElement('div');
  quartdiv.className = 'modal-header';
  quartdiv.style.background = 'linear-gradient(176deg, rgb(24 66 107), rgb(25 55 79 / 82%))';
  quartdiv.setAttribute('role','document');
  quartdiv.innerHTML = '<button type="button" style="color:#ffffff;" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h5 style="color:#ffe0a6;text-align:center;font-family:monospace;font-weight:bold;font-size:17px;" class="modal-title" id="myModalLabel">NUEVO USUARIO</h5>';
  var DivBody = document.createElement('div');
  DivBody.className = 'modal-body';
  DivBody.style.background = 'linear-gradient(174deg, rgb(202 191 151 / 84%), rgba(21, 21, 21, 0))';
  DivBody.setAttribute('id','contentBody');
  // var divModalFoot = document.createElement('div');
  // divModalFoot.className = 'modal-footer';
  // divModalFoot.setAttribute('id','footerModal');
  // divModalFoot.innerHTML = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>'
  thirthdiv.appendChild(quartdiv);
  thirthdiv.appendChild(DivBody);
  //thirthdiv.appendChild(divModalFoot);
  secondiv.appendChild(thirthdiv);
  InitMod.appendChild(secondiv);

  $.ajax({
    type:'GET',
    url:URL_BASE+'/OpenModCreateP',
    data:{'_mSgPerMs':_mSgPerMs},
    cache:false,
    beforeSend:function(){_thisLoabtCr.button("loading")},
    success:function(xhrResp){
      $("#contentBody").html(xhrResp._OpenModCrPer);
      $("#totalModal").modal("show");
      _thisLoabtCr.button("reset");
    },error:function(){
      _thisLoabtCr.button("reset");
    }
  });
});

///store_Per
$(document).on('click','#creatSubmP',function(e){
  e.preventDefault();
  let _this = $(this);
  $('span.msgerror').html('');
  var bodyinfo = document.getElementById('containerData');
  var token = $('input[name=_token]').val();
  var _DateVerifCr = CalculateYear($("#fecha_nacimiento").val());
  var data = new FormData($("#form_CreatePers")[0]);
  data.append('_DateVerifCr',_DateVerifCr);
  data.append('_token',token);
  $.ajax({
    type:'POST',
    headers:{'X-CSRF_TOKEN':token},
    url:URL_BASE+'/storeCrPers',
    data: data,
    processData: false,
    contentType: false,
    beforeSend:function(){
      _this.button("loading")
    },
    success:function(xhr_success){
      $.ajax({
        type:'GET',
        url: URL_BASE+'/personals',
        success: function(xhr_JsX){
          $('#containerData').html(xhr_JsX.list_personal);
          _this.button("reset");
          $("#totalModal").modal("hide");
          toastr.success('','Usuario Agregado Correctamente');
        }
      });
    },error:function(err_succ){
      toastr.error('Verifique que los campos estén llenados correctamente','Error', {timeOut: 2000});
      _this.button('reset');
      console.log(err_succ);
      $.each(err_succ.responseJSON.errors, function (key, value) {
        $('.'+key+'-error').html("<span style='font-size:9px; color:white; background-color: #FF4545; border-radius: 5px; padding:1px 4px 1px 4px;'> <i class='fa fa-exclamation-circle'></i> "+value+"</span>");
      });
    }
  });
});

///desde aqui scripts de horario persona//////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
$(document).on('click','.designargrupo', function(e) {
  e.preventDefault();
  console.log('hola desde asignar horarios');
  var horario_id = $('#horario_id').val();
  var grupo_id = $('#grupo_id').val();
  var start = $('#start').val();
  var end = $('#end').val();

  console.log('hola desde asignar horarios '+horario_id, start, end, grupo_id);
  var url=URL_BASE+'/desiganarg';
  console.log(url);
  $.ajax({
      url: url,
      type:"get",
      data:{horario_id, grupo_id, start, end},
      success:function(datos){
          if(datos.resp==200){
              toastr.success("Se Realizo de manera correcta la desiganacion de horarios");
              //$(row).parent('center').parent("td").parent("tr").remove();
          }
          else if (datos.resp==250){
            toastr.warning("ya se designo el respectivo horario al personal a asignar");
          }
          else{
            toastr.error("no se realizaron las designaciones de horarios grupo no tiene participantes");
          }
          $('.creategrupo-modal-sm').modal("hide");
          $('#horario_id').val(0);
          $('#grupo_id').val(0);
          $('#start').val("");
          $('#end').val("");
      }
  });
} )

</script>
<script>
  $(document).on("click", "#reportegrupogenerar", function(e) {
      e.preventDefault();
      var fecha1= $('#fecha1').val();
      var fecha2= $('#fecha2').val();
      var grupo = $('#grupito').val();

      var url = "<?php echo e(url("rrhh/reportegrupo")); ?>";
      console.log(fecha1, fecha2, grupo, url);
         $.ajax({
              url: url,
              type:"get",
              data:{"grupo":grupo, "fecha1":fecha1, "fecha2":fecha2},
              xhrFields: {
                  responseType: 'blob'
              },
              beforeSend: function () {
                $('.reportegrupo-modal-sm').modal("hide");
                $('#carga').show();
              },
              success:function(datos){

                $('#carga').hide();
                $("#fecha1").val('');
                $("#fecha2").val('');
                $('#grupito').val(0);

                var blob = new Blob([datos], {type: 'application/pdf'});
                var link = document.createElement('a');
                link.href = URL.createObjectURL(blob);     ////para descargar

                link.target = '_blank';
                link.stream = "grupo.pdf";
                link.click();
              },
              error: function(blob){
                  console.log(blob);
                  alert('Error');
                  $('#carga').hide();
              }
          });
    });
  </script>
  <script type="text/javascript">

    $(document).on("click", "#reportetcgenerar", function(e) {
      console.log('hola de tc');
      e.preventDefault();
      var fecha1 = $('#fecha1tc').val();
      var fecha2 = $('#fecha2tc').val();
      var grupo = $('#tc').val();
      var url = "<?php echo e(url("rrhh/reportetc")); ?>";
      console.log(fecha1tc, fecha2tc, tc, url);
        $.ajax({
          url: url,
          type:"get",
          data:{"grupo":grupo, "fecha1":fecha1, "fecha2":fecha2},
          xhrFields: {
              responseType: 'blob'
          },
          beforeSend: function () {
            $('.reportetc-modal-sm').modal("hide");
            $("#carga").show();
          },
          success:function(datos){
            //$('.reportegrupo-modal-sm').modal("hide");
            $("#carga").hide();
            $("#fecha1tc").val('');
            $("#fecha2tc").val('');
            $('#tc').val(0);
            var blob = new Blob([datos], {type: 'application/pdf'});
            //var link = $('.as').attr("target","_blank");
            var link = document.createElement('a');
            link.href = URL.createObjectURL(blob);     ////para descargar
            //link.href = window.URL.createObjectURL(datos);
            link.target = '_blank';
            link.stream = "tc.pdf";
            //link.download = "mypdf.pdf";               ////para descargar
            link.click();
                // var blob = new Blob([datos], {type: 'application/pdf'});
                  // var url = URL.createObjectURL(blob);
                  // location.assign(response);
          },
          error: function(blob){
              console.log(blob);
              alert('Error');
              $("#carga").hide();
          }

        });
      });

      $(document).on("click", "#reportepsgenerar", function(e) {
      e.preventDefault();
      var fecha1 = $('#fecha1ps').val();
      var fecha2 = $('#fecha2ps').val();
      var grupo = $('#tc1').val();
      var url = "<?php echo e(url("rrhh/reporteps")); ?>";
        $.ajax({
          url: url,
          type:"get",
          data:{"grupo":grupo, "fecha1":fecha1, "fecha2":fecha2},
          xhrFields: {
              responseType: 'blob'
          },
          beforeSend: function () {
            $('.reporteps-modal-sm').modal("hide");
            $("#carga").show();
          },
          success:function(datos){
            //$('.reportegrupo-modal-sm').modal("hide");
            $("#carga").hide();
            $("#fecha1ps").val('');
            $("#fecha2ps").val('');
            $('#tc1').val(0);
            var blob = new Blob([datos], {type: 'application/pdf'});
            //var link = $('.as').attr("target","_blank");
            var link = document.createElement('a');
            link.href = URL.createObjectURL(blob);     ////para descargar
            //link.href = window.URL.createObjectURL(datos);
            link.target = '_blank';
            link.stream = "ps.pdf";
            //link.download = "mypdf.pdf";               ////para descargar
            link.click();

          },
          error: function(blob){
              console.log(blob);
              alert('Error');
              $("#carga").hide();
          }
        });
      });

    </script>
      <script type="text/javascript">
    $(document).on("click", "#reporteexcelgenerar", function(e) {
      console.log('hola de excel');
      e.preventDefault();
      var fecha1 = $('#fecha1ex').val();
      var fecha2 = $('#fecha2ex').val();
      var grupo = $('#ex').val();
      var url = "<?php echo e(url("rrhh/exceldes")); ?>";
      console.log(fecha1ex, fecha2ex, ex, url);
        $.ajax({
          url: url,
          type:"get",
          data:{"tc":grupo, "fecha1":fecha1, "fecha2":fecha2},
          xhrFields: {
              responseType: 'blob'
          },
          beforeSend: function () {
            $('.reporteexcel-modal-sm').modal("hide");
            $("#carga").show();
          },
          success:function(datos){
            //$('.reportegrupo-modal-sm').modal("hide");
            $("#carga").hide();
            $("#fecha1ex").val('');
            $("#fecha2ex").val('');
            $('#ex').val(0);
            var blob = datos;
            var downloadUrl = URL.createObjectURL(blob);
            var a = document.createElement("a");
            a.href = downloadUrl;
            a.download = `reporteTipoContrato.xlsx`;
            a.target = '_blank';
            a.click();
          },
          error: function(blob){
              console.log(blob);
              alert('Error');
              $("#carga").hide();
          }

        });
      });
      /////////////baja no baja de usuario en dispositvos.../////
      function baja(id){
        var valor = 0;
        var url=URL_BASE+'/darbaja';
        console.log(url);
        $.ajax({
            url: url,
            type:"get",
            data:{id, valor},
            success:function(datos){
                if(datos.resp==200){
                  $(".Table_JMod").html(datos.list_personal);
                  //$(".calendarioIr").attr("disabled", false);
                  $(".darbaja").attr("disableb", true);
                  $("#nodarbaja").attr("disableb", false);
                  toastr.success("Se dio de baja a correctamente");
                }
                else{
                  toastr.error("no se realizo el dar de baja");
                }
            }
        });
      }

      function nobaja(id){
        var valor = 1;
        var url=URL_BASE+'/nodarbaja';
        console.log(url);
        $.ajax({
            url: url,
            type:"get",
            data:{id, valor},
            beforeSend: function () {
              $(".darbaja").attr("disableb", false);
              $("#nodarbaja").attr("isableb", true);
            },
            success:function(datos){
                if(datos.resp==200){
                  $(".Table_JMod").html(datos.list_personal);
                    $(".darbaja").attr("disableb", false);
                    $("#nodarbaja").attr("isableb", true);

                    toastr.success("Se habilito al usuario para el registro de asistencias");
                    //$(row).parent('center').parent("td").parent("tr").remove();
                }
                else{
                  toastr.error("no se realizo la accion");
                }
            }
        });
      }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('rrhh::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Web\Modules/Rrhh\Resources/views/administrator/personal/index.blade.php ENDPATH**/ ?>