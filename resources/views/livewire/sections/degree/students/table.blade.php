<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-sm btn-dark" wire:click="openModal()" data-toggle="modal" data-target="#modal-register">Registrar</button>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre y Apellido</th> 
                            <th>Asistencias</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$student['fullname']}}</td> 
                            <td>
                                <button class="btn btn-info btn-sm"  data-toggle="modal" data-target="#modal-show-asistencia-alumn">
                                    <i class="fas fa-border-all"></i>
                                </button>
                            </td>
                            <td class="text-right">
                                <button class="btn btn-sm btn-warning" wire:click="edit({{$student['id']}})" data-toggle="modal" data-target="#modal-edit">
                                    <i class="fas fa-pencil-alt text-white"></i>
                                </button>
                                {{-- <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-times"></i>
                                </button> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="float-left">
                    <button class="btn btn-default">Total: {{$students->total()}}</button>
                </div>
                <div class="float-right">
                    {{ $students->links() }}
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
            <button  type="button" wire:click="closeModal()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div>
                    @error('fullname')
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <form> 
                    <div class="row">
                        <div class="form-group col-12 ">
                            <label>Nombre Completo:</label>
                            <input type="text" wire:model.defer="fullname" class="form-control">
                        </div>  
                    </div>  
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" wire:click="closeModal()" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
            <button  type="button" wire:click="closeModal()" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div>
                    @error('fullname')
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <form> 
                    <div class="row">
                        <div class="form-group col-12 ">
                            <label>Nombre Completo:</label>
                            <input type="text" wire:model.defer="fullname" class="form-control">
                        </div>  
                    </div>  
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" wire:click="closeModal()" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        </div>
    </div>
</div>


