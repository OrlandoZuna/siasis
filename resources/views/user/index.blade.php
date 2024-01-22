  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div id="crop-avatar">
        <img class="img-responsive avatar-view" src="{{asset('upload/employers/user.png')}}" alt="Avatar" title="Change the avatar">
      </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 " >
        <h3 class="titlename">{{$user->Personal->Nombress}}</h3>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 espaciodiv">
          
          <span class="tamletter"><i  class="fa fa-map-marker user-profile-icon icontam"></i> <span class="margenicon">
              {{$user->Personal->direccion}}
          </span></span>
          <hr class="hrtitle">
          <span class="tamletter"><i  class="fa fa-briefcase user-profile-icon icontam"></i> <span class="margenicon">
            {{$user->Personal->profecion}}
          </span></span>
          <hr class="hrtitle">
          <span class="tamletter"><i class="fa fa-building-o icontam" aria-hidden="true"></i><span class="margenicon">
            {{$user->Unidad->name}}
          </span></span>  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 espaciodiv">
          @yield('contentdata')  
        </div>
    </div>
  </div>