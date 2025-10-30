<?php

namespace App\Livewire\Sleas;

use App\Models\People;
use Livewire\Component;

class SleasList extends Component
{
    public $query = '';
    public $results = [];

    public function updatedQuery()
    {
        // Convert query to uppercase
        $search = strtoupper($this->query);

        if (strlen($search) >= 10) { // start searching at 10+ chars
            $nicHash = hash('sha256', $search);

            $this->results = People::where('full_name', 'like', "%{$search}%")
                ->orWhere('nic_hash', $nicHash)
                ->whereHas('currentAppointment', fn($q) => $q->where('service_id', 'SER005'))
                ->limit(10)
                ->get();
        } else {
            $this->results = [];
        }
    }

    public function render()
    {
        $employees = People::with([
            'currentAppointment.workplace',
            'currentAppointment.position',
            'currentAppointment.rank',
            'currentAppointment.service',
            'currentAppointment.workplace.ministry',
            'currentAppointment.workplace.provincial',
            'currentAppointment.workplace.zonal',
            'currentAppointment.workplace.divisional',
            'currentAppointment.workplace.institution',
        ])
            ->whereHas('currentAppointment', function ($query) {
                $query->where('service_id', 'SER005'); // Only SLEAS
            })
            ->get();

        return view('livewire.sleas.sleas-list', compact('employees'));
    }
}
