<div class="panel_left" id="form_left_shift">
    <div class="row" style="padding-bottom: 5px;">
        <div class="col-md-1" style="text-align: center">
    		<a class="cerrar_left_panel" style="font-size: 20px" href="#"><i class="fa fa-close"></i></a>
    	</div>

        <div class="col-md-11" style="text-align: center">
            <h2>{{$title}}</h2>
        </div>
    </div>
    {{$slot}}
</div>

<script>
	var bolean1=true;
    bolean3=true;
    $("#open_left_panel").click(function(){

        if(bolean1){
            $("#form_left_shift").css("right","0");
            bolean1=false;
        }else{
            $("#form_left_shift").css("right","-82%"); 
            bolean1=true;
        }
    });
    $(".cerrar_left_panel").click(function(){

        $("#form_left_shift").css("right","-82%");
        bolean1=true;
        bolean3=true;
    });


        function sacarm(este){
            

            $("#hora1_form").val($(este).data("hora_inicio"));
            $("#hora2_form").val($(este).data("hora_fin"));
            $("#desde_form").val($(este).data("fecha"));
            $("#hasta_form").val($(este).data("fecha"));
            $("#personal_id_form").val($(este).data("personal_id"));

            
            if(bolean3){
                $("#form_left_shift").css("right","0");
                bolean3=false;
            }else{
                $("#form_left_shift").css("right","-82%"); 
                bolean3=true;
            }
        }
        $("#ausencia_id_form").change(function(){
            console.log($("#ausencia_id_form").data("tipo"));
            $("#tipo_renumerec_form").val($("#ausencia_id_form option:selected").data("tipo"));
        });
        

        
</script>