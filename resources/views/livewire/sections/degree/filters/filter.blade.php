<div class="row">
   <div class="col-12">
       <div class="card">
           <div class="card-header"></div>
           <div class="card-body">
                <div class="row">
                    <div class="form-group col-12 col-md-3">
                        {{-- <label for="">{{$fullname_student}}</label> --}}
                        <input list="students" type="text" wire:model.debounce.150ms="fullname_student"
                         placeholder="Nombre del Alumno" class="form-control">
                        @empty(!$students)
                            @foreach ($students as $item)
                            <datalist id="students">
                                <option>{{$item['fullname']." - ".$item['id']}}</option> 
                            </datalist> 
                            @endforeach
                        @endempty
                    </div>
                    <div class="form-group col-12 col-md-2">
                        <input type="date" class="form-control" wire:model="date" >
                    </div>
                    <div>
                        <button type="button" wire:click="search()" class="btn btn-dark btn">Buscar</button>
                    </div>
                    @if(!empty($search_result) && !empty($fullname_student))
                    <div class="px-3 mx-2">
                        <button class="btn {{$search_result['status'] === 'asistio'? 'btn-success':'btn-danger'}}">- {{$search_result['status']}} -</button>
                    </div>
                    {{-- @else
                    <div class="px-3 mx-2">
                        <button class="btn btn-default"> NO SE MARCO ASISTENCIA</button>
                    </div> --}}
                    @endif
                </div>
           </div>
       </div>
   </div>
</div>
