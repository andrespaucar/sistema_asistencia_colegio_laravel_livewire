<?php

namespace App\Http\Livewire\Sections\Degree\Filters;

use App\Models\AssistanceStudent;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Filter extends Component
{
    public $sectionId,$gradeId;
    public $fullname_student,$search_result,$students;
    public $date;
    public function mount()
    {
        $this->date = date('Y-m-d');
    }
    public function render()
    {
        if(!empty($this->fullname_student)){
            
            $this->students = Student::where('section_id',$this->sectionId)
            ->where('fullname','like','%'.$this->fullname_student.'%')
            ->get();
        }else{$this->students=[];$this->search_result = [];}
        return view('livewire.sections.degree.filters.filter' );
    }
    public function search()
    {
        $id_student = explode(' - ',$this->fullname_student)[1];
        $student = AssistanceStudent::where('student_id',$id_student)
                    ->where('user_id',Auth::id())
                    ->where('date',$this->date)->first(); 
        $this->search_result = $student;
        $this->students = [];
    }
}
