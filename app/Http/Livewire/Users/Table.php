<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';

    public $username,$password,$name,$email,$telephone,$type = '',$ids;

    public $modalTitle = '';
    public $isModalOpen = false;

    protected $listeners = ['del'=> 'del'];

    public function render()
    {
        
        return view('livewire.users.table',[
            'users' => User::whereIn('type',['administrador','profesor','auxiliar'])->paginate(10)
        ]);
    }
    private function resetInputFields()
    {
        $this->username = '';
        $this->password = '';
        $this->name = '';
        $this->email = '';
        $this->telephone = '';
        $this->type = '';

        $this->ids = null;
        
    }
    public function modalOpen()
    {
        $this->modalTitle = 'Registrar Usuario';
        $this->isModalOpen = true;
    }
    public function add()
    {
        $this->modalTitle = "Registrar Usuario";
    }
    public function edit($id)
    {
        $this->modalTitle = "Editar Usuario";
        $user = User::whereId($id)->first();
        $this->ids = $user->id;//nos servira para actualizar
        $this->username = $user->username; 
        $this->name = $user->name;
        $this->email = $user->email;
        $this->telephone = $user->telephone;
        $this->type = $user->type;
    }
    public function del($id)
    {
        User::destroy($id); 
    }
    public function save()
    {
        User::create([
            'username' => $this->username,
            'password' => bcrypt($this->password),
            'name' => $this->name,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'type' => $this->type,
        ]);
        
        $this->resetInputFields();
        $this->emit('userStore');
    }
    public function update()
    {
        $user = User::find($this->ids);
        $user->username = $this->username ;
        $user->name = $this->name ;
        $user->email = $this->email ;
        $user->telephone = $this->telephone ;
        $user->type = $this->type ;
        if(trim($this->password)){
            $user->password = bcrypt($this->password);
        }
        $user->save();

        $this->resetInputFields();
        $this->emit('userStore');
        
    }
    public function cancel()
    {
        $this->resetInputFields();
    }
}
