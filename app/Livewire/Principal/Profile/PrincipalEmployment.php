<?php

namespace App\Livewire\Principal\Profile;

use App\Models\People;
use Livewire\Component;
use App\Models\EmployerAppointment;
use App\Models\EmployerCurrentAppointment;

class PrincipalEmployment extends Component
{
    public $id;
    public $people;
    public $principalAppointment;

    public function mount($id)
    {
        $this->people = People::with('currentAppointment')->find($id);
        if ($this->people && $this->people->currentAppointment) {
            $appointmentId = $this->people->currentAppointment->appointment_id;
            $this->principalAppointment = EmployerCurrentAppointment::where('appointment_id', $appointmentId)->first();
        } else {
            $this->principalAppointment = null;
        }
    }

    public function render()
    {
        return view('livewire.principal.profile.principal-employment');
    }
}
