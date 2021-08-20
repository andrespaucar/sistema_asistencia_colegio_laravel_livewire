@extends('layouts.app')

@section('head')
    <title>DASHBOARD - SISTEMA ASISTENCIA CNI</title>
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
              <h1>Dashboard </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Widgets</li>
              </ol>
            </div>
        </div>
        </div> 
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                {{-- ALUMNOS --}}
                <div class="col-lg-3 col-6"> 
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$students}}</h3> 
                            <p>TOTAL ALUMNOS</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-users"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                {{-- USUARIOS --}}
                <div class="col-lg-3 col-6"> 
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>{{$users}}</h3> 
                            <p>TOTAL USUARIOS</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-users-cog"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection