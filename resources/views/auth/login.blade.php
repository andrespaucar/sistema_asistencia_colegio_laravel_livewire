@extends('layouts.auth')
@section('header')
    <title>Login - SJSISTEMPRO</title>
@endsection
@section('content')
<style>
  .coverpe{
      max-width: 100%;
      height: 90px;
      object-position: center;
      object-fit: center;
  }
  .login-page{ 
      background-image:  url('images/bg-login.jpg');
      background-position: center;
      object-fit: cover;background-size: cover;
      background-repeat: no-repeat;
      background-color : #007bff ; background-blend-mode: color-burn;
  }
</style>
<div class="text-center mb-2">
  <img src="{{asset('images/insignia_cni_alma_mater.png')}}" class="img-fluid coverpe" alt="">
</div>
<div class="login-box ">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="login" class="h1"><b>CNI</b> </a>
        <p class="my-0">SISTEMA CONTROL DE ASISTENCIA</p>
    </div>
    <div class="card-body login-card-body">
      {{-- <p class="login-box-msg">Inicia Sesión </p> --}}
      <form method="POST" action="{{route('loginAuth')}}" name="formlogin">
        @csrf
        <div class="form-group has-error mb-3">
        <div class="input-group has-error">
          <input type="text" class="form-control {{$errors->has('username')?'is-invalid':''}}" 
            name="username" value="{{old('username')}}" placeholder="Username" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope {{$errors->has('email')?'text-danger':''}}"></span>
            </div>
          </div> 
          {{-- {!! $errors->first('email','<span class="help-blosck invalid-feedback">:message</span>') !!} --}}
        </div>
        </div> 
        <div class="form-grup mb-3">
          <div class="input-group">
          <input type="password" class="form-control {{$errors->has('password')?'is-invalid':''}} " 
            name="password" placeholder="Contraseña" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock {{$errors->has('password')?'text-danger':''}}"></span>
              </div>
            </div>
            {{-- {!! $errors->first('password','<span class="help-blosck invalid-feedback">:message</span>') !!} --}}
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
            {{-- <div class="icheck-primary">
              <input type="checkbox" name="remenber" id="remember">
              <label for="remember">
                Recuerdame
              </label>
            </div> --}}
          </div>
            
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">
              {{-- <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> --}}
              <span >Ingresar</span>
            </button>
          </div> 
        </div>
      </form>
    </div>
    <div class="card-footer bg-danger text-center py-1">
      {!! $errors->first('email','<div class="text-sm"><span class="help-block">:message</span></div><br>') !!}
      {!! $errors->first('password','<div class="text-sm"><span class="help-block">:message</span></div>') !!}
    </div>
  </div>
</div> 
@endsection
