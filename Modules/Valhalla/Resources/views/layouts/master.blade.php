
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ricardo rojas cruz (kirito)">
    <title> {!! config('valhalla.name') !!}  | {{$title}}</title>
    <link rel="shortcut icon" href="{{{ asset('assets/images/logo.png') }}}" type="image/x-icon" />
    @yield('before-style')
    {!! Html::style('assets/js/bootstrap/dist/css/bootstrap.css') !!}
    {!! Html::style('assets/js/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/js/nprogress/nprogress.css') !!}
    <link href="{{ asset('assets/toastr/toastr.min.css') }}" rel="stylesheet">
    {!! Html::style('assets/css/custom.css') !!}
    {!! Html::style('assets/admin/css/admin.css') !!}
    <link rel="stylesheet" href="{{asset('assets/bootstrapselect/css/bootstrap-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrapselect/css/bootstrap-select.min.css')}}">
    @yield('after-style')
    {!! Html::script('assets/js/jquery/dist/jquery.min.js') !!}
  </head>
  <body class="nav-md" >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed" style="border: 0; background-color: #E4EBF8 ">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0; background-color: #325D88  ">
              <a href="{!!URL::to('home')!!}" class="site_title"><img src="{{{ asset('assets/images/logo.png') }}}" class="" width="45px"><span style="color: #E4EBF8 ; padding: 2px 15px">{{ config('app.name') }}</span></a>

            </div>

            <div class="clearfix" ></div>
            <br>
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              @section('menu')
              @show
              <div class="sidebar-footer hidden-small">

              </div>
            </div>
          </div>
        </div>
        <div class="top_nav">
          @section('bar_top')
          @show
        </div>
        <div class="right_col" role="main">


          @yield('content')
        </div>
      </div>
    </div>
{!! Html::script('assets/js/bootstrap/dist/js/bootstrap.min.js') !!}
      {!! Html::script('assets/js/nprogress/nprogress.js') !!}
      {!! Html::script('assets/js/fastclick/lib/fastclick.js') !!}
      {!! Html::script('assets/js/moment/moment.js') !!}

      {!! Html::script('assets/js/custom.js')!!}
      <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
      {!! Html::script('assets/js/autonumeric/autoNumeric.js')!!}
      <script src="{{asset('assets/bootstrapselect/js/bootstrap-select.js')}}"></script>
      <script src="{{asset('assets/bootstrapselect/js/bootstrap-select.min.js')}}"></script>
      <script>
        var URL_BASE='{{url("/gesamb")}}';
        var _TOKEN='{{csrf_token()}}';
      </script>
      <script>
        var global_url="{{url('/')}}";
        var global_asset="{{asset('')}}";
      </script>
      @yield('after-script')

      <script>
      @if(session()->has('notify'))
         toastr.{{session()->get('notify')['type']}}('{{session()->get('notify')['message']}}');
      @endif

      @if(isset($notify))
         toastr.{{$notify['type']}}('{{$notify['message']}}');
      @endif
      @if(count($errors)>0)
          @foreach ($errors->all() as $error)
              toastr.error('{{$error}}');
          @endforeach
      @endif
      </script>
            <script>
        var URL_BASE='{{url("/gesamb")}}';
        var _TOKEN='{{csrf_token()}}';
        function buscarencolumna (columna,este)
        {

            var tableReg = $(este).parent("td").parent("tr").parent("thead").parent("table")[0];
            var searchText =$(este).val().toLowerCase();
            var cellsOfRow="";
            var found=false;
            var compareWith="";

            for (var i = 1; i < tableReg.rows.length; i++)
            {
                cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                found = false;
                    compareWith = cellsOfRow[columna].innerHTML.toLowerCase();
                    if(compareWith[0]!='<'){
                        if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
                        {
                            found = true;
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
      </script>
  </body>
</html>



