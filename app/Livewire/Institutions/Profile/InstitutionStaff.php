<?php

namespace App\Livewire\Institutions\Profile;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Institution;
use App\Models\EmployerCurrentAppointment;

class InstitutionStaff extends Component
{
    use WithPagination;

    public $institutionId;

    public function mount($id)
    {
        $this->institutionId = $id;
    }

    public function render()
    {
        $institution = Institution::find($this->institutionId);

        $staffList = collect(); // Default empty

        if ($institution && $institution->workplace_id) {
            $staffList = EmployerCurrentAppointment::with([
                'employee',
                'position',
                'service',
                'rank'
            ])
            ->where('workplace_id', $institution->workplace_id)
            ->paginate(10); // You can change number per page
        }

        return view('livewire.institutions.profile.institution-staff', [
            'staffList' => $staffList,
            'institutionId' => $this->institutionId,
        ]);
    }
}
