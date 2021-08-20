<div class="row" >
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-dark btn-sm" wire:click="add()" data-toggle="modal" data-target="#modal-add-user">Registrar</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th class="text-center">Email</th>
                            <th class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user['username']}}</td>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['type']}}</td>
                            <td>{{$user['email']}}</td>
                            <td class="text-right">
                                <button class="btn btn-sm btn-warning" wire:click="edit({{$user['id']}})"  data-toggle="modal" data-target="#modal-edit-user" >
                                    <i class="fas fa-pencil-alt text-white"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" wire:click="$emit('delete',{{$user['id']}})"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="float-left">
                    <button class="btn btn-default">Total: {{$users->total()}}</button>
                </div>
                <div class="float-right">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL - ADD --}}
    <div class="modal" id="modal-add-user" wire:ignore.self aria-hidden="true"  data-backdrop="static">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Registrar Usuario</h5>
              <button wire:click.prevent="cancel()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="username">Usuario:</label>
                        <input type="text" wire:model.defer="username" class="form-control">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="password">Contraseña:</label>
                        <input type="password" wire:model.defer="password" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="name">Nombre:</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="email">Email:</label>
                        <input type="text" wire:model.defer="email" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <label for="telephone">Telefono:</label>
                        <input type="text" wire:model.defer="telephone" class="form-control">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label for="email">Type:</label>
                        <select wire:model.defer="type" class="form-control">
                            <option value="" disabled>Selecione opcion</option>
                            <option value="administrador">Administrador</option>
                            {{-- <option value="profesor">Profesor</option> --}}
                            <option value="auxiliar">Auxiliar</option>
                        </select>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click.prevent="cancel()" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" wire:click.prevent="save()" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
    </div>
    {{-- MODAL - EDIT --}}
    <div class="modal" id="modal-edit-user" wire:ignore.self aria-hidden="true" data-target="#staticBackdrop">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Editar Usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="username">Usuario:</label>
                            <input type="text" wire:model.defer="username" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="password">Nueva Contraseña:</label>
                            <input type="password" wire:model.defer="password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="name">Nombre:</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="email">Email:</label>
                            <input type="text" wire:model.defer="email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="telephone">Telefono:</label>
                            <input type="text" wire:model.defer="telephone" class="form-control">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="email">Type:</label>
                            <select wire:model.defer="type" class="form-control">
                                <option value="" disabled>Selecione opcion</option>
                                <option value="administrador">Administrador</option>
                                {{-- <option value="profesor">Profesor</option> --}}
                                <option value="auxiliar">Auxiliar</option>
                            </select>
                        </div>
                    </div>
                    </form>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click.prevent="cancel()" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="button" wire:click.prevent="update()" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
    </div>
</div>
