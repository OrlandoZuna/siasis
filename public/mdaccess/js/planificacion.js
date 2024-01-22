
  function verificacion(este){
    var respuesta=document.getElementById("respuesta").value;
    var mifi=document.getElementById('firma').value;
    var token ='{{csrf_token()}}';
      $.ajax({
        url:URL_BASE + "/firmare",
        type:"GET",
        headers: {
          'X-CSRF_TOKEN': token
        },
        data:{
          '_token': token,
          'id':mifi,
          'res':respuesta,
        },
        success: function(data) {
          $("#comparar").val(data);
          if(data =='si')
          {
            document.getElementById('save_info').disabled = false;
          }else{
            document.getElementById('save_info').disabled = true;
          }
        }
      });
  }
  function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;
  }

  $(function(){

    $('.validanumericos').keypress(function(e) {
    if(isNaN(this.value + String.fromCharCode(e.charCode)))
       return false;
    })
    .on("cut copy paste",function(e){
    e.preventDefault();
    });
    $(".data_de > tr").each(function(index) {
      if(isNaN(this.value + String.fromCharCode(e.charCode)))
      return false;
      })
      .on("cut copy paste",function(e){
      e.preventDefault();
    });
  });
  $(document).on('click', '#crear_form', function() {
    $("#list_sol").css("display","none");
    $("#form_create").css("display","block");
  });
  $(document).on('click', '#cerrar_form', function(){
    location.reload(true);
  })

  function sumarTotal(){
    var suma=0;
    $(".data_de > tr").each(function(index) {
      a = $(this).find('.importe1').val();
      if(a!=undefined ){
        suma += parseInt(a);
      }
    });
    document.getElementById("total_De").value = suma;
  }
  $(document).on('click', '#refreshde', function (event) {
    var suma=0;
    $(".data_de > tr").each(function(index) {
      a = $(this).find('.importe1').val();
      if(a!=undefined ){
        suma += parseInt(a);
      }
      if(isNaN(a))
      {
        toastr.warning("asegurese de llenar lo campos que agrego");
      }
    });
    document.getElementById("total_De").value = suma;
  });
  function sumarTotala(){
    var suma=0;
    $(".data_a > tr").each(function(index) {
      a = $(this).find('.importe2').val();
      if(a!=undefined ){
        suma += parseInt(a);
      }
    });
    document.getElementById("total_A").value = suma;
  }
  $(document).on('click', '#refresha', function (event) {

    var suma=0;
    $(".data_a > tr").each(function(index) {
      a = $(this).find('.importe2').val();
      if(a!=undefined ){

        suma += parseInt(a);
      }
      if(isNaN(a))
      {
        toastr.warning("asegurese de llenar lo campos que agrego");
      }
    });
    document.getElementById("total_A").value = suma;
  });
  $(document).on('click','#save_info',function(e){
    e.preventDefault();
    var catprgde=[];
    var ftede=[];
    var orgde=[];
    var partidade=[];
    var nombrede=[];
    var importede=[];
    var importotalde=$('#total_De').val();
    var catprga=[];
    var ftea=[];
    var orga=[];
    var partidaa=[];
    var nombrea=[];
    var importea=[];
    var importetotala=$('#total_A').val();
    var token = $('input[name=_token]').val();
    var justificacion =$('#justifi_obj').val();
    var firmado =$('#firma').val();

    $(".data_de > tr").each(function(index) {
      type = $(this).find('.catprg1').val();
      if(type!=undefined ){
        catprgde.push(type);
      }
    });
    $(".data_de > tr").each(function(index) {
      type = $(this).find('.fte1').val();
      if(type!=undefined ){
        ftede.push(type);
      }
    });
    $(".data_de > tr").each(function(index) {
      type = $(this).find('.org1').val();
      if(type!=undefined ){
        orgde.push(type);
      }
    });
    $(".data_de > tr").each(function(index) {
      type = $(this).find('.partida1').val();
      if(type!=undefined ){
        partidade.push(type);
      }
    });
    $(".data_de > tr").each(function(index) {
      type = $(this).find('.nombre1').val();
      if(type!=undefined ){
        nombrede.push(type);
      }
    });
    $(".data_de > tr").each(function(index) {
      type = $(this).find('.importe1').val();
      if(type!=undefined ){
        importede.push(type);
      }
    });
    $(".data_a > tr").each(function(index) {
      type = $(this).find('.catprg2').val();
      if(type!=undefined ){
        catprga.push(type);
      }
    });
    $(".data_a > tr").each(function(index) {
      type = $(this).find('.fte2').val();
      if(type!=undefined ){
        ftea.push(type);
      }
    });
    $(".data_a > tr").each(function(index) {
      type = $(this).find('.org2').val();
      if(type!=undefined ){
        orga.push(type);
      }
    });
    $(".data_a > tr").each(function(index) {
      type = $(this).find('.partida2').val();
      if(type!=undefined ){
        partidaa.push(type);
      }
    });
    $(".data_a > tr").each(function(index) {
      type = $(this).find('.nombre2').val();
      if(type!=undefined ){
        nombrea.push(type);
      }
    });
    $(".data_a > tr").each(function(index) {
      type = $(this).find('.importe2').val();
      if(type!=undefined ){
        importea.push(type);
      }
    });
      if(justificacion == ""){
        var just = document.getElementById('justifi_obj');
        just.style.backgroundColor = '#F28068';
      }else{
        if(importotalde === ""){
          toastr.warning("Agregue datos a la tabla De Donde");
          var rendtb = document.getElementById('tab_vali');
          rendtb.style.backgroundColor = '#F28068';
        }else{
          if(importotalde == 0)
          {
            toastr.warning("Agregue datos a la tabla De Donde");
            var rendtb = document.getElementById('tab_vali');
            rendtb.style.backgroundColor = '#F28068';
          }else{
            if(importetotala === ""){
              toastr.warning("Agregue datos a la tabla A Donde");
              var rendtb = document.getElementById('tab_vali_a');
              rendtb.style.backgroundColor = '#F28068';
            }else{
              if(importetotala == 0)
              {
                console.log('no debe ser cero la modificacion')
              }else{
                var equal=importotalde===importetotala;
                if( equal == false){
                  toastr.error("los importes deben ser exactamente iguales");
                }else{
                  $.ajax({
                    type: 'POST',
                    url: URL_BASE+'/postsomopre',
                    headers:{'X-CSRF_TOKEN':token},
                    data: {
                      '_token':token,
                      'catprgde':catprgde,
                      'ftede':ftede,
                      'orgde':orgde,
                      'partidade':partidade,
                      'nombrede':nombrede,
                      'importede':importede,
                      'importotalde':importotalde,
                      'catprga':catprga,
                      'ftea':ftea,
                      'orga':orga,
                      'partidaa':partidaa,
                      'nombrea':nombrea,
                      'importea':importea,
                      'importotala':importetotala,
                      'justificacion':justificacion,
                      'firmado':firmado,
                    },
                    success: function(data){
                      location.reload();
                      toastr.success('',data.resp,{timeout:6000});

                    },
                    error:function(err){
                      var ListPedSols= new Array();
                      $.each(err.responseJSON.errors, function (key, value) {
                        if (key.indexOf('.') != -1) {
                          var valueKey=key.indexOf('.');
                          var totalValue=key.length;//7
                          var valorValidate=key.substring(0,valueKey);//class='ftede'
                          var valorPosition=parseInt(key.substring((parseInt(valueKey)+1),totalValue))+1;//posicion del input

                          console.log(valorPosition);
                          var quantityValue=$('#response1').children('tr:nth-child('+valorPosition+')').children('td:nth-child(7)').children('span').html('<span style="font-weight: bold;color: #EB3E32;font-size:9px;">'+value+'</span>');
                          console.log(quantityValue);
                        }
                      }
                    )}
                  });
                }
              }
            }
          }
        }
      }
  });
  $(document).on('click','.verRSol',function(){
    $("#list_sol1").css("display","none");
    $("#ver_solicitud").css("display","block");
    var token ='{{csrf_token()}}';
    var idesol= $(this).data('ifgd');
    console.log(idesol);
    $.ajax({
      url: URL_BASE + '/getsolverp',
      type: 'GET',
      headers: {
        'X-CSRF_TOKEN': token
      },
      data: {
        '_token': token,
        'id_sol': idesol,
      },
      success: function(data) {
        $('#returnviewsoli').html(data);
      }
    });
  });
  $(document).on('click','.editRSol',function(){
    $("#list_sol1").css("display","none");
    $("#edit_solicitud").css("display","block");
    var token ='{{csrf_token()}}';
    var idesol= $(this).data('ifftg');
    console.log(idesol);
    $.ajax({
      url: URL_BASE + '/getsoleditp',
      type: 'GET',
      headers: {
        'X-CSRF_TOKEN': token
      },
      data: {
        '_token': token,
        'id_sol': idesol,
      },
      success: function(data) {
        $('#returneditsoli').html(data);
      }
    });
  });

  $(document).on('click', '.elimbtne', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
  });
  function sumarTotalaedit(){
    var suma=0;
    $(".data_de_edit > tr").each(function(index) {
      a = $(this).find('.importe3').val();
      if(a!=undefined ){
        suma += parseInt(a);
      }
    });
    document.getElementById("total_De_edit").value = suma;
  }
  $(document).on('click', '#refreshdeedit', function (event) {
    var suma=0;
    $(".data_de_edit > tr").each(function(index) {
      a = $(this).find('.importe3').val();
      if(a!=undefined ){
        suma += parseInt(a);
      }
      if(isNaN(a))
      {
        toastr.warning("asegurese de llenar lo campos que agrego");
      }
    });
    document.getElementById("total_De_edit").value = suma;
  });

  function sumarTotalaeadit(){
    var suma=0;
    $(".data_a_edit > tr").each(function(index) {
      a = $(this).find('.importe4').val();
      if(a!=undefined ){
        suma += parseInt(a);
      }
    });
    document.getElementById("total_A_edit").value = suma;
  }
  $(document).on('click', '#refreshaedit', function (event) {
    var suma=0;
    $(".data_a_edit > tr").each(function(index) {
      a = $(this).find('.importe4').val();
      if(a!=undefined ){
        suma += parseInt(a);
      }
      if(isNaN(a))
      {
        toastr.warning("asegurese de llenar lo campos que agrego");
      }
    });
    document.getElementById("total_A_edit").value = suma;
  });
  function verificacionedit(este){
    var respuesta=document.getElementById("respuestaedit").value;
    var mifi=document.getElementById('firma').value;
    var token ='{{csrf_token()}}';
      $.ajax({
        url:URL_BASE + "/firmare",
        type:"GET",
        headers: {
          'X-CSRF_TOKEN': token
        },
        data:{
          '_token': token,
          'id':mifi,
          'res':respuesta,
        },
        success: function(data) {
          $("#comparar").val(data);
          if(data =='si')
          {
            document.getElementById('edit_info').disabled = false;
          }else{
            document.getElementById('edit_info').disabled = true;
          }
        }
      });
  }
  $(document).on('click','#edit_info',function(e){
    e.preventDefault();
    var catprgde_e=[];
    var ftede_e=[];
    var orgde_e=[];
    var partidade_e=[];
    var nombrede_e=[];
    var importede_e=[];
    var importotalde_e=$('#total_De_edit').val();

    var catprga_e=[];
    var ftea_e=[];
    var orga_e=[];
    var partidaa_e=[];
    var nombrea_e=[];
    var importea_e=[];
    var idfind = $('#idfind').val();
    var importetotala_e=$('#total_A_edit').val();
    var token = $('input[name=_token]').val();
    var objeto_e = $('#form_edit_obj').val();
    var justificacion_e =$('#justifi_edit').val();
    var firmado =$('#firma').val();

    $(".data_de_edit > tr").each(function(index) {
      type = $(this).find('.catprg3').val();
      if(type!=undefined ){
        catprgde_e.push(type);
      }
    });
    $(".data_de_edit > tr").each(function(index) {
      type = $(this).find('.fte3').val();
      if(type!=undefined ){
        ftede_e.push(type);
      }
    });
    $(".data_de_edit > tr").each(function(index) {
      type = $(this).find('.org3').val();
      if(type!=undefined ){
        orgde_e.push(type);
      }
    });
    $(".data_de_edit > tr").each(function(index) {
      type = $(this).find('.partida3').val();
      if(type!=undefined ){
        partidade_e.push(type);
      }
    });
    $(".data_de_edit > tr").each(function(index) {
      type = $(this).find('.nombre3').val();
      if(type!=undefined ){
        nombrede_e.push(type);
      }
    });
    $(".data_de_edit > tr").each(function(index) {
      type = $(this).find('.importe3').val();
      if(type!=undefined ){
        importede_e.push(type);
      }
    });
    $(".data_a_edit > tr").each(function(index) {
      type = $(this).find('.catprg4').val();
      if(type!=undefined ){
        catprga_e.push(type);
      }
    });
    $(".data_a_edit > tr").each(function(index) {
      type = $(this).find('.fte4').val();
      if(type!=undefined ){
        ftea_e.push(type);
      }
    });
    $(".data_a_edit > tr").each(function(index) {
      type = $(this).find('.org4').val();
      if(type!=undefined ){
        orga_e.push(type);
      }
    });
    $(".data_a_edit > tr").each(function(index) {
      type = $(this).find('.partida4').val();
      if(type!=undefined ){
        partidaa_e.push(type);
      }
    });
    $(".data_a_edit > tr").each(function(index) {
      type = $(this).find('.nombre4').val();
      if(type!=undefined ){
        nombrea_e.push(type);
      }
    });
    $(".data_a_edit > tr").each(function(index) {
      type = $(this).find('.importe4').val();
      if(type!=undefined ){
        importea_e.push(type);
      }
    });
    if(objeto_e === "" )
    {
      var rend = document.getElementById('form_edit_obj');
      rend.style.backgroundColor = '#F28068';

    }else{
      if(justificacion_e == ""){
        var just = document.getElementById('justifi_edit');
        just.style.backgroundColor = '#F28068';
      }else{
        if(importotalde_e === ""){
          toastr.warning("Agregue datos a la tabla De Donde");
          var rendtb = document.getElementById('tab_vali_e');
          rendtb.style.backgroundColor = '#F28068';
        }else{
          if(importotalde_e == 0)
          {
            toastr.warning("Agregue datos a la tabla De Donde");
            var rendtb = document.getElementById('tab_vali_e');
            rendtb.style.backgroundColor = '#F28068';
          }else{
            if(importetotala_e === ""){
              toastr.warning("Agregue datos a la tabla A Donde");
              var rendtb = document.getElementById('tab_vali_a_e');
              rendtb.style.backgroundColor = '#F28068';
            }else{
              if(importetotala_e == 0)
              {
                console.log('no debe ser cero la modificacion')
              }else{
                var equal=importotalde_e===importetotala_e;
                if( equal == false){
                  toastr.error("los importes deben ser exactamente iguales");
                }else{
                  $.ajax({
                    type: 'PUT',
                    url: URL_BASE+'/putsomopre',
                    headers:{'X-CSRF_TOKEN':token},
                    data: {
                      '_token':token,
                      'idfind':idfind,
                      'objeto':objeto_e,
                      'catprgde':catprgde_e,
                      'ftede':ftede_e,
                      'orgde':orgde_e,
                      'partidade':partidade_e,
                      'nombrede':nombrede_e,
                      'importede':importede_e,
                      'importotalde':importotalde_e,
                      'catprga':catprga_e,
                      'ftea':ftea_e,
                      'orga':orga_e,
                      'partidaa':partidaa_e,
                      'nombrea':nombrea_e,
                      'importea':importea_e,
                      'importotala':importotalde_e,
                      'justificacion':justificacion_e,
                      'firmado':firmado,
                    },
                    success: function(data){
                      //console.log(data);
                      location.reload();
                      toastr.success('',data.resp,{timeout:6000});

                    },
                    error:function(err){
                      var ListPedSols= new Array();
                      $.each(err.responseJSON.errors, function (key, value) {
                        if (key.indexOf('.') != -1) {
                          var valueKey=key.indexOf('.');
                          var totalValue=key.length;//7
                          var valorValidate=key.substring(0,valueKey);//class='ftede'
                          var valorPosition=parseInt(key.substring((parseInt(valueKey)+1),totalValue))+1;//posicion del input

                          console.log(valorPosition);
                          var quantityValue=$('#response1').children('tr:nth-child('+valorPosition+')').children('td:nth-child(7)').children('span').html('<span style="font-weight: bold;color: #EB3E32;font-size:9px;">'+value+'</span>');
                          console.log(quantityValue);
                        }
                      }
                    )}
                  });
                }
              }
            }
          }
        }
      }
    }
  });
  $(document).on('click','#anular',function(){
    $("#idaunalr").val($(this).data('iad'));
    $(".anulard-modal-md").modal("show");
  });
  function verificacionaunlar(este){
    var respuesta=document.getElementById("respuestaedit").value;
    var mifi=document.getElementById('firma').value;
    var token ='{{csrf_token()}}';
      $.ajax({
        url:URL_BASE + "/firmare",
        type:"GET",
        headers: {
          'X-CSRF_TOKEN': token
        },
        data:{
          '_token': token,
          'id':mifi,
          'res':respuesta,
        },
        success: function(data) {
          $("#comparar").val(data);
          if(data =='si')
          {
            document.getElementById('anular_data').disabled = false;
          }else{
            document.getElementById('anular_data').disabled = true;
          }
        }
      });
  }
  $(document).on('click','#anular_data',function(){
    var idan = $('#idaunalr').val();
    var token = $('input[name=_token]').val();
    var firmador=document.getElementById("firma").value;
    $.ajax({
      type: 'PUT',
      url: URL_BASE+'/anularsomopre',
      headers:{'X-CSRF_TOKEN':token},
      data: {
        '_token':token,
        'id':idan,
        'firmado':firmador,
      },success: function(data){
        location.reload();
        toastr.info('',data.resp,{timeout:6000});
      }
    })
  });
  $(document).on('click','.imprimir_rpt',function(){
    var irtp=$(this).data('irtp');
    var token = $('input[name=_token]').val();
    var link = document.createElement('a');
    $.ajax({
      type: 'get',
      url: URL_BASE+'/prints',
      headers:{'X-CSRF_TOKEN':token},
      data: {
        '_token':token,
        'id':irtp,
      },success: function(data){
        var get=URL_BASE+'/'+data;
        window.open(get, 'download_window');
        window.focus();
      }
    })
  });
  $(document).on('click','#imprimir_rpt',function(){
    var irtp=$(this).data('irtp');
    var token = $('input[name=_token]').val();
    var link = document.createElement('a');
    $.ajax({
      type: 'get',
      url: URL_BASE+'/prints',
      headers:{'X-CSRF_TOKEN':token},
      data: {
        '_token':token,
        'id':irtp,
      },success: function(data){
        console.log(data)
        //var get=URL_BASE+'/'+data;
        //window.open(get, 'download_window');
        //window.focus();
      }
    })
  });


