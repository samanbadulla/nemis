<?php

namespace App\Livewire\Principal\Profile;

use App\Models\People;
use Livewire\Component;
use App\Models\Position;
use App\Models\Workplaces;
use App\Models\OfficeLevel;
use App\Models\ServiceRank;
use Illuminate\Validation\Rule;
use App\Models\EmployerAppointment;
use App\Models\InstitutionCategory;
use App\Models\ZonalEducationOffice;
use App\Models\EmployerAppointmentHistory;
use App\Models\EmployerCurrentAppointment;

class PrincipalEmployment extends Component
{
    public $id;
    public $people;
    public $principalAppointment;

    // Dropdown options (collections for select boxes)
    public $userServicesOptions = [];
    public $ranksOptions = [];
    public $positionOption = [];
    public $officeLevelOption = [];
    public $zonalEducationOfficeOption = [];
    public $institutionCategoryOption = [];
    public $workingPlaceOption = [];

    // Selected dropdown values / input fields
    public $recordType;
    public $service;
    public $rank;
    public $position;
    public $officeLevel;
    public $institutionCategory;
    public $zonalEducationOffice;
    public $workingPlace;
    public $appointDate;
    public $endedDate;

    protected function rules()
    {
        return [
            'recordType' => ['required', Rule::in(['0', '1', '2', '3'])],
            'service' => ['required'],
            'rank' => ['required', 'exists:service_ranks,rank_id'],
            'position' => ['required', 'exists:positions,position_id'],
            'officeLevel' => ['required', 'exists:office_levels,office_level_id'],
            'zonalEducationOffice' => ['nullable', 'exists:zonal_education_offices,workplace_id'],
            'institutionCategory' => ['nullable', 'exists:institution_categories,institution_category_id'],
            'workingPlace' => ['required', 'exists:workplaces,workplace_id'],
            'appointDate' => ['required', 'date', 'before_or_equal:today'],
            'endedDate' => ['nullable', 'date', 'after:appointDate'],
        ];
    }

    protected function messages()
    {
        return [
            'recordType.required' => 'Please select the update type.',
            'recordType.in' => 'Invalid update type selected.',

            'service.required' => 'Please select a service.',
            'service.exists' => 'The selected service does not exist.',

            'rank.required' => 'Please select a rank.',
            'rank.exists' => 'The selected rank does not exist.',

            'position.required' => 'Please select a position.',
            'position.exists' => 'The selected position does not exist.',

            'officeLevel.required' => 'Please select the office level.',
            'officeLevel.exists' => 'Invalid office level selected.',

            'workingPlace.required' => 'Please select a working place.',
            'workingPlace.exists' => 'The selected working place does not exist.',

            'appointDate.required' => 'Please enter the appointed date.',
            'appointDate.date' => 'Appointed date must be a valid date.',
            'appointDate.before_or_equal' => 'Appointed date cannot be in the future.',

            'endedDate.date' => 'Ended date must be a valid date.',
            'endedDate.after' => 'Ended date must be after the appointed date.',
        ];
    }

    public function mount($id)
    {
        // Load dropdown data
        $this->officeLevelOption = OfficeLevel::all();
        $this->zonalEducationOfficeOption = ZonalEducationOffice::all();
        $this->institutionCategoryOption = InstitutionCategory::all();
        
        $this->people = People::with('currentAppointment')->find($id);
        if ($this->people && $this->people->currentAppointment) {
            $appointmentId = $this->people->currentAppointment->appointment_id;
            $this->principalAppointment = EmployerCurrentAppointment::where('appointment_id', $appointmentId)->first();

            // Load available service records for this employee
            $this->userServicesOptions = EmployerAppointment::where('employee_id', $this->people->people_id)->get();
            
        } else {
            $this->principalAppointment = null;
        }
    }

        /**
     * When 'service' dropdown changes,
     * dynamically update ranks and positions.
     */
    public function updatedService($value)
    {
        $this->ranksOptions = ServiceRank::where('service_id', $value)->get();
        $this->positionOption = Position::where('service_id', $value)->get();
    }

    /**
     * When 'officeLevel' changes,
     * update workplaces accordingly.
     */
    public function updatedOfficeLevel($value)
    {
        if ($value === 'OLID006') {
            // Special case for institutions
            $this->workingPlaceOption = collect();
            $this->workingPlace = '';
        } else {
            $this->workingPlaceOption = Workplaces::where('office_level_id', $value)->get();
            $this->workingPlace = '';
        }
    }

    /**
     * When 'zonalEducationOffice' changes,
     * filter institutions by ZEO + category.
     */
    public function updatedZonalEducationOffice($value)
    {
        if ($value && $this->institutionCategory) {
            $this->workingPlaceOption = Workplaces::where('office_level_id', 'OLID006')
                ->whereHas('institution', function ($query) use ($value) {
                    $query->where('zeo_wp_id', $value)
                        ->where('institution_category_id', $this->institutionCategory);
                })
                ->get();
        } else {
            $this->workingPlaceOption = collect();
        }

        $this->workingPlace = '';
    }

    /**
     * When 'institutionCategory' changes,
     * filter institutions by category + ZEO.
     */
    public function updatedInstitutionCategory($value)
    {
        if ($value && $this->zonalEducationOffice) {
            $this->workingPlaceOption = Workplaces::where('office_level_id', 'OLID006')
                ->whereHas('institution', function ($query) use ($value) {
                    $query->where('institution_category_id', $value)
                        ->where('zeo_wp_id', $this->zonalEducationOffice);
                })
                ->get();
        } else {
            $this->workingPlaceOption = collect();
        }

        $this->workingPlace = '';
    }

    /**
     * Save or update the teacher's service record.
     */
    public function saveServiceRecord()
    {
        $this->validate([
            'recordType' => ['required', Rule::in(['0', '1', '2', '3'])],
            'service' => ['required'],
            'rank' => ['required', 'exists:service_ranks,rank_id'],
            'position' => ['required', 'exists:positions,position_id'],
            'officeLevel' => ['required', 'exists:office_levels,office_level_id'],
            'zonalEducationOffice' => ['nullable', 'exists:zonal_education_offices,workplace_id'],
            'institutionCategory' => ['nullable', 'exists:institution_categories,institution_category_id'],
            'workingPlace' => ['required', 'exists:workplaces,workplace_id'],
            'appointDate' => ['required', 'date', 'before_or_equal:today'],
            'endedDate' => ['nullable', 'date', 'after:appointDate'],
        ]);

        $appointment = EmployerAppointment::where('employee_id', $this->people->people_id)
            ->where('service_id', $this->service)
            ->first();

        EmployerAppointmentHistory::create([
            'appointment_id' => $appointment->appointment_id,
            'employee_id' => $this->people->people_id,
            'appoint_date' => $this->appointDate,
            'end_date' => $this->endedDate,
            'service_id' => $this->service,
            'rank_id' => $this->rank,
            'position_id' => $this->position,
            'office_level_id' => $this->officeLevel,
            'workplace_id' => $this->workingPlace,
            'updated_type' => $this->recordType,
        ]);

        session()->flash('success', 'New service record added successfully!');
    }

    public function render()
    {
        $serviceUpdate = collect();

        if ($this->people && $this->people->currentAppointment) {
            $serviceUpdate = EmployerAppointmentHistory::where('employee_id', $this->people->currentAppointment->employee_id)
                ->with(['position', 'service', 'rank', 'workplace']) // eager load relations
                ->orderBy('appoint_date', 'desc') // use 'desc or asc' for newest first
                ->get();
        } else {
            $serviceUpdate = collect(); // return an empty collection if no employee
        }
        
        return view('livewire.principal.profile.principal-employment', compact('serviceUpdate'));
    }
}
