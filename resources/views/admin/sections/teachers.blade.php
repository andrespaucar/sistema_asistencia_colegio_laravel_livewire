@extends('layouts.app')

@section('head')
    <title>PROFESORES - SISTEMA ASISTENCIA CNI</title>
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
              <h1>Profesores </h1>
            </div>
         
        </div>
        </div> 
    </section>
    <section class="content">
        <div class="container-fluid">
          <livewire:sections.degree.teachers.table :gradeId="$gradeId" :sectionId="$sectionId"/>
        </div>
    </section>
</div>
@endsection