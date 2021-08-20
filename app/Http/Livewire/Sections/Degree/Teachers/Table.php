<?php

namespace App\Http\Livewire\Sections\Degree\Teachers;

use App\Models\Course;
use App\Models\Section;
use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    //PROPS
    public $gradeId,$sectionId;
    // VARS
    public $prof_course,$courses;

    public function mount()
    {
        // $this->prof_course = User::select('id','name','course_id')->with('section_user')->get();
        $this->courses = Course::select('id','name')->get();
        $this->prof_course = Section::whereId($this->sectionId)->with('user')->first();
    }
    public function render()
    {
        return view('livewire.sections.degree.teachers.table',[
            // 'teachers' => User::whereType('profesor')->paginate(10)
        ]);
    }
}
