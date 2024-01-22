function dataCompilet(token,ordeData,codmat,$this){
  $.ajax({
      type: 'GET',
      url:URL_BASE+'/historyarticle',
      data:{
        '_token':token,
        'ordeData':ordeData,
        'codmat':codmat
      },
      cache: false,
      beforeSend:function(){
        $this.button('loading')
      },
      success:function(data){
          var dataList=data.deta_Or_ped;
          $('#modalListArticle').modal('show');
          if (dataList.length == 0) {
            var tableList=`<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inexistencia" >
                <div class="panel panel-default panelinex" style="margin-top: 20px;">
                   <div class="panel-body">
                      <h3 style="text-align: center;">NO EXISTE PEDIDO DEL ARTÍCULO</h3>
                   </div>
                </div>
              </div>`;
          }else{
            var tableList=`
              <div class="table-responsive">
                 <table class="table_mood">
                  <thead>
                    <tr>
                      <th>Artículo</th>
                      <th>Cantidad entregada</th>
                      <th>Fecha de entrega</th>
                    </tr>
                  </thead>
                  <tbody>`;
            $.each(dataList,function(key,value){
              var newDateiso=dateComplet(new Date(value.updated_at).getDate(),new Date(value.updated_at).getMonth(),new Date(value.updated_at).getFullYear());
              tableList+=`  
                <tr>
                  <td>${value.descripcion}</td>
                  <td><span class="badge badge-success">${value.cant_entreg}</span></td>
                  <td><span class="badge badge-info ">${newDateiso}</span></td>
                </tr>
                `;
              
            });
            tableList+=`</tbody></table></div>`;
          }
          $('#HistARtOrd').html(tableList)
          $this.button('reset')
      },
      error:function(err){
        $this.button('reset')
      }
    });
}
function dateComplet(dd,mm,yyyy){
  return (dd.toString()).padStart(2,'0')+'/'+(mm.toString()).padStart(2,'0')+'/'+yyyy;
}