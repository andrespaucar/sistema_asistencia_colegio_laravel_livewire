@extends('layouts.app')

@section('head')
    <title>ALUMNOS - SISTEMA ASISTENCIA CNI</title>
@endsection

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
              <h1 class="mb-0">Alumnos </h1>
            </div> 
        </div>
        </div> 
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"> 
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#listado" data-toggle="tab">Listado</a></li>
                                <li class="nav-item"><a class="nav-link" href="#poner_asistencia" data-toggle="tab">Poner Asistencia</a></li>
                                <li class="nav-item"><a class="nav-link" href="#filtro" data-toggle="tab">Filtro</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="active tab-pane " id="listado">
                    <livewire:sections.degree.students.table :gradeId="$gradeId" :sectionId="$sectionId" />
                </div>
                <div class="tab-pane" id="poner_asistencia">
                    <livewire:sections.degree.students.put-assistance :gradeId="$gradeId" :sectionId="$sectionId"/>
                </div>
                <div class="tab-pane" id="filtro">
                    <livewire:sections.degree.filters.filter :gradeId="$gradeId" :sectionId="$sectionId"/>
                </div>
            </div>
           
        </div>
    </section>
</div>

{{-- MODAL - SHOW asistencia alumno x --}}
<div class="modal" id="modal-show-asistencia-alumn" aria-hidden="true"  data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Asistencias</h5>
          <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-0" style="height: 350px">
            {{-- <table class="table table-hover">
                <thead>
                    <tr>
                        <th>/</th>
                        <th>L</th>
                        <th>M</th>
                        <th>M</th>
                        <th>J</th>
                        <th>V</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table> --}}
            <div id='calendar'></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          {{-- <button type="button" wire:click.prevent="save()" class="btn btn-primary">Guardar</button> --}}
        </div>
      </div>
    </div>
</div>
@endsection
@push('scripts')

<script>
    window.Livewire.on('closeModal',function(){
        $('modal-register').modal('hide')
        $('modal-edit').modal('hide')
    })
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var date = new Date()
        var d    = date.getDate(),
            m    = date.getMonth(),
            y    = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;
        
        var calendar = new Calendar(calendarEl,{
            headerToolbar: {
            left  : 'prev,next today',
            center: 'title',
            right : 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
            // defaultView: 'month',
            businessHours: false,
        })
        calendar.render();
      });
</script>
@endpush