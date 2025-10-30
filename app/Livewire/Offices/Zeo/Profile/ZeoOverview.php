<?php

namespace App\Livewire\Offices\Zeo\Profile;

use App\Models\Service;
use Livewire\Component;
use App\Models\Workplaces;
use App\Models\Institution;
use App\Models\ZonalEducationOffice;
use App\Models\DivisionalEducationOffice;
use App\Models\EmployerCurrentAppointment;


class ZeoOverview extends Component
{
    public $officeId;
    public $workplace;
    public $studentCount;
    public $zonalOfficeCount;
    public $divisionCount;
    public $institutionCount;
    public $serviceCounts = [];

    public function mount($id)
    {
        $this->officeId = $id;

        $this->studentCount = 0; // Placeholder until real logic is needed

        // Optional: get the current workplace if needed in the view
         $workplace = ZonalEducationOffice::find($this->officeId);

         //dd($workplace);

        // Get all descendant workplaces
        //$peos = ProvincialEducationOffice::where('pmoe_wp_id', $workplace->workplace_id)->get();
        //$peoIds = $peos->pluck('workplace_id')->toArray();

        //$zeos = ZonalEducationOffice::where('peo_wp_id', $workplace->workplace_id)->get();
        //$zeoIds = $zeos->pluck('workplace_id')->toArray();

        $deos = DivisionalEducationOffice::where('zeo_wp_id', $workplace->workplace_id)->get();
        $deoIds = $deos->pluck('workplace_id')->toArray();

        $institutions = Institution::whereIn('deo_wp_id', $deoIds)->get();
        $institutionIds = $institutions->pluck('workplace_id')->toArray();

        // Combine all workplace IDs
        $allWorkplaceIds = array_merge(  $deoIds, $institutionIds);

        // Counts
       // $this->provincialDeptCount = count($peos);
       // $this->zonalOfficeCount = count($zeos);
        $this->divisionCount = count($deos);
        $this->institutionCount = count($institutions);

        // Service-wise staff counts
        $services = Service::all();
        foreach ($services as $service) {
            $staffCount = EmployerCurrentAppointment::where('service_id', $service->service_id)
                ->whereIn('workplace_id', $allWorkplaceIds)
                ->count();

            $this->serviceCounts[] = [
                'service_id' => $service->service_id,
                'name_en' => $service->service_name,
                'staff_count' => $staffCount
            ];
        }
    }

    public function render()
    {
        return view('livewire.offices.zeo.profile.zeo-overview', [
            'officeId' => $this->officeId,
            // 'workplace' => $workplace ?? null // if needed in blade
        ]);
    }
}
