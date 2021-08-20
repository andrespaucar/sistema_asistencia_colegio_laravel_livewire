<?php

namespace App\Http\Livewire\Teachers;

use App\Models\Course;
use App\Models\Degrees;
use App\Models\Section;
use App\Models\User;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $name, $telephone, $username, $password,
    $section_user=[],$course_id = 1;
    public $ids,$sections = [], $degrees = [], $courses = [];

    protected $listeners = ['del'=> 'del'];

    public function hydrate()
    {
        $this->courses = Course::select('id','name')->get();
    }
    public function render()
    {
        return view('livewire.teachers.table',[
            'teachers'=> User::whereType('profesor')
                    ->select('id','username','name','telephone','type') 
                    ->paginate(10)
        ]);
    }
    public function add()
    {
        $this->degrees = Degrees::select('id','name')->with('sections:id,name,degree_id')->get();
       
    }
    public function changeSection($val,$key){
        // $this->sections[$key]= Section::where('degree_id',$val)->select('id','name','degree_id')->get();
        $this->sections[$key]= $this->degrees[$val-1]['sections'] ;
    }
    public function create(){
        try {
            $teacher = User::create([
                'username' => $this->username,
                'password' => bcrypt($this->password),
                'name' => $this->name,
                'telephone' => $this->telephone,
                // 'email'=> '-',
                'type' => 'profesor',
                'course_id' => $this->course_id
            ]);
            $teacher->section_user()->sync($this->section_user);
            $this->close();
            $this->emit('closeModal');
        } catch (Exception $e) {
            $this->addError('error','Error.'.$e->getMessage());
             
        }
    }
    public function edit($id)
    {
        $this->degrees = Degrees::select('id','name')->with('sections:id,name,degree_id')->get();

        $teacher = User::whereType('profesor')->whereId($id)
            ->select('id','username','name','telephone','type','course_id')
            ->with(['section_user:id,name,degree_id'])->first()->toArray();
        $this->fill([
            'ids' => $teacher['id'],
            'name' => $teacher['name'],
            'telephone' => $teacher['telephone'],
            'username' => $teacher['username'],
            'course_id' => $teacher['course_id']
            // 'section_user' => $teacher['section_user'] 
        ]);
        foreach ($teacher['section_user']  as $key => $value) {
            $this->section_user[] = ['section_id' => $value['pivot']['section_id'],
                                    'degree_id' => $value['degree_id']];
        }
        
    }
    public function update()
    {
        try {
            $teacher = User::find($this->ids);
            $teacher->username = $this->username;
            $teacher->name = $this->name;
            $teacher->course_id = $this->course_id;
            // $user->email = $this->email ;
            $teacher->telephone = $this->telephone;
            if(trim($this->password)){
                $teacher->password = bcrypt($this->password);
            }
            $teacher->save();
            $teacher->section_user()->sync($this->section_user);
            $this->close();
            $this->emit('closeModal');
        } catch (Exception $e) {
            $this->addError('error','Error.'.$e->getMessage());
        }
    }
    public function delItemSection($key)
    {
        unset($this->section_user[$key]);
    }
    public function add_section_user()
    {
        $this->section_user[] = ['section_id' => null,'degree_id' => null];
    }
    public function close()
    {
        $this->resetInputFields();
    }
    private function resetInputFields(){
        $this->reset(['name', 'telephone', 'username', 'password','section_user','course_id']);
        $this->reset(['ids','sections', 'degrees','courses']);
    }

    public function del($id)
    {
        try {
            $teacher = User::find($id);
            $teacher->section_user()->sync([]);
            $teacher->delete();
        } catch (Exception  $e) {
            $this->addError('errorDelete','Error.'.$e->getMessage());
        }
    }
}
