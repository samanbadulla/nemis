<?php

namespace App\Livewire\Institutions;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Institution;
use App\Models\ProvincialEducationOffice;
use App\Models\ZonalEducationOffice;
use App\Models\DivisionalEducationOffice;

class InstitutionsIndex extends Component
{
    use WithPagination;

    public $provinceOption = [];
    public $zoneOption = [];
    public $divisionOption = [];

    public $query = '';
    public $province = '';
    public $zone = '';
    public $division = '';

    public function mount()
    {
        $this->provinceOption = ProvincialEducationOffice::where('active_status', '1')->get();
    }

    public function updatedProvince($value)
    {
        $this->zone = '';
        $this->division = '';
        $this->zoneOption = ZonalEducationOffice::where('peo_wp_id', $value)
            ->where('active_status', '1')
            ->get();

        $this->divisionOption = [];
        $this->resetPage();
    }

    public function updatedZone($value)
    {
        $this->division = '';
        $this->divisionOption = DivisionalEducationOffice::where('zeo_wp_id', $value)
            ->where('active_status', '1')
            ->get();

        $this->resetPage();
    }

    protected $updatesQueryString = ['query', 'province', 'zone', 'division', 'page'];

    public function updated($field)
    {
        if (in_array($field, ['query', 'province', 'zone', 'division'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = Institution::query()->with(['zonalEducationOffice', 'divisionalEducationOffice']);

        // Search filter
        if ($this->query) {
            $search = trim($this->query);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('census_no', 'like', "%{$search}%");
            });
        }

        // Province filter (via zonal relationship)
        if ($this->province) {
            $query->whereHas('zonalEducationOffice', function ($q) {
                $q->where('peo_wp_id', $this->province);
            });
        }

        // Zonal filter
        if ($this->zone) {
            $query->where('zeo_wp_id', $this->zone);
        }

        // Divisional filter
        if ($this->division) {
            $query->where('deo_wp_id', $this->division);
        }

        $institutions = $query->orderBy('name')->paginate(50);

        return view('livewire.institutions.institutions-index', [
            'institutions' => $institutions,
        ]);
    }
}
