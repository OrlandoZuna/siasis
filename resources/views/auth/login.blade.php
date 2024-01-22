@extends('layouts.log')
@section('content')

  <!-- Login Admin -->

      <div class="login-form">
          <!-- logo-login -->

          <div class="logo-login">
              <img src="{{{ asset('assets/images/logo.png') }}}" alt="">
          </div>
          {!! Form::open(['url'=>'login', 'method'=>'post', 'role'=>'form', 'class' => 'form-signin']) !!}
          {{ csrf_field() }}
          <div class="text-left form-input{{ $errors->has('username') || $errors->has('email') ? ' has-error' : '' }}">
            <label class="control-label" for="password">CORREO ELECTRONICO O CI:</label>
              <input id="login" type="text" class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" required autofocus>
                @if ($errors->has('username') || $errors->has('email'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                  </span>
                @endif
          </div>
          <div class="text-left form-input{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label" for="password">CONTRASEÑA:</label>
            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required />
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
          <div class="form-input pt-30">
            <input type="submit" name="submit" value="INGRESAR">
          </div>
          {!! Form::close() !!}
          <center>
            <div class="form-input pt-30" style="align-content: center">
              <a href="{{ route('admin.inicio') }}" style="background-color: brown" class="btn btn-sm btn-primary"> Regresar Al Inicio                </a>
          </div>
          </center>
      </div>


@endsection

@section('after-script')

@endsection
