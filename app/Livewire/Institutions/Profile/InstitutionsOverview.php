<?php

namespace App\Livewire\Institutions\Profile;

use Livewire\Component;
use App\Models\Institution;

class InstitutionsOverview extends Component
{
    public $id;
    //public $institution;

    public function render()
    {
        $institution = Institution::find($this->id);
        return view('livewire.institutions.profile.institutions-overview', compact('institution'));
    }
}
