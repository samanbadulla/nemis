<?php

namespace App\Livewire\Teacher\Profile;

use App\Models\People;
use Livewire\Component;

class TeacherQualification extends Component
{
    public $id;
    public $teacher;

    public $qualifications = [
        [
            'degree' => 'Bachelor',
            'institution' => 'University of ruhuna',
            'year' => '2022',
            'grade' => 'Genaral',
        ],
        [
            'degree' => 'Advanced certificate',
            'institution' => 'State College',
            'year' => '2020',
            'grade' => 'A',
        ],
        [
            'degree' => 'Higher Secondary Certificate (HSC)',
            'institution' => 'Local High School',
            'year' => '2016',
            'grade' => '90%',
        ],
    ];

    public function mount($id)
    {
        $this->teacher = People::find($id);
    }
    
    public function render()
    {
        return view('livewire.teacher.profile.teacher-qualification');
    }
}
