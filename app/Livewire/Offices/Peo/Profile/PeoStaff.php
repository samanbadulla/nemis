<?php

namespace App\Livewire\Offices\Peo\Profile;

use Livewire\Component;
use App\Models\EmployerCurrentAppointment;
use App\Models\ProvincialEducationOffice;
use App\Models\Teacher;

class PeoStaff extends Component
{
    public $officeId;
    public $staffList = [];

    public function mount($id)
    {
        $this->officeId = $id;

        // Get the workplace_id for the selected PMOE
        $office = ProvincialEducationOffice::find($this->officeId);
        $workplaceId = $office?->workplace_id;

        if ($workplaceId) {
            $this->staffList = EmployerCurrentAppointment::with(['employee', 'position', 'service', 'rank'])
                ->where('workplace_id', $workplaceId)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.offices.peo.profile.peo-staff', [
            'officeId' => $this->officeId,
        ]);
    }
}
