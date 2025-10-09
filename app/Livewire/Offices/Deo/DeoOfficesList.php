<?php

namespace App\Livewire\Offices\Deo;

use Livewire\Component;
use App\Models\DivisionalEducationOffice;

class DeoOfficesList extends Component
{
    public function render()
    {
        $divisionalEducationOffices = DivisionalEducationOffice::paginate(50); // 50 items per page
        //dd($divisionalEducationOffices);
        return view('livewire.offices.deo.deo-offices-list', compact('divisionalEducationOffices'));
    }
}
