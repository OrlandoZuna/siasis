@extends('layouts.home')

@section('title', 'LOGIN')

@section('after-style')
@endsection

@section('content')
    <div class="row animate form login_form">
        <div class="x_panel login_content">

            <div class="x_title">
                <center>
                    <img src="assets/images/logo.png" width="200px" height="200px">
                </center>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    {!! Form::open(['url'=>'login', 'method'=>'post', 'role'=>'form', 'class' => 'form-signin']) !!}
                        {{ csrf_field() }}
                        <div class="text-left form-group{{ $errors->has('username') || $errors->has('email') ? ' has-error' : '' }}">
                          <label class="control-label" for="password">EMAIL O CI:</label>
                            <input id="login" type="text" class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" required autofocus>
                              @if ($errors->has('username') || $errors->has('email'))
                                <span class="invalid-feedback">
                                  <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                </span>
                              @endif
                        </div>


                        <div class="text-left form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <label class="control-label" for="password">CONTRASEÑA:</label>
                          <input type="password" class="form-control" placeholder="Password" id="password" name="password" required />
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                      </div>
                        <center>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-sm btn-primary btn-block" type="submit"><i class="fa fa-sign-in"></i> Ingresar</button>
                                </div>
                            </div>
                        </center>
                    {!! Form::close() !!}
                </div>
                 <!-- <a class="reset_pass" href="{{ url('/password/reset') }}">Perdiste tu contraseña?</a> -->
            </div>
        </div>
    </div>
@endsection

@section('after-script')

@endsection
