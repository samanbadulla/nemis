<?php

namespace App\Livewire\Teacher\Profile;

use App\Models\EmployerAppointmentHistory;
use App\Models\People;
use App\Models\Teacher;
use Livewire\Component;

class TeacherEmployment extends Component
{
    public $id;
    public $people;
    public $teacherAppointment;

    public function mount($id)
    {
        $this->people = People::with('currentAppointment')->find($id);

        if ($this->people && $this->people->currentAppointment) {
            $appointmentId = $this->people->currentAppointment->appointment_id;
            $this->teacherAppointment = Teacher::where('appointment_id', $appointmentId)->first();
        } else {
            $this->teacherAppointment = null;
        }
    }


    public function render()
    {
        $serviceUpdate = EmployerAppointmentHistory::where('employee_id', $this->people->currentAppointment->employee_id)->get();
        return view('livewire.teacher.profile.teacher-employment', compact('serviceUpdate'));
    }
}
