<?php

namespace App\Http\Livewire\Sections\Degree\Students;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination; 
    protected $paginationTheme = 'bootstrap';
    
    public $sectionId,$gradeId;

    public $modalTitle = null;
    public $fullname;
    public $ids;
    public function render()
    {
        return view('livewire.sections.degree.students.table',[
            'students' => Student::where('section_id',$this->sectionId)->paginate(10)
        ]);
    }

    public function todas_asistencias_alumno($id)
    {
        Student::whereId($id)->with('assistance_student')->get();
    }

    public function edit($id)
    {
        $student = Student::whereId($id)->first();
        $this->fullname = $student->fullname;
        $this->ids = $student->id;
    }

    public function openModal()
    {
         
    }
    public function create()
    {
        $this->validate([
            'fullname' => 'required'
        ]);
        Student::create([
            'fullname' => $this->fullname,
            'section_id' => $this->sectionId
        ]);
        $this->closeModal();
    }
    public function closeModal()
    {
        $this->reset('fullname');
        $this->emit('closeModal');
    }
    public function update()
    {
        $student = Student::find($this->ids);
        $student->fullname = $this->fullname;
        $student->save();
        $this->closeModal();
    }
}
