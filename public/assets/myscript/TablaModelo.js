function aBuscar(table,este)
{
    var tableReg = document.getElementById(table);
    var searchText =$(este).val().toLowerCase();
    var cellsOfRow="";
    var found=false;
    var compareWith="";
    for (var i = 1; i < tableReg.rows.length; i++)
    {
        cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
        found = false;
        for (var j = 0; j < cellsOfRow.length && !found; j++)
        {
            compareWith = cellsOfRow[j].innerHTML.toLowerCase();
            if(compareWith[0]!='<'){
            if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
            {
                found = true;
            }
            }
        }
        if(found)
        {
            tableReg.rows[i].style.display = '';
        } else {
            tableReg.rows[i].style.display = 'none';
        }
    }
}
function ModeloTable(options){
    var html='<div class="panel panel-default" style="box-shadow: 10px 10px #999;">';
    if(options.background!=undefined){
        html+='<div class="panel-body" ';
        html+='style="background:'+options.background+';" id="mypanel-body" >';
    }else{
        html+='<div class="panel-body" style="background:#53cec7;" id="mypanel-body" >';
    }
    if(options.headhtml!=undefined){
        html+=options.headhtml;
    }
    if(options.head._id != undefined){
        html+='<label style="color: #000;">Buscar:</label> <input class="buscador" type="text" onkeyup="aBuscar(\''+options.head._id+'\',this)" />';
    }else{
        html+='<label style="color: #000;">Buscar:</label> <input class="buscador" type="text" onkeyup="aBuscar(\'table-body\',this)" />';
    }

    html+='<div class="row">';
    html+='<div class="col-xs-12">';

    if(options.head.height!=undefined){
        html+='<div style="height:'+options.head.height+'px;overflow:hidden;margin-right:15px;" id="div-head">';
    }else{
        html+='<div style="height:35px;overflow:hidden;margin-right:15px;" id="div-head">';
    }

    html+='<table id="table-head" style="width:100%;border:1px solid;">';
    if(options.head.background!=undefined){
        html+='<thead style="background:';
        html+=options.head.background+';" id="table-head-thead">';
    }else{
        html+='<thead style="background:#0e2f44;" id="table-head-thead">';
    }
    if(options.head.color!=undefined){
        html+='<tr style="color:'+options.head.color+';';
    }else{
        html+='<tr style="color: white;';
    }

    if(options.head.height!=undefined){
        html+='height:'+options.head.height+'px" id="table-head-thead-tr">';
    }else{
        html+='height:35px" id="table-head-thead-tr">';
    }

    if(options.head!=undefined && options.head.widths!=undefined && options.head.titles!=undefined){
        for (var i = 0; i <options.head.titles.length; i++) {
            html+='<th width="';
            html+=options.head.widths[i];
            html+='%" style="text-align:center;border:1px solid;">';
            html+=options.head.titles[i];
            html+='</th>';
        };
    }
    html+='</tr>';
    html+='</thead>';
    html+='</table>';
    html+='</div>';
    if(options.height!=undefined){
        html+='<div style="';
        html+='height:';
        html+=options.height+"px;";
        html+='overflow-y:scroll;background:#fcf9f9;" class="table-responsive" id="div-body">';
    }else{
        html+='<div style="height:250px;overflow-y:scroll;background:#fcf9f9;" class="table-responsive" id="div-body">';
    }
    if(options.head._id != undefined){
        html+='<table class="table-bordered" id="'+options.head._id+'" style="width:100%">';
    }else{
        html+='<table class="table-bordered" id="table-body" style="width:100%">';
    }
    html+='<thead style="font-size:1px;line-height:1px;color:#fff" id="table-body-thead">';
    html+='<tr>';
    if(options.head!=undefined && options.head.widths!=undefined && options.head.titles!=undefined){
        for (var i = 0; i <options.head.titles.length; i++) {
            html+='<th width="';
            html+=options.head.widths[i];
            html+='%" style="text-align:center;">';
            html+=options.head.titles[i];
            html+='</th>';
        };
    }

    html+='</tr>';
    html+='</thead>';
    html+='<tbody id="table-body-tbody">';
    if(options.contents.list!=undefined){
        for(i=0;i<options.contents.list.length;i++){
            if(options.contents.addrow[i]!=undefined){
                html+='<tr '+options.contents.addrow[i]+'>';
            }else{
                html+='<tr>';
            }
            options.contents.list[i].forEach(function(d){
                html+="<td>";
                html+=d;
                html+="</td>";
            });
            html+='</tr>';
        }
    }
    html+='</tbody>';
    html+='</table>';
    html+='</div>';
    html+='</div>';
    html+='</div>';
    if(options.foothtml!=undefined){
        html+=options.foothtml;
    }
    html+='</div>';
    html+='</div>';
    return html;
}
$(document).ready(function(){

});
