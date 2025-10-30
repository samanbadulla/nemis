<?php

namespace App\Livewire\Offices\Moe\Profile;

use Livewire\Component;
use App\Models\Workplaces;
use App\Models\ProvincialMinistryOfEducationOffice;
use App\Models\ProvincialEducationOffice;
use App\Models\ZonalEducationOffice;
use App\Models\DivisionalEducationOffice;
use App\Models\Service;
use App\Models\EmployerCurrentAppointment;

class MoeOverview extends Component
{
    public $officeId;
    public $studentCount;
    public $provincialMinistryCount;
    public $provincialDeptCount;
    public $zonalOfficeCount;
    public $divisionCount;
    public $serviceCounts = [];

    public function mount($id)
    {
        $this->officeId = $id;

        // Dummy data (replace with actual relationships if needed)
        $this->studentCount = 0;
        $this->provincialMinistryCount = ProvincialMinistryOfEducationOffice::count();
        $this->provincialDeptCount = ProvincialEducationOffice::count();
        $this->zonalOfficeCount = ZonalEducationOffice::count();
        $this->divisionCount = DivisionalEducationOffice::count();

        // Count staff per service
        $this->serviceCounts = Service::all()->map(function ($service) {
            $count = EmployerCurrentAppointment::where('service_id', $service->service_id)
                ->whereNotNull('workplace_id')
                ->count();

            return (object)[
                'service_name' => $service->service_name,
                'staff_count' => $count,
            ];
        });
    }

    public function render()
    {
        return view('livewire.offices.moe.profile.moe-overview', [
            'officeId' => $this->officeId,
            'serviceCounts' => $this->serviceCounts,
        ]);
    }
}
