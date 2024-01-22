var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var diasSemana = new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
var mesesAbre = new Array ("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
var diasSemanaAbre = new Array("Dom","Lun","Mar","Mie","Jue","Vie","Sab");

function getDaySpaAbr(date){
    return diasSemanaAbre[date.getDay()];
}
function getMonthSpaAbr(date){
    return mesesAbre[date.getMonth()];
}
function getDaySpa(date){
    return diasSemana[date.getDay()];
}
function getMonthSpa(date){
    return meses[date.getMonth()];
}
//.-------------------------------------------------------------------
function dias_llenar(unit,cant,element){
    var dia="";
    var id="";
    switch (unit) {
        case "Dia":
            for (var l = 0; l < cant; l++) {
                id = "Dia:" + (l + 1);
                dia += "<tr><td>" + id + "</td>";
                dia += "<td> <input type='checkbox' name='dias[]' value='" + id + "' checked/></td>"
                dia += "</tr>";
            }
            break;
        case "Semana":
            var week = ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
            for (var l = 0; l < cant; l++) {
                for (var i = 0; i < 7; i++) {
                    id = week[i] + ":" + (l + 1);
                    dia += "<tr><td>" + id + "</td>";
                    dia += "<td> <input type='checkbox' name='dias[]' value='" + id + "' checked/></td>"
                    dia += "</tr>";
                }
            }
            break;
        case "Mes":
            for (var l = 0; l < cant; l++) {
                for (var i = 0; i < 31; i++) {
                    id = "Mes:" + (l + 1) + "Dia:" + (i + 1);
                    dia += "<tr><td>" + id + "</td>";
                    dia += "<td> <input type='checkbox' name='dias[]' value='" + id + "' checked/></td>"
                    dia += "</tr>";
                }
            }
            break;
        case "fecha":
            var fechas = cant.split('*');
            var sep = fechas[0].split('-');
            var myDate1 = new Date(sep[0], sep[1] - 1, sep[2]);
            var sep2 = fechas[1].split('-');
            var myDate2 = new Date(sep2[0], sep2[1] - 1, sep2[2]);
            if (compareDate(myDate1, myDate2) == 1) {
                id = getMonthSpaAbr(myDate1) + "-" + getDaySpaAbr(myDate1) + "-" + myDate1.getDate();

                var value=value = myDate1.getFullYear() + "-" + (myDate1.getMonth() + 1) + "-" + myDate1.getDate();
                dia += "<tr><td>" + id + "</td>";
                dia += "<td> <input type='checkbox' name='dias[]' value='" + value + "' checked/></td>";
                dia += "</tr>";
            } else {
                while (compareDate(myDate1, myDate2) == -1 || compareDate(myDate1, myDate2) == 0) {
                    id = getMonthSpaAbr(myDate1) + "-" + getDaySpaAbr(myDate1) + "-" + myDate1.getDate();
                    var value = myDate1.getFullYear() + "-" + (myDate1.getMonth() + 1) + "-" + myDate1.getDate();
                    dia += "<tr><td>" + id + "</td>";
                    dia += "<td> <input type='checkbox' name='dias[]' value='" + value + "' checked/></td>"
                    dia += "</tr>";
                    myDate1.setDate(myDate1.getDate() + 1);
                }
            }
        break;
    }
    document.getElementById(element).innerHTML=dia;
}
function compareDate(date1,date2){
    if(date1.getYear()==date2.getYear()){
        if((date1.getMonth()+1)==(date2.getMonth()+1)){
            if(date1.getDate()==date2.getDate()){
                return 0;
            }else{
                if(date1.getDate()<date2.getDate()){
                    return -1;
                }else{
                    return 1;
                }
            }
        }else{
            if((date1.getMonth()+1)<(date2.getMonth()+1)){
                return -1;
            }else{
                return 1;
            }
        }
    }else{
        if(date1.getYear()<date2.getYear()){
            return -1;
        }else{
            return 1;
        }
    }
}

//martes:1hour:1min:30
/*<tr>
<td>Partida</td>
<td>
    <div id="contEncCol">
        <table class="tabla" id="encCol">
            <tr>
                <td>00:00hr</td><td>01:00hr</td>
            </tr>
        </table>
    </div>
</td>
</tr>*/
var ancho=38;
var alto=22;
function shiftable(unid,cant,element,x,y,__id__){
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
    switch (unid){
        case "Dia":
            for(var i=0;i<=cant;i++) {
                dia += "<tr><td height='50px' style='width: 75px;font-size: 19px'>" + unid + ":" + (i + 1) + "</td></tr>";
            }
            head+=dia+"</table></div></td>";
            dia='<td><div id="contenedor" style="overflow:auto; width:'+ancho+'em; height:'+alto+'em" onscroll="desplaza()"><table class="tabla" id= "contenido">';
            for(var i=0;i<=cant;i++){
                dia+="<tr>";
                for(var j=0;j<24;j++){
                    dia+="<td><table><tr>";
                    for(var k=0;k<60;k++){
                        hourclass="Dia:"+(i+1)+"hour"+j+"min"+k;
                        dia+="<td width='1px' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
                    }
                    dia+="</tr></table><img class='rell'></td>";
                }
                dia+="</tr>";
            }
            head+=dia+'</table></div></td></tr>';
            break;
        case "Semana":
            var week=["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];

            for(var l=0;l<cant;l++) {
                for (var i = 0; i < 7; i++) {
                    dia += "<tr><td height='50px' style='width: 75px;font-size: 19px'>" + week[i] + ":" + (l + 1) + "</td></tr>";
                }
            }
            head+=dia+"</table></div></td>";
            dia='<td><div id="contenedor" style="overflow:auto; width:'+ancho+'em; height:'+alto+'em" onscroll="desplaza()"><table class="tabla" id= "contenido">';
            for(var l=0;l<cant;l++){
                for(var i=0;i<7;i++){
                    dia+="<tr>";
                    for(var j=0;j<24;j++){
                        dia+="<td><table><tr>";
                        for(var k=0;k<60;k++){
                            hourclass=week[i]+":"+(l+1)+"hour"+j+"min"+k;
                            dia+="<td width='1px' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
                        }
                        dia+="</tr></table><img class='rell'></td>";
                    }
                    dia+="</tr>";
                }
            }
            head+=dia+'</table></div></td></tr>';
            break;
        case "fecha":
            var fechas=cant.split('*');

            var sep=fechas[0].split('-');
            var myDate = new Date(sep[0],sep[1]-1,sep[2]);
            var auxdate= new Date(sep[0],sep[1]-1,sep[2]);
            var sep2=fechas[1].split('-');
            var myDate1 = new Date(sep2[0],sep2[1]-1,sep2[2]);
            var auxdate2= new Date(sep2[0],sep2[1]-1,sep2[2]);
            if(compareDate(myDate,myDate1)==-1){
                while(compareDate(auxdate,auxdate2)==-1 || compareDate(auxdate,auxdate2)==0) {
                    dia += "<tr><td style='height: 23px;width: 75px;font-size: 8px;font-style:bold'>" + getMonthSpaAbr(auxdate) + "-" + getDaySpaAbr(auxdate) + "-" + auxdate.getDate() + "</td></tr>";
                    auxdate.setDate(auxdate.getDate()+1);
                }
                head+=dia+"</table></div></td>";
                dia='<td><div id="contenedor" style="overflow:auto; width:'+ancho+'em; height:'+alto+'em" onscroll="desplaza()"><table class="tabla" id="contenido">';
                while(compareDate(myDate,myDate1)==-1 || compareDate(myDate,myDate1)==0){
                    dia+="<tr>";
                    for(var j=0;j<24;j++){
                        dia+="<td><table height='20px'><tr>";
                        for(var k=0;k<60;k++){
                            hourclass="";
                            if(myDate.getDate()<10){
                                if((myDate.getMonth() + 1)<10){
                                    hourclass = myDate.getFullYear() + "-0" + (myDate.getMonth() + 1) + "-0" + myDate.getDate()+"hour"+j+"min"+k;
                                }else{
                                    hourclass = myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-0" + myDate.getDate()+"hour"+j+"min"+k;
                                }
                            }
                            else{
                                if((myDate.getMonth() + 1)<10){
                                    hourclass = myDate.getFullYear() + "-0" + (myDate.getMonth() + 1) + "-" + myDate.getDate()+"hour"+j+"min"+k;
                                }else{
                                    hourclass = myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate()+"hour"+j+"min"+k;
                                }
                            }
                            dia+="<td width='1px' onclick='returndataid(this)' style='border:5px' data-id='0' id='"+hourclass+"'></td>";
                        }
                        dia+="</tr></table><div style='width:3.85em; height:0; position:relative; top:-1em; z-index:-1; border:1px solid red'></div></td>";
                    }
                    dia+="</tr>";
                    myDate.setDate(myDate.getDate()+1);
                }

            }else{


                dia += "<tr><td style='height: 23px;width: 75px;font-size: 10px'>" +getMonthSpaAbr(myDate) + "-" + getDaySpaAbr(myDate) + "-" + myDate.getDate()+ "</td></tr>";
                head+=dia+"</table></div></td>";
                dia='<td><div id="contenedor" style="overflow:auto; width:'+ancho+'em; height:'+alto+'em" onscroll="desplaza()"><table class="tabla" id="contenido">';
                dia+="<tr>";
                for(var j=0;j<24;j++){
                    dia+="<td><table height='20px'><tr>";
                    for(var k=0;k<60;k++){
                        hourclass=myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate()+"hour"+j+"min"+k;
                        dia+="<td width='1px' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
                    }
                    dia+="</tr></table><div style='width:3.85em; height:0; position:relative; top:-1em; z-index:-1; border:1px solid red'></div></td>";
                }
                dia+="</tr>";

            }
            head+=dia+'</table></div></td></tr>';
            break;
        case "Mes":
            for(var l=0;l<cant;l++){
                for(var i=0;i<31;i++){
                    dia+="<tr><th>Mes:"+(l+1)+"Dia:"+(i+1)+"</th>";
                    for(var j=0;j<24;j++){
                        dia+="<td><table><tr>";
                        for(var k=0;k<60;k++){
                            hourclass="Mes:"+(l+1)+"Dia:"+(i+1)+"hour"+j+"min"+k;
                            dia+="<td width='1px' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
                        }
                        dia+="</tr></table></td>";
                    }
                    dia+="</tr>";
                }
            }
            break;
    }
    document.getElementById(element).innerHTML=head;
}
function minutos(hour){
    var hi=hour.split(':');

    var hora=parseInt(hi[0]);
    var minutos=parseInt(hi[1]);

    var total=(hora*60)+minutos;
    return total;
}
function getMonthNumber(nom){
    var diasSemana = new Array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
    if(nom=="Domingo")return 0;
    for(var i=0;i<diasSemana.length;i++){
        if(diasSemana[i]==nom){
            return i+1;
        }
    }
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
                    //ejemplo:
                    //id = Martes:1hour:imin:j (de lunes a domingo en semana)
                    //id = Dia:1hour:imin:j (para los dias)
                    //id = Mes:1Dia:23hour:imin:j (para los meses)
                    if(document.getElementById(id)){
                        document.getElementById(id).style.backgroundColor=color;
                        document.getElementById(id).setAttribute('title',unit+": "+houri+" - "+hourf);
                        document.getElementById(id).dataset["id"]=__id__;
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
                    //ejemplo:
                    //id = Martes:1hour:imin:j (de lunes a domingo en semana)
                    //id = Dia:1hour:imin:j (para los dias)
                    //id = Mes:1Dia:23hour:imin:j (para los meses)
                    if(document.getElementById(id)) {
                        document.getElementById(id).style.backgroundColor = color;
                        document.getElementById(id).setAttribute('title', unit + ": " + houri + " - " + hourf);
                        this.dataset["id"]=__id__;
                    }
                }
            }
        }
        var nu=unit.split(':');
        var numero=0;
        if(nu[0]=="Dia"){
            numero=parseInt(nu[1]);
            for(var i=0;i<=hfinal;i++){
                for(var j=0;j<60;j++){
                    if(hfinal==i && j== mfinal){
                        bool=false;
                    }
                    if(bool){
                        id=nu[0]+":"+(numero+1)+"hour"+i+"min"+j;
                        //ejemplo:
                        //id = Martes:1hour i min j (de lunes a domingo en semana)
                        //id = Dia:1hour i min j (para los dias)
                        //id = Mes:1Dia:23hour i min j (para los meses)
                        if(document.getElementById(id)) {
                            document.getElementById(id).style.backgroundColor = color;
                            document.getElementById(id).setAttribute('title', unit + ": " + houri + " - " + hourf);
                            this.dataset["id"]=__id__;
                        }
                    }
                }
            }
        }else{
            if(nu[0]=="Semana") {
                var diasSe = new Array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
                for (var i = 0; i <= hfinal; i++) {
                    for (var j = 0; j < 60; j++) {
                        if (hfinal == i && j == mfinal) {
                            bool = false;
                        }
                        if (bool) {
                            id = diasSe[getMonthNumber(nu[0])] + ":" + nu[1] + "hour" + i + "min" + j;
                            //ejemplo:
                            //id = Martes:1hour i min j (de lunes a domingo en semana)
                            //id = Dia:1hour i min j (para los dias)
                            //id = Mes:1Dia:23hour i min j (para los meses)
                            if(document.getElementById(id)) {
                                document.getElementById(id).style.backgroundColor = color;
                                document.getElementById(id).setAttribute('title', unit + ": " + houri + " - " + hourf);
                                this.dataset["id"]=__id__;
                            }
                        }
                    }
                }
            }else{
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
                                this.dataset["id"]=__id__;
                            }
                        }
                    }
                }
            }
        }
    }
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
$(".sidebar-toggle").click(function(){
    if($("body")[0].classList.length==2){
        a=$("#contEncCol")[0].style.width.split('e');
        $("#contEncCol")[0].style.width=(parseInt(a[0])+6)+"em";
        b=$("#contenedor")[0].style.width.split('e');
        $("#contenedor")[0].style.width=(parseInt(b[0])+6)+"em";
    }else{
        a=$("#contEncCol")[0].style.width.split('e');
        $("#contEncCol")[0].style.width=(parseInt(a[0])-6)+"em";
        b=$("#contenedor")[0].style.width.split('e');
        $("#contenedor")[0].style.width=(parseInt(b[0])-6)+"em";
    }
});