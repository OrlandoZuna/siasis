function CountDays(f1,f2)
{
    var aFecha1 = f1.split('-');
    var aFecha2 = f2.split('-');
    var fFecha1 = Date.UTC(aFecha1[0],aFecha1[1]-1,aFecha1[2]);
    var fFecha2 = Date.UTC(aFecha2[0],aFecha2[1]-1,aFecha2[2]);
    var dif = fFecha2 - fFecha1;
    var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
    return dias;
}
function Months(f1,f2){
    var aF1 = f1.split("-");
    var aF2 = f2.split("-");
    var num1=parseInt(aF2[0]);
    var num2=parseInt(aF2[1]);
    var num3=parseInt(aF1[0]);
    var num4=parseInt(aF1[1]);
    var numMeses = (num1*12 + num2) - (num3*12 + num4);

    return numMeses;
}

var meses = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var diasSemana = new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
var mesesAbre = new Array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
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
    switch (unit){
        case "Dia":
            for(var l=0;l<cant;l++){
                id="Dia:"+(l+1);
                dia+="<tr><td>"+id+"</td>";
                dia+="<td> <input type='checkbox' name='dias[]' value='"+id+"' checked/></td>"
                dia+="</tr>";
            }
            break;
        case "Semana":

            var week=["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
            for(var l=0;l<cant;l++){
                for(var i=0;i<7;i++){
                    id=week[i]+":"+(l+1);
                    dia+="<tr><td>"+id+"</td>";
                    dia+="<td> <input type='checkbox' name='dias[]' value='"+id+"' checked/></td>"
                    dia+="</tr>";
                }
            }
            break;
        case "Mes":
            for(var l=0;l<cant;l++){
                for(var i=0;i<31;i++){
                    id="Mes:"+(l+1)+"Dia:"+(i+1);
                    dia+="<tr><td>"+id+"</td>";
                    dia+="<td> <input type='checkbox' name='dias[]' value='"+id+"' checked/></td>"
                    dia+="</tr>";
                }
            }
            break;
            break;


    }
    document.getElementById(element).innerHTML=dia;
}

function compareDate(date1,date2){
    /*myDate.setDate(myDate.getDate()+1);
     alert(myDate.getDate());
     alert(myDate.getMonth()+1);
     alert(myDate.getYear());*/
    if(date1.getFullYear()==date2.getFullYear()){
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
        if(date1.getFullYear()<date2.getFullYear()){
            return -1;
        }else{
            return 1;
        }
    }

}

//martes:1hour:1min:30
var ancho=38;
var alto=22;
function shiftableEmployer(datestart,dateini,datefin,unid,cant,element,xx,yy){
    ancho=xx;
    alto=yy;
    var sep=dateini.split('-');
    var myDate = new Date(sep[0],sep[1]-1,sep[2]);
    var auxdate=new Date(sep[0],sep[1]-1,sep[2]);
    var sep1=datefin.split('-');
    var myDate1 = new Date(sep1[0],sep1[1]-1,sep1[2]);
    var auxdate2=new Date(sep1[0],sep1[1]-1,sep1[2]);;
    var sep2=datestart.split('-');
    var myDate2 = new Date(sep2[0],sep2[1]-1,sep2[2]);

    if(compareDate(myDate,myDate2)==1){
        myDate=myDate2;
        dateini=datestart;
    }
    var cantdias=(CountDays(datestart,dateini));
    var cantmes=(Months(datestart,dateini));
    var head="<tr>";
    head+="<td style='background: #42b38b'>Unidad</td><td><div id='contEncCol' style='overflow:hidden; overflow-y:scroll; background:#80e0be; width:"+ancho+"em'><table class='tabla' id='encCol'><tr>";
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
    var days="";
    switch (unid){
        case "Dia":
            var i=cantdias;
            while(compareDate(auxdate,auxdate2)==-1 || compareDate(auxdate,auxdate2)==0) {
                dia+="<tr><td style='height: 23px;width: 9.9em;font-size: 14px'>"+(auxdate.getMonth()+1)+"-"+auxdate.getDate()+"-"+getDaySpaAbr(auxdate)+"</td></tr>";
                auxdate.setDate(auxdate.getDate()+1);
            }
            head+=dia+"</table></div></td>";
            dia='<td><div id="contenedor" style="overflow:auto; width:'+ancho+'em; height:'+alto+'em" onscroll="desplaza()"><table class="tabla" id="contenido">';
            while(compareDate(myDate,myDate1)==-1 || compareDate(myDate,myDate1)==0){
                dia+="<tr>";
                for(var j=0;j<24;j++){
                    dia+="<td><table height='20px'><tr>";
                    for(var k=0;k<60;k++){
                        days=myDate.getDate()+"-"+myDate.getMonth()+"-"+myDate.getFullYear();
                        hourclass=days+"Dia:"+((i%cant)+1)+"hour"+j+"min"+k;
                        dia+="<td width='1px' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
                    }
                    dia+="</tr></table><div style='width:3.85em; height:0; position:relative; top:-1em; z-index:-1; border:1px solid red'></div></td>";
                }
                dia+="</tr>";
                i++;
                myDate.setDate(myDate.getDate()+1);
            }
            break;
        case "Semana":
            var week=["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"];
            var l=parseInt(cantdias/7);
            var i=myDate.getDay();
            while(compareDate(auxdate,auxdate2)==-1 || compareDate(auxdate,auxdate2)==0) {
                dia+="<tr><td style='height: 23px;width: 240px;font-size: 14px'>"+(auxdate.getMonth()+1)+"-"+auxdate.getDate()+"-"+getDaySpaAbr(auxdate)+"</td></tr>";
                auxdate.setDate(auxdate.getDate()+1);
            }
            head+=dia+"</table></div></td>";
            dia='<td><div id="contenedor" style="overflow:auto; width:'+ancho+'em; height:'+alto+'em" onscroll="desplaza()"><table class="tabla" id="contenido">';
            while(compareDate(myDate,myDate1)==-1 || compareDate(myDate,myDate1)==0){
                dia+="<tr>";
                for(var j=0;j<24;j++){
                    dia+="<td><table height='20px'><tr>";
                    for(var k=0;k<60;k++){
                        days=myDate.getDate()+"-"+myDate.getMonth()+"-"+myDate.getFullYear();
                        hourclass=days+week[i%7]+":"+((l%cant)+1)+"hour"+j+"min"+k;
                        dia+="<td width='1px' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
                    }
                    dia+="</tr></table><div style='width:3.85em; height:0; position:relative; top:-1em; z-index:-1; border:1px solid red'></div></td>";
                }
                dia+="</tr>";
                myDate.setDate(myDate.getDate()+1);
                i++;
                if(i%7==1){
                    l++;
                }
            }
            break;
        case "Mes":
            var l=cantmes;
            var month=myDate.getMonth();
            while(compareDate(myDate,myDate1)==-1 || compareDate(myDate,myDate1)==0){
                dia+="<tr><th>"+(myDate.getMonth()+1)+"-"+myDate.getDate()+"-"+getDaySpaAbr(myDate)+"</th>";
                for(var j=0;j<24;j++){
                    dia+="<td><table><tr>";
                    for(var k=0;k<60;k++){
                        days=myDate.getDate()+"-"+myDate.getMonth()+"-"+myDate.getFullYear();
                        hourclass=days+"Mes:"+((l%cant)+1)+"Dia:"+(myDate.getDate())+"hour"+j+"min"+k;
                        dia+="<td width='1px' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
                    }
                    dia+="</tr></table></td>";
                }
                dia+="</tr>";
                myDate.setDate(myDate.getDate()+1);
                if(month!=myDate.getMonth()){
                    month=myDate.getMonth();
                    l++;
                }
            }
            break;
        case "fecha":
            var s=Days(datestart,dateini);
            var me=Moths(datestart,dateini);
            alert('dias : '+s+" mes: "+me);
            break;
    }
    document.getElementById(element).innerHTML=head+dia;
}
function minutos(hour){
    var hi=hour.split(':');

    var hora=parseInt(hi[0]);
    var minutos=parseInt(hi[1]);

    var total=(hora*60)+minutos;
    return total;
}

function pushHour(myDate,houri,hourf,unit,color){
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
    var days=myDate.getDate()+"-"+myDate.getMonth()+"-"+myDate.getFullYear();

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
                    id=days+unit+"hour"+i+"min"+j;
                    //ejemplo:
                    //id = Martes:1hour:imin:j (de lunes a domingo en semana)
                    //id = Dia:1hour:imin:j (para los dias)
                    //id = Mes:1Dia:23hour:imin:j (para los meses)

                    if ( document.getElementById( id )) {
                        document.getElementById(id).style.backgroundColor=color;
                        document.getElementById(id).setAttribute('title',unit+": "+houri+" - "+hourf);
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
                    id=days+unit+"hour"+i+"min"+j;
                    //ejemplo:
                    //id = Martes:1hour:imin:j (de lunes a domingo en semana)
                    //id = Dia:1hour:imin:j (para los dias)
                    //id = Mes:1Dia:23hour:imin:j (para los meses)
                    document.getElementById(id).style.backgroundColor=color;
                    document.getElementById(id).setAttribute('title',unit+": "+houri+" - "+hourf);
                }
            }
        }
        var nu=unit.split(':');
        var numero=parseInt(nu[1]);
        myDate.setDate(myDate.getDate() + 1);
        days=myDate.getDate()+"-"+myDate.getMonth()+"-"+myDate.getFullYear();
        myDate.setDate(myDate.getDate() - 1);
        if(nu[0]=="Dia"){
            for(var i=0;i<=hfinal;i++){
                for(var j=0;j<60;j++){
                    if(hfinal==i && j== mfinal){
                        bool=false;
                    }
                    if(bool){
                        id=days+nu[0]+":"+(numero+1)+"hour"+i+"min"+j;
                        //ejemplo:
                        //id = Martes:1hour i min j (de lunes a domingo en semana)
                        //id = Dia:1hour i min j (para los dias)
                        //id = Mes:1Dia:23hour i min j (para los meses)
                        document.getElementById(id).style.backgroundColor=color;
                        document.getElementById(id).setAttribute('title',unit+": "+houri+" - "+hourf);
                    }
                }
            }
        }else{
            if(nu[0]=="Mes"){
                numero=parseInt(nu[2]);
                for(var i=0;i<=hfinal;i++){
                    for(var j=0;j<60;j++){
                        if(hfinal==i && j== mfinal){
                            bool=false;
                        }
                        if(bool){
                            id=days+nu[0]+":"+nu[1]+":"+(numero+1)+"hour"+i+"min"+j;
                            //ejemplo:
                            //id = Martes:1hour i min j (de lunes a domingo en semana)
                            //id = Dia:1hour i min j (para los dias)
                            //id = Mes:1Dia:23hour i min j (para los meses)
                            document.getElementById(id).style.backgroundColor=color;
                            document.getElementById(id).setAttribute('title',unit+": "+houri+" - "+hourf);
                        }
                    }
                }
            }else{
                var diasSe = new Array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
                for(var i=0;i<=hfinal;i++){
                    for(var j=0;j<60;j++){
                        if(hfinal==i && j== mfinal){
                            bool=false;
                        }
                        if(bool){
                            id=days+diasSe[getMonthNumber(nu[0])]+":"+nu[1]+"hour"+i+"min"+j;
                            //ejemplo:
                            //id = Martes:1hour i min j (de lunes a domingo en semana)
                            //id = Dia:1hour i min j (para los dias)
                            //id = Mes:1Dia:23hour i min j (para los meses)
                            document.getElementById(id).style.backgroundColor=color;
                            document.getElementById(id).setAttribute('title',unit+": "+houri+" - "+hourf);
                        }
                    }
                }
            }
        }

    }
}
function getDayNumber(nom){
    var diasSemana = new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
    for(var i=0;i<diasSemana.length;i++){
        if(diasSemana[i]==nom){
            return i;
        }
    }
}

function pushHourdate(datos,ini,fin) {
    var sep = ini.split('-');
    var myDate = new Date(sep[0], sep[1] - 1, sep[2]);
    var sep2 = fin.split('-');
    var myDate1 = new Date(sep2[0], sep2[1] - 1, sep2[2]);

    var sep3=datos[0]["date"].split('-');
    var myDate2 = new Date(sep3[0],sep3[1]-1,sep3[2]);

    if(compareDate(myDate1,myDate)==-1){
        myDate1=myDate;
        ini=myDate;
    }
    if(compareDate(myDate,myDate2)==-1){
        myDate=myDate2;
        ini=datos[0]["date"];
    }
    var cantdias=(CountDays(datos[0]["date"],ini));
    var cantmes=(Months(datos[0]["date"],ini));
    var i = CountDays(datos[0]["date"], ini);
    var kk=myDate.getDay();
    var ll=parseInt(cantdias/7);
    while (compareDate(myDate, myDate1) == -1 || compareDate(myDate, myDate1) == 0) {
        for (var j = 0; j < datos.length; j++) {
            var x = datos[j]["name_unit"].split(':');
            if (x[0] == "Dia") {
                var val=parseInt(i % datos[0]["cycle"])+1;
                if(val==x[1]){
                    pushHour(myDate, datos[j]["start_time"], datos[j]["end_time"], datos[j]["name_unit"], datos[j]["color"]);
                }
                i++;
            } else {
                if (x[0] == "Mes") {
                    if(x[2]==myDate.getDate()){
                        pushHour(myDate, datos[j]["start_time"], datos[j]["end_time"], datos[j]["name_unit"], datos[j]["color"]);
                    }

                } else {
                    if (getDayNumber(x[0]) == myDate.getDay()) {
                        pushHour(myDate, datos[j]["start_time"], datos[j]["end_time"], datos[j]["name_unit"], datos[j]["color"]);
                    }
                }
            }

            kk++;
            if(kk%7==1){
                ll++;
            }
        }
        myDate.setDate(myDate.getDate() + 1);
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