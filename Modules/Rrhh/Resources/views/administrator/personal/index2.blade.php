@extends('rrhh::layouts.master')
@section('menu')
    @include('rrhh::complement.menu')
@endsection

@section('bar_top')
    @include('rrhh::complement.navs')
@endsection

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

@media screen and (min-width: 768px) {
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
</style>

@section('content')

  <div class="">
    <div class="row"> 
        <div class="col-lg-12">
            @permission('crear.horario')
            <a class="btn btn-app btn-mycolor" data-toggle="modal" data-target=".create-modal-sm">
                <span class="badge bg-red">{{count($personals)}} registros</span>
                <i class="fa fa-plus"></i>
                Nuevo
            </a>
            @endpermission
        </div>
    </div>

    <div class="row">
        
      <div class="col-md-12 col-sm-12 col-xs-12" id="Con_AllD" style="padding:15px;background:#2f5e80cc;border-radius:10px;">
        <div class="J_vPanel">
          <div class="text-center">
            <h2 style="text-transform:uppercase;font-family:monospace;font-weight:bold;font-size:24px;text-decoration:underline">{{$title}}</h2>
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

          {{-- <div class="contJV" id="C_onTablUsPl" style="position:relative">
            <table class="table table-condensed J_tableHover table_mood" id="T_JxUsResult">
              <thead style="display:table;width:100%;table-layout:fixed">
                <tr style="color: #fffff;" >
                  <th scope="col" style="text-align:center">Nombre Completo</th>
                  <th scope="col" style="text-align:center">A. Paterno</th>
                  <th scope="col" style="text-align:center">A. Materno</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody id="J_table_rVll" style="display:block;overflow-y:auto;height:300px;width:100%;backround:#f7f7f7">
              </tbody>
            </table>
          </div> --}}

          <div class="J_vContent" style="position:relative">
            <div class="form-inline" style="text-align: right;font-family: monospace;font-weight: bold;margin-top: 1px;margin-bottom: 12px;background: #ffffff;height: 60px;padding: 5px 0 5px 0;">
              <div class="contai col-md-4" style="text-align:left; width:20%">
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

            <div class="J_ContainerNr" id="aqui">
              <div id="pantalla"></div>
              <table class="table table-hover Table_JMod">
                <thead >
                  <tr>
                    <td width="1%" style="border-left:1px solid white;">ID</td>
                    <td width="25%" style="border-left:1px solid white;">Nombre Completo</td>
                    <td width="10%" style="border-left:1px solid white;">C.I.</td>
                    <td width="10%" style="border-left:1px solid white;">Unidad asiganda</td>
                    <td width="13%" style="border-left:1px solid white;">Email</td>
                    <td width="7%" style="border-left:1px solid white;">Opciones</td>
                  </tr>
                </thead>
                <tbody  id="containerData">
                  @foreach($personals as $empl)
                    <tr class="yestd">
                      <td width="1%">{{$empl->id}}</td>
                      <td width="25%">{{$empl->nombres}}  {{$empl->apellido_paterno}}  {{$empl->apellido_materno}}</td>
                      <td width="10%">{{$empl->ci}} {{$empl->ext}}</td>
                      @if($empl->designacion!=null)
                      <td width="10%">
                        <a href="#">
                          {{$empl->designacion->Unidad->name}} <br> {{$empl->designacion->Cargo->nombre}}
                        </a>
                      </td>
                      @else
                      <td width="11%">No asiganado</td>
                      @endif
                      <td width="15%">{{$empl->correo_electronico}}</td>
                      <td width="10%">
                        <center>
                        <a class='btn btn-success' href='meses'>Mes</a>
                        <!-- <a href="{{url("rrhh/meses")}}" title="Meses"><i class="fa fa-edit"></i></a> -->
                        <a class='btn btn-info' href='meses'>Biometrico</a>
                        </center>
                      </td>
                    </tr>
                  @endforeach
                  <tr style="display:inline;">
                    <td style="border:none;position:absolute;bottom:15px;right:0px;left:0px;">
                    {{ $personals->links() }}
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

</div>
    @include('rrhh::administrator.personal.modals.modal-create')
    @include('rrhh::scarrhh.schedule.modals.modal-edit')
@endsection

@section('after-script')
@parent
    {!! Html::script('assets/plugins/colorpicker/bootstrap-colorpicker.min.js') !!}
    {!! Html::script('assets/plugins/timepicker/bootstrap-timepicker.min.js') !!}
    <script>
        function alerta(id,row) {
            var bool=confirm("esta seguro de eliminar este horario? "+id);
            if(bool){
                $.ajax({
                    url:"{{url("rrhh/deleteShedules")}}",
                    type:"get",
                    data:{"id":id},
                    success:function(datos){
                        if(datos.resp==200){
                            toastr.success("Eliminacion correcta");
                            $(row).parent('center').parent("td").parent("tr").remove();
                        }

                    }
                });
            }
        }
    </script>
    <script type="text/javascript">
        $(function () {
            $(".my-color").change(function(){
                $(this).css("background",$(this).val());
            });
            $(".time").timepicker({
                showInputs: false
            });
        });
        function ver(id){
            $.ajax({
                url:"{{url("rrhh/getSchedule")}}",
                type:"get",
                data:{"id":id},
                success:function(datos){
                    document.getElementById('name_edit').value=datos[0]["nombres"];
                    document.getElementById('id_edit').value=datos[0]["id"];
                    document.getElementById('apellidop').value=datos[0]["apellidop"];
                    document.getElementById('apellidom').value=datos[0]["apellidom"];
                    document.getElementById('ci').value=datos[0]["ci"];
                    document.getElementById('extension').value=datos[0]["extension"];
                    document.getElementById('start_input_edit').value=datos[0]["start_input"];

                    if(datos[0]["sum"]){
                        $('#si_sum').attr('checked',true);
                        $('#no_sum').attr('checked',false);
                    }else{
                        $('#no_sum').attr('checked',true);
                        $('#si_sum').attr('checked',false);
                    }
                }
            });
            $("#modelo").attr("data-toggle","modal");
            $("#modelo").attr("data-target",".edit-modal-sm");
        }

    </script>
<script>

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

//   $(document).on("click", ".pagination a", function(e) {
  //   e.preventDefault();
  //   var url = $(this).attr('href');
  //   J_lookTa(url);
  // });
  // function J_lookTa(url){
  // // $.get(url, function(data, status){
  // //  $('#data854').html(data.cabecera);
  // // });
  //   $.ajax({
  //     type:'GET',
  //     url:url,
  //     beforeSend:function(){
  //     },
  //     success:function(xhr_JsX){
  //       $('#containerData').html(xhr_JsX.list_personal);
  //     }
  //   });
  // }


// function SearchColumn(asd){
  //   var _this = $(asd).val();
  //   $.ajax({
  //     type:'GET',
  //     url:URL_BASE+'/searching',
  //     data:_this,
  //     beforeSend:function(){

  //     },
  //     success:function(xhr_succ){
  //     },error:function(err_scc){
  //     }
  //   });
// }

var x = window.matchMedia("(max-width: 700px)")
var containerTbod = document.getElementById('containerData');
var icLoad = document.getElementById('loadIc');
var backback = document.getElementById('pantalla');

$(document).on("click", ".pagination a", function(e) {
  e.preventDefault();
  var _thisVar = $input.val();
  urlPag_Now = $(this).attr('href');
  $.ajax({
    type:'GET',
    url: urlPag_Now,
    data:{'_thisVar':_thisVar,'_SelOptTy':_SelOptTy},
    success: function(xhr_JsX) {
      $('#containerData').html(xhr_JsX.list_personal);
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
      $("#containerData").html(xhr_succ.list_personal);
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

</script>
@endsection
