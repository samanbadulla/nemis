<?php

namespace App\Livewire\Offices\Zeo;

use Livewire\Component;
use App\Models\ZonalEducationOffice;

class ZeoOfficesList extends Component
{
    public function render()
    {
        $zonalEducationOffices = ZonalEducationOffice::paginate(50); // 50 items per page
        //dd($divisionalEducationOffices);
        return view('livewire.offices.zeo.zeo-offices-list', compact('zonalEducationOffices'));
    }
}
