<?php

namespace App\Http\Livewire\Sections\Degree\Students;

use App\Models\AssistanceStudent;
use App\Models\HistoryAssistanceSectionUser;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class PutAssistance extends Component
{
    public $sectionId,$gradeId;
    public $status = [];
    public $date;
    public $is_assistance_day;
    public $isRegisterAssitenceDay = true;
    public $countStudents;

    public function mount()
    {
        $this->date = date('Y-m-d');
        $this->is_assistance_day = HistoryAssistanceSectionUser::whereDate('created_at',$this->date)
                            ->where('section_id',$this->sectionId)->where('user_id',Auth::id())->first();

    }
    public function render()
    {
        $students = (isEmpty($this->is_assistance_day))? Student::where('section_id',$this->sectionId)->get():[];
        $this->countStudents = count($students);
        return view('livewire.sections.degree.students.put-assistance',[
            'students' => $students,
            'is_assistance_day' =>  $this->is_assistance_day
        ]);
    }
    public function save()
    {
        if($this->countStudents === count($this->status)){
            HistoryAssistanceSectionUser::create([
                'date' => $this->date,
                'time' => date('H:i:s'),
                'user_id' => Auth::id(),
                'section_id' => $this->sectionId,
                'degree_id' => $this->gradeId
            ]);
            
            foreach ($this->status as $key => $value) {
                AssistanceStudent::create([
                    'student_id' => $key,
                    'user_id' => Auth::id(),
                    'date' => $this->date ,
                    'time' => date('H:i:s'),
                    'status' => $value
                ]);
            }
            $this->isRegisterAssitenceDay = false; 
        }else{
            $this->addError('errorMarcarAsistencia','Falta completar la Asistencia');
        }
        
    }
}
