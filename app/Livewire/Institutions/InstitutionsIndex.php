<?php

namespace App\Livewire\Institutions;

use Livewire\Component;
use App\Models\Institution;

class InstitutionsIndex extends Component
{
    public $query = '';
    public $results = [];
    public $zoneId = null;
    public $divisionId = null;

    public function updatedQuery()
    {
        // Convert query to uppercase
        $search = strtoupper($this->query);

        if (strlen($search) >= 1) { // start searching at 10+ chars

            $this->results = Institution::where('name', 'like', "%{$search}%")
                ->orWhere('census_no', $search)
                ->limit(10)
                ->get();
        } else {
            $this->results = [];
        }
    }
    
    public function render()
    {
        $institutions = Institution::paginate(50); // 50 items per page
        //dd($institutions);
        return view('livewire.institutions.institutions-index', compact('institutions'));
    }
}
