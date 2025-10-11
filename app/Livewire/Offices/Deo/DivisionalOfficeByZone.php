<?php

namespace App\Livewire\Offices\Deo;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\DivisionalEducationOffice;
use App\Models\ZonalEducationOffice;

class DivisionalOfficeByZone extends Component
{
    use WithPagination;

    public $id;
    public $zone;

    public function mount($id)
    {
        $this->id = $id;
        $this->zone = ZonalEducationOffice::findOrFail($id);
        //dd($this->province->workplace_id);
    }

    public function render()
    {
        $divisionalEducationOffices = DivisionalEducationOffice::where('zeo_wp_id', $this->zone->workplace_id)
            ->paginate(50);

        return view('livewire.offices.deo.divisional-office-by-zone', compact('divisionalEducationOffices'));
    }
}
