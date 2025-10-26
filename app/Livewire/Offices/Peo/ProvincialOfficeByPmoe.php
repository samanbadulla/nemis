<?php

namespace App\Livewire\Offices\Peo;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProvincialEducationOffice;
use App\Models\ProvincialMinistryOfEducationOffice;

class ProvincialOfficeByPmoe extends Component
{
    use WithPagination;

    public $id;
    public $pmoe;

    public function mount($id)
    {
        $this->id = $id;
        $this->pmoe = ProvincialMinistryOfEducationOffice::findOrFail($id);
        //dd($this->pmoe->workplace_id);
    }

    public function render()
    {
        $provincialEducationOffices = ProvincialEducationOffice::where('pmoe_wp_id', $this->pmoe->workplace_id)
            ->paginate(50); // 50 items per page
        return view('livewire.offices.peo.provincial-office-by-pmoe', compact('provincialEducationOffices'));
    }
}
