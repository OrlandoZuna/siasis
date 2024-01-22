<div class="container">
  <style type="text/css">
      .myscroll {
          border: solid white 1px;
          overflow: scroll;
          height: 470px;
      }
      .btn{
          background:linear-gradient(10deg, #caf0f8, #00b4d8);
          font-family:monospace;
          color:rgb(0, 0, 0) !important;
          font-weight:bold;
          /* margin: 20px; */
      }
      .btn-p{
          background:linear-gradient(10deg, #57a1d6, #313652);
          font-family:monospace;
          color:rgb(255, 255, 255) !important;
          font-weight:bold;
          /* margin: 20px; */
      }
      .btn:hover{
          margin: 10px;
          overflow: hidden;
          background: linear-gradient(156deg, #03045e, #0077b6);
          color:rgb(0, 0, 0) !important;
          border-radius:15px 0 0 15px;
          font-family:monospace;
          font-weight:bold;
          color:white !important;
      }
      .btn-p:hover{ 
          margin: 10px;
          overflow: hidden;
          background: linear-gradient(156deg, #920f0f7a, #000000d1 );
          color:black !important;
          border-radius:15px 0 0 15px;
          font-family:monospace;
          font-weight:bold;
      }
      
      .eliminarUser{
        background:linear-gradient(10deg, #e73f0b, #a11f0c) !important;
      }

      .eliminarUser:hover{
        background:linear-gradient(10deg, #283655, #4d648d) !important;
      }

      h2 {
        text-align: center;
        font-weight: bold;
        font-family: monospace;
      }
      th{
        text-align: center;
      }
      .tablas{
        margin-bottom: 20px;
      }
      .form-select-sm:hover{
        background-color: #0077b6;
        color: white;
        display: inline-block;
      }
      #opcion:hover{
        display: block;
      }

  </style>
  <?php
    $ret
  ?>
    <div class="tablas">
        <div class="form-inline" style="text-align: right;font-weight: bold;margin-top: 1px;
          margin-bottom: 2px;height: 9%;padding: 5px 0 5px 0;">
          <h2 style="">Datos Biometrico</h2>
            <button type="button" class="btn btn-primary" id="{{ $id_e }}" onclick="activarBio(this.id)">habilitar Biometrico</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" id="biometricos">
              Biometricos
            </button>
        </div>
			<table class="table__kirito table-bordered" style="width:99%">
        <thead>
          <tr>
            <th>Status</th>
            <th>Version</th>
            <th>OsVersion</th>
            <th>Platfomr</th>
            <th>Firmware Version</th>
            <th>Serial Number</th>
            <th>Device Name</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Connected</td>
            <td><?php echo $zk->version() ?></td>
            <td><?php echo $zk->osVersion() ?></td>
            <td><?php echo $zk->platform() ?></td>
            <td><?php echo $zk->fmVersion() ?></td>
            <td><?php echo $zk->serialNumber() ?></td>
            <td><?php echo $zk->deviceName() ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div id="tablauserRender">
      <div class="tabla-usuarios">
        <div class="form-inline" style="text-align: right;font-weight: bold;margin-top: 1px;
          margin-bottom: 2px;height: 9%;padding: 5px 0 5px 0;">
          <h2>Datos Usuarios</h2>
            <button type="button" class="btn" id="agregarUser" data-toggle="modal" data-target="#modaluseragregar">Agregar Usuario</button>
            <!-- <button type="button" id='{{$ip}}' onclick=" a(this.id, {{$puerto}})" class="btn btn-warning">VerTipoAsis.</button> -->
        </div>
        <div id="renderUser">
          <table class="table__kirito table-bordered" style="width:99%">
            <thead>
            <tr >
              <th>UID</th>
              <th>UserId</th>
              <th>Name</th>
              <th>Role</th>
              <th>Password</th>
              <th>Card number</th>
              <th>Opciones</th>
            </tr>
            </thead>
            <tbody>              
              <?php
              try {
            // $zk->clearUsers();
            // $zk->setUser(new User(1, User::PRIVILEGE_SUPERADMIN, '1', 'Admin', '', '', -3, 1));
              foreach($users as $user):
                ?>
                <tr class="">
                  <td width="3%" style="text-align: center;">{{ $user['uid'] }}</td>
                  <td width="8%" style="text-align: center;"><?php echo $user['userid']; ?></td>
                  <td style="text-align: center;"><?php echo $user['name']; ?></td>
                  <td style="text-align: center;"><?php echo $user['role']; ?></td>
                  <td style="text-align: center;">{{ $user['password'] }}</td>
                  <td style="text-align: center; width: 20%;"><?php echo $user['cardno']; ?></td>
                  <td> <button type="button" onclick ="eliminar ({{ $user['uid'] }}, '{{ $ip }}', '{{ $puerto }}',)" class="btn btn-primary eliminarUser" ><i class="fa fa-trash" style="color:white;"></i></button></td>
                </tr>
                <?php
                endforeach;
              } catch (Exception $e) {
                header("HTTP/1.0 404 Not Found");
                header('HTTP', true, 500); // 500 internal server error
              }
              // $zk->clearAdmins();
              ?>
            </tbody>
          </table>
          <div class="row">  
          <div class="col-lg-12 text-center">
              {{ $users->links() }}
          </div>
          </div>
        </div>
      </div>
    </div>

    <div id="carga" style="display: none; background-color: #fff; text-align: center;"> <img src="{{{ asset('assets/images/loanding6.gif') }}}" width="250px" style="color: #900c3f;"></div>

    <div class="tablas">
      <div class="form-inlene" style="text-align: right;font-weight: bold;margin-top: 1px;
        margin-bottom: 2px;height: 9%;padding: 5px 0 5px 0;">
        <h2>Registro de Asistencias</h2>
          <button type="button" class="btn btn-primary" data-toggle="modal" id="tipo">
            Ver por Tipo
          </button>
          <select class="form-select form-select-sm" aria-label=".form-select-sm" id="type" name="type" onchange="mandarValor(this)">
              <option class="opcion" value="0" selected disabled hidden>seleccione</option>
              <option class="opcion" value="Entrada">Entrada</option>
              <option class="opcion" value="Salida">Salida</option>
            </select>
          <button type="button" class="btn btn-primary" data-toggle="modal" id="asistencias">
            Asistencias
          </button>
          <button type="button" id='{{$ip}}' onclick=" importarAsis(this.id, {{$puerto}})" class="btn btn-warning">ImportarAsis</button>
      </div>
      <div id="renderasisbiometrico">
        <table class="table__kirito table-bordered" style="width:99%" id="table" name="table">
              <thead>
              <tr>
                <th>UID</th>
                <th>Id</th>
                <th>State</th>
                <th>timestamp</th>
                <th>type</th>
              </tr>
              </thead>
              <tbody>
                @foreach($attendances as $attendance)
                  <tr>
                    <td><?php echo $attendance['uid']; ?></td>
                    <td><?php echo $attendance['id']; ?></td>
                    <td><?php echo $attendance['state']; ?></td>
                    <td><?php echo $attendance['timestamp']; ?></td>
                    <td><?php echo $attendance['type']; ?></td>
                  </tr>
                @endforeach
              </tbody>
        </table>
        <div class="row">  
        <div class="col-lg-12 text-center">
            {{ $attendances->links() }}
        </div>
        </div>
        
      </div>
    </div>

  <?php
  $var='Salida';
    $zk->enableDevice();
    $zk->disconnect();
  ?>
</div>
 <!-- vista general de biometricos -->
 @include('rrhh::administrator.biometric.modals.vista-general') 
 @include('rrhh::administrator.biometric.modals.general-asistencias') 
 @include('rrhh::administrator.biometric.modals.general-asistencias-tipo') 
<!-- modal create -->
<div class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" id="modaluseragregar">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background: #113F63;color:#fff">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span>
          </button>
          <h4 class="modal-title" id="myModalLabel2" style="text-aling: center;"><b>Nuevo Usuario Biometrico</b></h4>
        </div>
        <div class="modal-body" style="background: #CBDEED">

          <table class="table table-responsive">
          <form class="" novalidate id="formulario-usuario"> 
            <tr>
              <td>
                  <div class="form-group">
                  <label for="uid">Uid</label>
                  <input type="number" class="form-control" name="uid" id="uid">
                  </div>
              </td>
              <td>
                  <div class="form-group">
                  <label for="userid">UserId</label>
                  <input type="number"
                      class="form-control" name="userid" id="userid">
                  </div>
              </td>
            </tr>
            <tr> 
              <td>
                  <div clas="col-6">
                    <label for="name">Nombre Completo</label>
                    <input type="text" class="form-control is-invalid" name="name" id="name">
                  </div>
              </td>
              <td>
                  <div class="form-group">
                  <label for="password">Password</label>
                  <input type="number" minlength="4" maxlength="20" class="form-control" name="password" id="password" required>
                  </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="mb-3">
                  <label for="role" class="form-label">Rol</label>
                  
                  <select class="form-select form-select-sm" aria-label=".form-select-sm" name="role" id="role">
                    <!-- <option value="" selected disabled hidden>seleccione</option> -->
                    <option value="0">User</option>
                    <option value="14">Admin</option>
                    
                  </select>
              </td>
              <td>
                  <div class="form-group">
                  <label for="cardno">Numero de Tarjeta</label>
                  <input type="number"
                      class="form-control" name="cardno" id="cardno" value=0>
                  </div>
              </td>
            </tr>
          </form>
                </table>
                <!-- <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button> -->
                <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                <button type="submit" id='{{$ip}}' onclick="nuevoUsuario(this.id, {{$puerto}})" class="btn btn-success">Guardar</button>

                <!-- {!! Form::close() !!} -->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // $(document).on('click','#mostrarModalBio',function(e){
    //     //e.preventDefault();
    //     //$('.create-modal-sm').modal('show');
    // }); 

    function activarBio(id_e){
      var id = id_e;
      console.log(id);
      var url="{{url("rrhh/bioconectUpdate")}}";
        $.ajax({
            type:'GET',
            url:url,
            data:{'id': id},
            dataType: 'json',
            success:function(datos, id){
              console.log(id);
                if(datos.resp == 200){
                    toastr.success("El habilitado y guardado de datos del biometrico fue correcta");
                }
                else if (datos.resp == 250) {
                    toastr.error("No se pudo obtener Datos del biometrico fallo en la conexion");
                }
                else {
                  toastr.warning("el biometrico ya esta habilitado"); 
                }
            },error:function(){
              toastr.error(" no se pudo realizar proceso");
            }
        });
    }

    function importarBiometric(id, puerto){
        var nombre = $("#nombre").val();
        var lugar = $("#lugar").val();
        var ip = id;
          console.log(id, puerto);
          console.log(nombre,lugar);
          console.log('se guardara biometrico');
        var url="{{url("rrhh/bioconectDatosBiometrico")}}";
        $.ajax({
            type:'GET',
            url:url,
            data:{'ip': ip, 'puerto': puerto, 'nombre': nombre, 'lugar': lugar},
            //dataType: 'json',
            success:function(datos){
                if(datos.resp==200){
                    toastr.success("la importacion y guardado de datos del biometrico fue correcta");
                }
                else if (datos.resp==2000){
                    toastr.success("es el primer biometrico con la importacion y guardado exitosa");
                }
                else {
                    toastr.error(" ya esta registrado el biometrico");
                }
            }
        });

        $(".create-modal-sm").modal("hide");
        $("#nombre").val('');
        $("#lugar").val('');  
    }
    
    function importarAsis(id, puerto){
        console.log(id, puerto);
        var ip = id;
        var puerto = puerto;
        console.log(ip);
        var url="{{url("rrhh/bioconectImport")}}";
        $.ajax({
            type:'GET',
            url:url,
            data:{'ip': ip, 'puerto': puerto},
            //dataType: 'json',
            beforeSend: function () {
              $("#carga").show();
            },
            success:function(datos){
                if(datos.resp==200){
                    toastr.success("importacion de asitencias correcta del biometrico");
                    $("#carga").hide();
                }
                else if (datos.resp==2000){
                  toastr.warning("no hay asistencias para importar");
                  $("#carga").hide();
                }
                else{
                  toastr.error("no cumple las horas requeridas");
                  $("#carga").hide();
                }
            }
        });
    }

    function eliminar(id, ip, puerto){
      console.log(id,ip, puerto);
      var p=puerto;
      console.log(p);
        var url="{{url("rrhh/bioconectDelete")}}";
        var bool=confirm("esta seguro de eliminar este horario? "+id);
            if(bool){
              $.ajax({
                  type:'GET',
                  url:url,
                  data:{id, ip, 'p': p},
                  //dataType: 'json',
                  success:function(datos){
                      if(datos.resp==200){
                          toastr.success("la eliminacion fue realizada con exito");
                          $('#renderUser').html(datos.view);
                      }
                      else{
                        toastr.error("no se realizo el proceso de eliminar");
                      }
                  }
              });
            }
    }

    function nuevoUsuario(id, puerto){
      console.log(id, puerto);
      var ip = id;
      var puerto = puerto;
      var uid = $("#uid").val();
      var userid = $("#userid").val();
      var name = $("#name").val();
      var role = $("#role").val();
      var password = $("#password").val();
      var cardno =$('#cardno').val();
      console.log(uid, password, role);
        var url="{{url("rrhh/bioconectAgregarUsuario")}}";
        $.ajax({
            type:'GET',
            url:url,
            data:{'ip': ip, 'puerto': puerto, 'uid':uid, 'userid':userid, 'name': name, 'role':role, 'password':password, 'cardno':cardno},
            //dataType: 'json',
            success:function(datos){
                if(datos.resp==200){
                    toastr.success("se registro correctamente el usuario al biometrico");
                    $('#renderUser').html(datos.view);
                }
                else if(datos.resp==250){
                  toastr.error("ya esta registrado el usuario");
                }
                else {
                  toastr.error("usuario no existe en la db comunicarse con el administrador"); 
                }
              $('#modaluseragregar').modal('hide');
              $("#uid").val("");
              $("#userid").val("");
              $("#name").val("");
              $("#role").val("");
              $("#password").val("");
              $('#cardno').val(0);
              
            }
        });
    }

    // function importarDatosBiometrico(id, puerto){
    //     console.log(id, puerto);
    //     var ip = id;
    //     var puerto = puerto;
    //     console.log(ip);
    //     var url="{{url("rrhh/bioconectDatosBiometrico")}}";
    //     $.ajax({
    //         type:'GET',
    //         url:url,
    //         data:{'ip': ip, 'puerto': puerto},
    //         //dataType: 'json',
    //         success:function(datos){
    //             if(datos.resp==200){
    //                 toastr.success("importacion de asitencias correcta del biometrico");
    //             }
    //         }
    //     });
    // }

</script> 
<script type="text/javascript">
  // $('#tipo').click(function() {
  //   alert('enviando');
  //   $.ajax({
  //     url: 'general-asistencias-tipo.blade.php,?var=}}',
  //     success: function(data){
  //       alert('el servidor devolvio"'+data+'"');
  //     }
  //   })
  // }); 
  //document.getElementById("type").value = valor;

  $(document).on('click','#asistencias',function(e){
    var id_e = {{$id_e}};
    $.ajax({
      type:'GET',
      url:URL_BASE+'/openmodal2',
      data:{id_e},
      success:function(xhr){
        $(".generalAsistencias").html(xhr.view);
        $(".generalAsistencias").modal("show");
      },error:function(){
        toastr.error(" no se mando valor");
      }
    });
  });

  $(document).on('click','#biometricos',function(e){
    //var dato = datos;
    $.ajax({
      type:'GET',
      url:URL_BASE+'/openmodal3',
      //data:{dato},
      success:function(xhr){
        $(".generalBiometricos").html(xhr.view);
        $(".generalBiometricos").modal("show");
      },error:function(){
        toastr.error(" no se mando valor");
      }
    });
  });

</script>
<script type="text/javascript">

    $(document).on("click", ".pagination a", function(e) {
        e.preventDefault();
        var id_e = {{$id_e}};
        var ip = `{{$ip}}`;
        var puerto = {{$puerto}};
        //`${datos.id}`
        // var _thisVar = $input.val();
        console.log(id_e, ip, puerto);
        //var urlPag_Now = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1]
        $.ajax({
            type:'GET',
            url: "paginacionasistenciasbiometrico?page="+page,
            data:{id_e, ip, puerto},
            success: function(xhr_JsX) {
                
              $('#renderasisbiometrico').html(xhr_JsX.list_asistenciasbiometrico);
                
            }
        });
    });

    $(document).on("click", ".pagination a", function(e) {
        e.preventDefault();
        var id_e = {{$id_e}};
        var ip = `{{$ip}}`;
        var puerto = {{$puerto}};
        //`${datos.id}`
        // var _thisVar = $input.val();
        console.log(id_e, ip, puerto);
        //var urlPag_Now = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1]
        $.ajax({
            type:'GET',
            url: "paginacionusersbiometrico?page="+page,
            data:{id_e, ip, puerto},
            success: function(xhr_JsX) {                
              $('#renderUser').html(xhr_JsX.list_usuariosbiometrico);
                
            }
        });
    });

    var datos;
    function mandarValor(valor){
      datos = $(valor).val();
      $("#dato").val(datos);
    }

    $(document).on('click','#tipo',function(e){
      var dato = datos;
      var id_e = {{$id_e}};
      $.ajax({
        type:'GET',
        url:URL_BASE+'/openmodal',
        data:{dato, id_e},
        success:function(xhr){
          $("#aqui").html(xhr.view);
          $(".generalAsistenciasTipo").modal("show");
        },error:function(){
          toastr.error(" no se mando valor");
        }
      });
    });

    $(document).on("click", ".pagination a", function(e) {
      e.preventDefault();
      var dato = datos;
      var id_e = {{$id_e}};
      //`${datos.id}`
      // var _thisVar = $input.val();
      console.log(id_e, dato);
      //var urlPag_Now = $(this).attr('href');
      var page = $(this).attr('href').split('page=')[1]
      $.ajax({
          type:'GET',
          url: "paginacionpruebamodal?page="+page,
          data:{id_e, dato},
          success: function(xhr) {                
            $("#aqui").html(xhr.view); 
          }
      });
    });

  $(document).on("click", ".pagination a", function(e) {
    e.preventDefault();
    var id_e = {{$id_e}};
    console.log(id_e);
    //var urlPag_Now = $(this).attr('href');
    var page = $(this).attr('href').split('page=')[1]
    $.ajax({
        type:'GET',
        url: "paginacionpruebamodal2?page="+page,
        data:{id_e},
        success: function(xhr) {                
          $("#renderaa").html(xhr.view);
            
        }
    });
  });
</script>

  
