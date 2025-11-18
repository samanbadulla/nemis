<?php

namespace App\Livewire\Offices\Institutions;

use App\Models\Institution;
use Livewire\Component;

class InstitutionsList extends Component
{
    public function render()
    {
        $institutions = Institution::active()->paginate(10);
        return view('livewire.offices.institutions.institutions-list', compact('institutions'));
    }
}
