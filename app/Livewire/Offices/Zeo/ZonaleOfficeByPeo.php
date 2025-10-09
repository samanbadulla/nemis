<?php

namespace App\Livewire\Offices\Zeo;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ZonalEducationOffice;
use App\Models\ProvincialEducationOffice;

class ZonaleOfficeByPeo extends Component
{
    use WithPagination;

    public $id;
    public $province;

    public function mount($id)
    {
        $this->id = $id;
        $this->province = ProvincialEducationOffice::findOrFail($id);
        //dd($this->province->workplace_id);
    }

    public function render()
    {
        // Get zonal offices linked to this province’s workplace_id
        $zonalEducationOffices = ZonalEducationOffice::where('peo_wp_id', $this->province->workplace_id)
            ->paginate(50);
        //dd( $this->province->workplace_id);

        return view('livewire.offices.zeo.zonale-office-by-peo', [
            'zonalEducationOffices' => $zonalEducationOffices,
        ]);
    }
}
