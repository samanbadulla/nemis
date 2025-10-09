<?php

namespace App\Livewire\Offices\Pmoe;

use Livewire\Component;
use App\Models\ProvincialMinistryOfEducationOffice;

class PmoeOfficesList extends Component
{
    public function render()
    {
        $provincialEducationMinistries = ProvincialMinistryOfEducationOffice::paginate(50); // 50 items per page
        //dd($divisionalEducationOffices);
        return view('livewire.offices.pmoe.pmoe-offices-list', compact('provincialEducationMinistries'));
    }
}
