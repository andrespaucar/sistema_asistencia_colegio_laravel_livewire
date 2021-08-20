<div class="row">
    <div class="col-12">
        <div class="card">
            {{-- <div class="card-header"></div> --}}
            <div class="card-body">
                @if(empty($is_assistance_day))
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre y Apellido</th> 
                            <th>{{$date}}</th>
                            <th class="text-right">Estado Asistencia</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key=>$student)
                        <tr>
                            <td>{{$student['fullname']}}</td>  
                            <td colspan="2" class="text-right"> 
                                <div class="d-flex" style="justify-content: space-evenly;" >
                                    <div class="custom-control custom-radio">
                                        <input wire:model.defer="status.{{$student['id']}}"  name="group{{$student['id']}}" class="custom-control-input" type="radio" id="customRadio1-{{$key}}" value="asistio" checked>
                                        <label for="customRadio1-{{$key}}" class="custom-control-label">ASISTIO</label>
                                    </div> 
                                    <div class="custom-control custom-radio ml-3">
                                        <input wire:model.defer="status.{{$student['id']}}" name="group{{$student['id']}}" class="custom-control-input custom-control-input-danger" type="radio" id="customradio2-{{$key}}" value="no asistio">
                                        <label for="customradio2-{{$key}}" class="custom-control-label">NO ASISTIO</label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center mt-3">
                @if ($isRegisterAssitenceDay)
                    <button class="btn btn-success" wire:click="save()"><i class="fa fa-save"></i> Guardar</button>
                    @error('errorMarcarAsistencia')
                        <div class="mt-2 alert alert-danger">{{$message}}</div>
                    @enderror
                    @else
                    <button class="btn btn-default">Registro Completo.</button>    
                    @endif
                </div>
                @else
                <div class="text-center">
                    Ya se puso el Asistencia el Dia de HOY. <b>{{$is_assistance_day['date']}} - {{$is_assistance_day['time']}}</b>
                </div>
                @endif
            </div>
            {{-- <div class="card-footer">
                <div class="float-left">
                    <button class="btn btn-default">Total: {{$students->count()}}</button>
                </div>
                <div class="float-right">
                </div>
            </div> --}}
        </div>
    </div>
    
</div>

