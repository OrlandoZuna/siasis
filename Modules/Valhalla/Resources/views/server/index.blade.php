@extends('valhalla::layouts.master')
@section('menu')
    @include('valhalla::complement.menu')
@endsection

@section('bar_top')
    @include('valhalla::complement.navs')
@endsection
@section('content')

{!!Form::open(["method"=>'put', "route"=>'admin.valhalla.portalsave'])!!}
<div class="row">

    <div class="col-md-12">
    <div class="col col-md-12">
      <div class="form-group">
        <label>Objetivo</label>
        <input type="text" name="objetivo" class="form-control" value="{{$info->objetivo}}">
      </div>

    </div>
  </div>
  <div class="col col-md-12">
   <div class="col col-md-12">
      <div class="form-group">
          <label for="nombres">descripcion</label>
           <textarea name="descripcion" id="text1" cols="30" rows="7" >{!!$info->descripcion !!}</textarea>
      </div>
   </div>
  </div>

  <div class="col col-md-6">
    <div class="col col-md-12">
       <div class="form-group">

        @if(is_null($info->fondo))
        <a href="#" class="logo"> agregar imagen</a>
        @else
        <a href="#" class="logo"><img src="{{$info->fondo}}" width="50%" height="50%"></a>

        @endif

       </div>
    </div>
   </div>
   <div class="col col-md-6">
    <div class="col col-md-12">
       <div class="form-group">
          @if(is_null($info->logo))
          <a href="#" class="logo "> agregar imagen</a>

          @else
          <a href="#" class="logo"><img src="{{$info->logo}}" width="150px" height="150px"></a>
          @endif
       </div>
    </div>
   </div>
</div >
<div class="row">
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Guardar</button>
</div>
{!!Form::close()!!}
@include('valhalla::server.modals.logo')
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
  $(document).on("click",".fondo",function(){
      $(".fondo-modal-sm").modal("show");
  });
  $(document).on("click",".logo",function(){
      $(".logo-modal-sm").modal("show");
  });
</script>
@endsection
