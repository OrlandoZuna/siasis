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
                dia += "<td> <input type='checkbox' name='dias[]' value='" + value + "' checked/></td>"
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
function shiftable(unid,cant,element){
    var head="<tr>";head+="<th>Unidad</th>";
    var dia="";
    for(var i=0;i<24;i++){
        if(i<10){
            head+="<th>0"+i+":00hr</th>";
        }else{
            head+="<th>"+i+":00hr</th>";
        }
    }
    head+="</tr>";
    var hourclass="";
    switch (unid){
        case "Dia":
            for(var i=0;i<=cant;i++){
                dia+="<tr><th>"+unid+":"+(i+1)+"</th>";
                for(var j=0;j<24;j++){
                    dia+="<td><table><tr>";
                    for(var k=0;k<60;k++){
                        hourclass="Dia:"+(i+1)+"hour"+j+"min"+k;
                        dia+="<td width='1px' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
                    }
                    dia+="</tr></table></td>";
                }
                dia+="</tr>";
            }
            break;
        case "Semana":
            var week=["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
            for(var l=0;l<cant;l++){
                for(var i=0;i<7;i++){
                    dia+="<tr ><th>"+week[i]+":"+(l+1)+"</th>";
                    for(var j=0;j<24;j++){
                        dia+="<td><table><tr>";
                        for(var k=0;k<60;k++){
                            hourclass=week[i]+":"+(l+1)+"hour"+j+"min"+k;
                            dia+="<td width='1px' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
                        }
                        dia+="</tr></table></td>";
                    }
                    dia+="</tr>";
                }
            }
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
        case "fecha":
            var fechas=cant.split('*');
            
            var sep=fechas[0].split('-');
            var myDate = new Date(sep[0],sep[1]-1,sep[2]);
            var sep2=fechas[1].split('-');
            var myDate1 = new Date(sep2[0],sep2[1]-1,sep2[2]);

            if(compareDate(myDate,myDate1)==-1){
                while(compareDate(myDate,myDate1)==-1 || compareDate(myDate,myDate1)==0){
                    dia+="<tr><th>"+getMonthSpaAbr(myDate) + "-" + getDaySpaAbr(myDate) + "-" + myDate.getDate()+"</th>";
                    for(var j=0;j<24;j++){
                        dia+="<td><table><tr>";
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
                            //=myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate()+"hour"+j+"min"+k;
                            dia+="<td width='1px' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
                        }
                        dia+="</tr></table></td>";
                    }
                    dia+="</tr>";
                    myDate.setDate(myDate.getDate()+1);
                }
            }else{
             
                dia+="<tr><th>"+getMonthSpaAbr(myDate) + "-" + getDaySpaAbr(myDate) + "-" + myDate.getDate()+"</th>";
                for(var j=0;j<24;j++){
                    dia+="<td><table><tr>";
                    for(var k=0;k<60;k++){
                        hourclass=myDate.getFullYear() + "-" + (myDate.getMonth() + 1) + "-" + myDate.getDate()+"hour"+j+"min"+k;
                        dia+="<td width='1px' HEIGHT='50px' style='border:5px' id='"+hourclass+"'></td>";
                    }
                    dia+="</tr></table></td>";
                }
                dia+="</tr>";

            }

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
function getMonthNumber(nom){
    var diasSemana = new Array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
    if(nom=="Domingo")return 0;
    for(var i=0;i<diasSemana.length;i++){
        if(diasSemana[i]==nom){
            return i+1;
        }
    }
}
function pushHour(houri,hourf,unit,color){
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

                    document.getElementById(id).style.backgroundColor=color;
                    document.getElementById(id).setAttribute('title',unit+": "+houri+" - "+hourf);
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
                    document.getElementById(id).style.backgroundColor=color;
                    document.getElementById(id).setAttribute('title',unit+": "+houri+" - "+hourf);
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
                        document.getElementById(id).style.backgroundColor=color;
                        document.getElementById(id).setAttribute('title',unit+": "+houri+" - "+hourf);
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
                            document.getElementById(id).style.backgroundColor = color;
                            document.getElementById(id).setAttribute('title', unit + ": " + houri + " - " + hourf);
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
                            document.getElementById(id).style.backgroundColor = color;
                            document.getElementById(id).setAttribute('title', unit + ": " + houri + " - " + hourf);
                        }
                    }
                }
            }
        }
    }
}