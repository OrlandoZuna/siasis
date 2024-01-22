@extends('valhalla::layouts.master')
@section('menu')
    @include('valhalla::complement.menu')
@endsection

@section('bar_top')
    @include('valhalla::complement.navs')
@endsection
@section('content')
<div class="">
  <div class="row" style="box-shadow: 0 0 7px 0px #CBDEED">
    <a class="btn btn-app btn-mycolor" href="{{URL::previous()}}"><i class="fa fa-reply"></i>atras</a>
    <a class=" publication btn btn-app btn-mycolor" href="#">
        <i class="fa fa-plus"></i>
        Nueva Publicacion
    </a>
</div>
<br>
 <div class="row">
     <div class="col-md-6 col-sm-7 col-xs-12">
           <div class="x_panel">
               <h2 style="text-transform: uppercase;">Lista De Sitios Web</h2>
               <div class="clearfix"></div>
                    <div class="x_content">
                        <div class="contenedor400">
                          @if ($webs->isNotEmpty())
                          <table class="table__kirito">
                            <thead>
                            <tr style="color: #fffff;">
                                <td scope="col">Nombre</td>
                                <td scope="col">tipo</td>
                                <td scope="col">icono</td>
                                <td scope="col">opciones</td>
                            </tr>
                            </thead>
                            <tbody id="table_r">
                            @foreach($webs as $al)
                            <tr>
                                <td style="color: #000;">{{ $al->nombre }}</td>
                                <td style="color: #000;">{{ $al->tipo }}</td>
                                <td><img src="{{$al->icono}}" which="50px" height="50px"></td>
                               <td><a href="#"> <i class="fa fa-pencil"></i> Editar</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                             @else
                                <h2> no hay registros </h2>
                            @endif
                        </div>
                    </div>
               </div>
           </div>
           <div class="col-md-6 col-sm-7 col-xs-12">
            <div class="x_panel">
                <h2 style="text-transform: uppercase;">Lista De Applicaciones</h2>
                <div class="clearfix"></div>
                    <div class="x_content">
                        <div class="contenedor400">
                          @if ($app->isNotEmpty())
                          <table class="table__kirito">
                            <thead>
                            <tr style="color: #fffff;">
                                <td scope="col">Nombre</td>
                                <td scope="col">tipo</td>
                                <td scope="col">icono</td>
                                <td scope="col">opciones</td>
                            </tr>
                            </thead>
                            <tbody id="table_r">
                            @foreach($app as $al)
                            <tr>
                                <td style="color: #000;">{{ $al->nombre }}</td>
                                <td style="color: #000;">{{ $al->tipo }}</td>
                                <td><img src="{{$al->icono}}" which="50px" height="50px"></td>
                               <td><a href="#"> <i class="fa fa-pencil"></i> Editar</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                             @else
                                <h2> no hay registros </h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

       </div>

 </div>
</div>
@include('valhalla::server.contenido.modals.publication')
@endsection
@section('after-script')
<script src="{{asset('assets/js/select/select2.full.js')}}"></script>

<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
<script>
    var config_editor={
        path_absolute:'{{\Illuminate\Support\Facades\URL::to("/")}}',
        selector:'textarea#text1',
        plugins:[
            'advlist autolink lists charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime  nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern'
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alingleft alingcenter alingrigth alingjustify | bullist numlist outdont indent",
        relative_urls:false,
        file_browser_callback: function(field_name, url, type, win){
            var x=window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y=window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;
            var cmsurl= config_editor.path_absolute+'larabel-filemanager?file_name'+field_name;
            if(type=='image'){
                cmsurl=cmsurl+"&type=Images"
            }else{
                cmsurl=cmsurl+"&type=Files"
            }
            tinyMCE.activeEditor.windowManager.open({
                file:cmsurl,
                tittle:"Filemanager",
                width:x=0.8,
                heigth:y=0.8,
                resizable: "yes",
                close_previous:"no"
            });
        },
        language:'es'
    };
    tinymce.init(config_editor);
</script>
<script>

  function readFile() {

    if (this.files && this.files[0]) {

      var FR= new FileReader();

      FR.addEventListener("load", function(e) {
        document.getElementById("img").src       = e.target.result;

        document.getElementById("b64").innerHTML = e.target.result;

      });

      FR.readAsDataURL( this.files[0] );
    }
  }

  document.getElementById("inp").addEventListener("change", readFile);
</script>
<script>

  $(document).on("click",".publication",function(){
      $(".publication-modal-sm").modal("show");
  });
</script>
@endsection
