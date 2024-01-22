<script src="{{asset('tinymce/tinymce.min.js')}}"></script>
<script>
    var config_editor={
        path_absolute:'{{\Illuminate\Support\Facades\URL::to("/")}}',
        selector:'textarea',
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