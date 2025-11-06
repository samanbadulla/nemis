<?php

namespace App\Livewire\MainTables;

use Livewire\Component;
use App\Models\CivilStatus;

class MainTablesCivilStatus extends Component
{
    public function render()
    {
        $civilStatus = CivilStatus::orderBy('civil_status_id')->paginate(50);
        return view('livewire.main-tables.main-tables-civil-status',compact('civilStatus'));
    }
}
