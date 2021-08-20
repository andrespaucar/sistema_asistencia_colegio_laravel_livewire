@extends('layouts.app')

@section('head')
    <title>USUARIOS - SISTEMA ASISTENCIA CNI</title>
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Usuarios </h3>
            </div>
            {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Widgets</li>
                </ol>
            </div> --}}
            </div>
        </div> 
    </section>
    <section class="content" >
        <div class="container-fluid">
            <livewire:users.table/>
        </div>
    </section>
    
</div>
@endsection
@push('scripts')
<script>
window.livewire.on('userStore',()=>{
    $("#modal-add-user").modal('hide');
    $("#modal-edit-user").modal('hide');
})
window.livewire.on('delete',(id)=>{
    Swal.fire({
        title: 'Estas seguro?',
        text: 'Se eliminará el registro!',
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Eliminar!',
        cancelButtonText:'Cancelar',
    }).then(result=>{
        if(result.value){
            window.livewire.emit('del',id)
            Swal.fire('¡Eliminado!','El usuario ha sido eliminado.','success')
        }else{ 
            // Swal.fire({title:'Operación Cancelada!',icon:'success'})
        }
    })
})

</script>
@endpush