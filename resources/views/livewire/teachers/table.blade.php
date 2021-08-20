<div class="row">
    <div class="col-12">
        @error('errorDelete')
            <div class="alert alert-danger">
                {{$message}}
            </div>
        @enderror
        <div class="card">
            <div class="card-header">
                <button class="btn btn-dark btn-sm" wire:click="add" data-toggle="modal" data-target="#modal-register">Registrar</button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Usuario</th>  
                            <th>Nombre y Apellido</th>  
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{$teacher['username']}}</td> 
                            <td>{{$teacher['name']}}</td> 
                            
                            <td class="text-right">
                                <button class="btn btn-sm btn-warning" wire:click="edit({{$teacher['id']}})" data-toggle="modal" data-target="#modal-edit">
                                    <i class="fas fa-pencil-alt text-white"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" wire:click="$emit('delete',{{$teacher['id']}})" >
                                    <i class="fas fa-times"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-left">
                    <button class="btn btn-default">Total: {{$teachers->total()}}</button>
                </div>
                <div class="float-right">
                    {{ $teachers->links() }}
                </div>
            </div>
        </div>
    </div>
{{-- MODAL - REGISTER--}}
<div class="modal" id="modal-register" wire:ignore.self aria-hidden="true"  data-backdrop="static">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Registrar</h5>
          <button  type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                @error('error')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{$message}}
                </div>
                @enderror
            </div>
            <form> 
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label>Usuario:</label>
                        <input type="text" wire:model.defer="username" class="form-control">
                    </div> 
                    <div class="form-group col-12 col-md-6">
                        <label>Contraseña:</label>
                        <input type="password" wire:model.defer="password" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label>Nombre:</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label>Telefono:</label>
                        <input type="text" wire:model.defer="telephone" class="form-control">
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-8">
                        <label for="course">Especialidad (curso):</label>
                        <select wire:model.defer="course_id" class="form-control">
                            @foreach ($courses as $item)
                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <small>Gragos y Secciones</small>
                <hr class="mt-1 mb-3">
                @foreach ($section_user as $key=>$item)
                <div class="row" >
                    <div class="form-group col-12 col-md-5">
                        <label>Grado:</label>
                        <select wire:model.defer="section_user.{{$key}}.degree_id" wire:change="changeSection($event.target.value,{{$key}})" class="form-control">
                            <option selected  value="null">Selecione option</option>
                            @foreach ($degrees as $degree)
                            <option value="{{$degree['id']}}">{{$degree['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-5">
                        <label>Seccion:</label>
                        <select wire:model.defer="section_user.{{$key}}.section_id" class="form-control">
                            <option hidden value="">Selecione option</option>
                            @if (isset($sections[$key]))
                                @foreach ($sections[$key] as $section)
                                <option value="{{$section['id']}}">{{$section['name']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-2"> 
                        <button type="button" 
                            class="btn btn-sm btn-danger" wire:click="delItemSection({{$key}})">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div> 
                @endforeach
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-sm btn-success" wire:click="add_section_user()"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click="close()" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" wire:click.prevent="create()" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
</div>

{{-- MODAL - EDIT--}}
<div class="modal" id="modal-edit" wire:ignore.self aria-hidden="true"  data-backdrop="static">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar</h5>
          <button  type="button" wire:click="close()" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div>
                @error('error')
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{$message}}
                </div>
                @enderror
            </div>
            <form> 
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label>Usuario:</label>
                        <input type="text" wire:model.defer="username" class="form-control">
                    </div> 
                    <div class="form-group col-12 col-md-6">
                        <label>Nueva Contraseña:</label>
                        <input type="password" wire:model.defer="password" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label>Nombre:</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label>Telefono:</label>
                        <input type="text" wire:model.defer="telephone" class="form-control">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-8">
                        <label for="course">Especialidad (curso):</label>
                        <select wire:model.defer="course_id" class="form-control">
                            @foreach ($courses as $item)
                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <small>Gragos y Secciones</small>
                <hr class="mt-1 mb-3">
                @foreach ($section_user as $key=>$item)
                <div class="row" >
                    <div class="form-group col-12 col-md-5">
                        <label>Grado:</label>
                        <select wire:model.defer="section_user.{{$key}}.degree_id" wire:change="changeSection($event.target.value,{{$key}})" class="form-control">
                            <option selected  value="null">Selecione option</option>
                            @foreach ($degrees as $degree)
                            <option value="{{$degree['id']}}">{{$degree['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-5">
                        <label>Seccion:</label>
                        <select wire:model.defer="section_user.{{$key}}.section_id" class="form-control">
                            <option hidden value="">Selecione option</option>
                            {{-- @if (isset($sections[$key]))
                                @foreach ($sections[$key] as $section)
                                <option value="{{$section['id']}}">{{$section['name']}}</option>
                                @endforeach
                            @endif  --}}
                            @if (isset($degrees[$key]) && isset($section_user[$key]['degree_id']))
                                @foreach ($degrees[$section_user[$key]['degree_id']-1]['sections']  as $section)
                                <option value="{{$section['id']}}">{{$section['name']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-2"> 
                        <button type="button" 
                            class="btn btn-sm btn-danger" wire:click="delItemSection({{$key}})">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div> 
                @endforeach
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-sm btn-success" wire:click="add_section_user()"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click="close()" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
</div>
</div>

