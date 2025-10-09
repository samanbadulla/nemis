<?php

namespace App\Livewire\Offices\Peo;

use Livewire\Component;
use App\Models\ProvincialEducationOffice;

class PeoOfficesList extends Component
{
    public function render()
    {
        $provincialEducationOffices = ProvincialEducationOffice::paginate(50); // 50 items per page
        //dd($divisionalEducationOffices);
        return view('livewire.offices.peo.peo-offices-list', compact('provincialEducationOffices'));
    }
}
