<?php

namespace App\Livewire\Offices\Moe;

use Livewire\Component;
use App\Models\MinistryOfEducationOffice;

class MoeOfficesList extends Component
{
    public function render()
    {
        $educationMinistries = MinistryOfEducationOffice::paginate(50); // 50 items per page
        //dd($divisionalEducationOffices);
        return view('livewire.offices.moe.moe-offices-list', compact('educationMinistries'));
    }
}
