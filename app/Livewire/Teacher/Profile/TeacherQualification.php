<?php

namespace App\Livewire\Teacher\Profile;

use App\Models\People;
use Livewire\Component;

class TeacherQualification extends Component
{
    public $id;
    public $teacher;

    public function mount($id)
    {
        $this->teacher = People::find($id);
    }
    
    public function render()
    {
        return view('livewire.teacher.profile.teacher-qualification');
    }
}
