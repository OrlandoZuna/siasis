$(document).on("click",".columni",function(){
    var columna=$(this).data("column");
    if($(this).prop("checked")){
        $("."+columna).each(function(val,element){
            $(element).css("background","#ff0000");
            $(element).data("status",1);
            $(this).find("input").attr("disabled",false);
        });    
    }
    else{
        $("."+columna).each(function(val,element){
            $(element).css("background","");
            $(element).data("status",0);
            $(this).find("input").attr("disabled",true);
        }); 
    }
    
});
var clicking = false;
var pintar = false;
$(document).on("mousedown",".ytd",function(){
    clicking = true;
    if($(this).data("status")!=0){
        $(this).css("background","");
        $(this).data("status",0);
        $(this).find("input").attr("disabled",true);
        pintar = false;
    }else{
        $(this).css("background","#ff0000");
        $(this).data("status",1);
        $(this).find("input").attr("disabled",false);
        pintar = true;
    }
});
$(document).mouseup(function(){
    clicking = false;
});
$(document).on("mouseover",".ytd",function(){
    if(clicking === false) return;
    
    if(pintar){
        $(this).css("background","#ff0000");
        $(this).data("status",1);
        $(this).find("input").attr("disabled",false);
    }else{
        $(this).css("background","");
        $(this).data("status",0);
        $(this).find("input").attr("disabled",true);
    }
        
});
$(document).on("hover",".ytd",function(){
    if($(this).data("status")!=0){
        $(this).css("background","");
        $(this).data("status",0);
        $(this).find("input").attr("disabled",true);
    }else{
        $(this).css("background","#ff0000");
        $(this).data("status",1);
        $(this).find("input").attr("disabled",false);
    }
});
function cambiar(){
    var meses=["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"]
    var dias=["Dom","Lun","Mar","Mie","Jue","Vie","Sab"]
    var fecha1 = moment($("#rango1").val());
    var fecha2 = moment($("#rango2").val());

    var html="<tr><td class='ytd' colspan='7'>&nbsp;</td></tr><tr>";
    j=0;
    for(;j<fecha1.day();j++){
        html+="<td class='ytds'></td>"
    }
    for(;fecha2.diff(fecha1,"days")>=0;j++){
        if(j%7==0){
            html+="</tr><tr>";    
        }
        var value=fecha1.format("YYYY-MM-DD");
        html+="<td class='ytd "+dias[j%7]+"' data-status='0'><input type='hidden' name='dias[]' value='" + value + "' disabled='disabled' />"+meses[fecha1.month()]+", "+fecha1.date()+"</td>";
        fecha1.add(1,"days");
    }
    for(;j%7!=0;j++){
        html+="<td></td>"
    }
    html+="</tr>";
    $("#tabla_turnos").html("");
    $("#tabla_turnos").append(html);   
}


var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    var diasSemana = new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
    var mesesAbre = new Array ("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
    var diasSemanaAbre = new Array("Dom","Lun","Mar","Mie","Jue","Vie","Sab");

    function getDaySpaAbr(date){
        return diasSemanaAbre[date.day()];
    }
    function getMonthSpaAbr(date){
        return mesesAbre[date.month()];
    }
    function getDaySpa(date){
        return diasSemana[date.day()];
    }
    function getMonthSpa(date){
        return meses[date.month()];
    }


    function shiftable(inicio,final,element,x,y){
    ancho=x;
    alto=y;
    var head="<tr style='min-heigth:55px'>";
    head+="<td style='background: #42b38b;width: 75px;'>Unidad</td><td><div id='contEncCol' style='overflow:hidden; overflow-y:scroll; background:#80e0be; width:"+ancho+"em'><table class='tabla' id='encCol'><tr>";
    var dia="";
    for(var i=0;i<24;i++){
        if(i<10){
            head+="<td>0"+i+":00hr</td>";
        }else{
            head+="<td>"+i+":00hr</td>";
        }

    }
    head+="</tr></table></div></td></tr> <tr><td><div id='contEncFil' style='overflow:hidden; overflow-x:scroll; background:#80e0be; height: "+alto+"em'><table id='encFil'>";
    var hourclass="";

    myDate=moment(inicio);
    myDate1=moment(final);
    auxdate=moment(inicio);
    auxdate2=moment(final);
    if(myDate1.diff(myDate,"days") >0){
        while(auxdate2.diff(auxdate,"days")>=0) {
            dia += "<tr><td style='height: 23px;width: 75px;font-size: 8px;font-style:bold'>" + getMonthSpaAbr(auxdate) + "-" + getDaySpaAbr(auxdate) + "-" + auxdate.date() + "</td></tr>";
            auxdate.add(1,"days");
        }
        head+=dia+"</table></div></td>";
        dia='<td><div id="contenedor" style="overflow:auto; width:'+ancho+'em; height:'+alto+'em" onscroll="desplaza()"><table class="tabla" id="contenido">';
        while(myDate1.diff(myDate,"days") >= 0){
            dia+="<tr>";
            for(var j=0;j<24;j++){
                dia+="<td><table height='20px'><tr>";
                for(var k=0;k<60;k=k+2){
                    var hourclass=myDate.format("YYYY-MM-DD");
                    hourclass += "hour"+j+"min"+k;

                    dia+="<td width='1px' onclick='returndataid(this)' data-inicio='0' data-fin='0' style='border:5px' data-id='0' id='"+hourclass+"'></td>";
                }
                dia+="</tr></table><div style='width:3.85em; height:0; position:relative; top:-1em; z-index:-1; border:1px solid red'></div></td>";
            }
            dia+="</tr>";
            myDate.add(1,"days");
        }

    }else{
        dia += "<tr><td style='height: 23px;width: 75px;font-size: 10px'>" +getMonthSpaAbr(myDate) + "-" + getDaySpaAbr(myDate) + "-" + myDate.getDate()+ "</td></tr>";
        head+=dia+"</table></div></td>";
        dia='<td><div id="contenedor" style="overflow:auto; width:'+ancho+'em; height:'+alto+'em" onscroll="desplaza()"><table class="tabla" id="contenido">';
        dia+="<tr>";
        for(var j=0;j<24;j++){
            dia+="<td><table height='20px'><tr>";
            for(var k=0;k<60;k=k+2){
                var hourclass=myDate.format("YYYY-MM-DD");
                    hourclass += "hour"+j+"min"+k;
                dia+="<td width='1px' onclick='returndataid(this)' data-id='0' data-inicio='0' data-fin='0' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
            }
            dia+="</tr></table><div style='width:3.85em; height:0; position:relative; top:-1em; z-index:-1; border:1px solid red'></div></td>";
        }
        dia+="</tr>";

    }
    head+=dia+'</table></div></td></tr>';
    document.getElementById(element).innerHTML=head;
}


function pushHour(houri,hourf,unit,color,__id__){
    var hi=houri.split(':');
    var hf=hourf.split(':');
    var id="";
    var bool=false;
    var hinicio=parseInt(hi[0]);
    var hfinal=parseInt(hf[0]);
    var minicio=parseInt(hi[1]);
    var mfinal=parseInt(hf[1]);
    var menor=minutos(houri);
    var mayor=minutos(hourf);

    if(menor<mayor){
        for(var i=hinicio;i<=hfinal;i++){
            for(var j=0;j<60;j++){
                if(hinicio==i && j== minicio){
                    bool=true;
                }
                if(hfinal==i && j== mfinal){
                    bool=false;
                }
                if(bool){
                    id=unit+"hour"+i+"min"+j;
                    if(document.getElementById(id)){
                        var mi=document.getElementById(id);
                        mi.style.backgroundColor=color;
                        mi.setAttribute('title',unit+": "+houri+" - "+hourf);
                        mi.dataset["id"]=__id__;
                        mi.dataset["inicio"]=houri;
                        mi.dataset["fin"]=hourf;
                    }
                }
            }

        }
    }
    else{
        for(var i=hinicio;i<=23;i++){
            for(var j=0;j<60;j++){
                if(hinicio==i && j== minicio){
                    bool=true;
                }
                if(bool){
                    id=unit+"hour"+i+"min"+j;
                    if(document.getElementById(id)) {
                        document.getElementById(id).style.backgroundColor = color;
                        document.getElementById(id).setAttribute('title', unit + ": " + houri + " - " + hourf);
                        document.getElementById(id).dataset["id"]=__id__;
                        document.getElementById(id).dataset["inicio"]=houri;
                        document.getElementById(id).dataset["fin"]=hourf;
                    }
                }
            }
        }
        var numero=0;
        var sep = unit.split('-');
        var myDate = new Date(sep[0], sep[1] - 1, sep[2]);
        myDate.setDate(myDate.getDate() + 1);
        for (var i = 0; i <= hfinal; i++) {
            for (var j = 0; j < 60; j++) {
                if (hfinal == i && j == mfinal) {
                    bool = false;
                }
                if (bool) {
                    var id="";
                    if(myDate.getDate()<10){
                        if((myDate.getMonth() + 1)<10){
                            id = myDate.getFullYear() + "-0" + (myDate.getMonth() + 1) + "-0" + myDate.getDate()+"hour"+i+"min"+j;
                        }else{
                            id = myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-0" + myDate.getDate()+"hour"+i+"min"+j;
                        }
                    }
                    else{
                        if((myDate.getMonth() + 1)<10){
                            id = myDate.getFullYear() + "-0" + (myDate.getMonth() + 1) + "-" + myDate.getDate()+"hour"+i+"min"+j;
                        }else{
                            id = myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate()+"hour"+i+"min"+j;
                        }
                    }
                    if(document.getElementById(id)) {
                        document.getElementById(id).style.backgroundColor = color;
                        document.getElementById(id).setAttribute('title', unit + ": " + houri + " - " + hourf);
                        document.getElementById(id).dataset["id"]=__id__;
                        document.getElementById(id).dataset["inicio"]=houri;
                        document.getElementById(id).dataset["fin"]=hourf;
                    }
                }
            }
        }
    }
}
function minutos(hour){
    var hi=hour.split(':');

    var hora=parseInt(hi[0]);
    var minutos=parseInt(hi[1]);

    var total=(hora*60)+minutos;
    return total;
}
var pasoH , pasoV;

function init(){
    celdas0 = document.getElementById("encCol").getElementsByTagName("td").length;
    celdas1 = document.getElementById("contenido").getElementsByTagName("td").length;

}

function desplaza(){
    pasoH = document.getElementById("contenedor").scrollLeft;
    pasoV = document.getElementById("contenedor").scrollTop;
    document.getElementById("contEncCol").scrollLeft = pasoH;
    document.getElementById("contEncFil").scrollTop = pasoV;
}
