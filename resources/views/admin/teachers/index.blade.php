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
              <h1>Profesores </h1>
            </div>
            
        </div>
        </div> 
    </section>
    <section class="content">
        <div class="container-fluid">
              <livewire:teachers.table></livewire:teachers.table>
        </div>
    </section>
</div>
@endsection
@push('scripts')
<script>
window.livewire.on('closeModal',()=>{
    $("#modal-register").modal('hide');
    $("#modal-edit").modal('hide');
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