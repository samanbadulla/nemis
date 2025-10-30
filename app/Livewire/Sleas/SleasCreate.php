<?php

namespace App\Livewire\Sleas;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Title;
use App\Models\People;
use App\Models\Service;

use App\Models\Teacher;
use Livewire\Component;
use App\Models\Position;
use App\Models\Religion;
use App\Models\Ethnicity;
use App\Models\BloodGroup;
use App\Models\GenderList;
use App\Models\GnDivision;
use App\Models\Workplaces;
use App\Models\CivilStatus;
use App\Models\Institution;
use App\Models\OfficeLevel;
use App\Models\ServiceRank;
use App\Models\DistrictsList;
use App\Rules\UniqueHashedNic;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\EmployerAppointment;
use App\Models\InstitutionCategory;

use App\Models\ZonalEducationOffice;
use Illuminate\Support\Facades\Hash;
use App\Rules\UniquePhoneAcrossTables;
use App\Models\EmployerCurrentAppointment;
use App\Models\DivisionalSecretariatOffice;

class SleasCreate extends Component
{
    public $step = 1;
    public $maxStep = 4;

    // -------------------------
    // Personal Details
    // -------------------------
    public $nic, $title, $fullName, $gender, $birthday, $religion;
    public $ethnicity, $civilStatus, $bloodGroup, $healthCondition, $healthProblem;

    // -------------------------
    // Contact Details
    // -------------------------
    public $contact, $email, $district, $divisionalDecretaryOffice, $gnDivision;
    public $addressLine1, $addressLine2, $addressLine3, $postalCode, $latitude, $longitude;

    // -------------------------
    // Appointment Details
    // -------------------------
    public $firstAppointmentDate, $appointmentLetterNo;
    public $service, $serviceRank, $position;
    public $zonalEducationOffice, $institutionCategory, $institution;

    // -------------------------
    // Current Appointment
    // -------------------------
    public $teacherRegType, $currentAppointmentDate, $currentAppointmentLetterNo, $currentService, $currentServiceRank, $currentPosition;
    public $currentZonalEducationOffice, $currentInstitutionCategory, $currentInstitution;

    // -------------------------
    // Dropdown Options
    // -------------------------
    public $titleOptions = [], $religionOptions = [], $genderOptions = [], $ethnicityOptions = [], $civilStatusOptions = [];
    public $bloodGroupOptions = [], $healthConditionOptions = [];
    public $districtOption = [], $divisionalSecretaryofficeOption = [], $gnDivisionOption = [];
    public $servicesOption = [], $ranksOption = [], $currentRanksOption = [], $positionOption = [], $currentPositionOption = [], $institutionCategoryOption = [], $institutionOption = [], $currentInstitutionOption = [];
    public $zonalEducationOfficeOption = [];
    public $officeLevelOption = [], $workingPlaceOption = [];

    public $officeLevel, $currentOfficeLevel;

    // -------------------------
    // Validation Rules
    // -------------------------
    protected function rulesForCurrentStep()
    {
        switch ($this->step) {
            case 1:
                return [
                    'nic' => ['required', 'string', 'min:10', 'max:12', new UniqueHashedNic()],
                    'title' => 'required|string',
                    'fullName' => 'required|string|max:255',
                    'gender' => 'required|string',
                    'birthday' => 'required|date',
                    'religion' => 'required|string',
                    'ethnicity' => 'required|string',
                    'civilStatus' => 'required|string',
                    'bloodGroup' => 'required|string',
                    'healthCondition' => 'required|boolean',
                    'healthProblem' => 'nullable|string|max:1000',
                ];
            case 2:
                return [
                    'contact' => ['required', 'string', 'max:10', new UniquePhoneAcrossTables()],
                    'email' => 'required|email|unique:people,email',
                    'district' => 'required|string',
                    'divisionalDecretaryOffice' => 'required|string',
                    'gnDivision' => 'required|string',
                    'addressLine1' => 'required|string|max:255',
                    'addressLine2' => 'required|string|max:255',
                    'addressLine3' => 'nullable|string|max:255',
                    'postalCode' => 'required|string|max:10',
                    'latitude' => 'nullable|numeric',
                    'longitude' => 'nullable|numeric',
                ];
            case 3:
                return [
                    'firstAppointmentDate' => 'required|date',
                    'appointmentLetterNo' => 'required|string|max:20',
                    'service' => 'required|string',
                    'serviceRank' => 'required|string',
                    'position' => 'required|string',
                    'zonalEducationOffice' => ['nullable', 'exists:zonal_education_offices,workplace_id'],
                    'institutionCategory' => ['nullable', 'exists:institution_categories,institution_category_id'],
                    'institution' => 'required|string',
                ];
            case 4:
                return [
                    'teacherRegType' => 'required|string',
                    'currentAppointmentDate' => 'required|date',
                    'currentAppointmentLetterNo' => 'required|string|max:20',
                    'currentService' => 'required|string',
                    'currentServiceRank' => 'required|string',
                    'currentPosition' => 'required|string',
                    'zonalEducationOffice' => ['nullable', 'exists:zonal_education_offices,workplace_id'],
                    'institutionCategory' => ['nullable', 'exists:institution_categories,institution_category_id'],
                    'currentInstitution' => 'required|string',
                ];
            default:
                return [];
        }
    }

    protected $messages = [
        'nic.required' => 'NIC is required',
        'fullName.required' => 'Full Name is required',
        'email.required' => 'Email is required',
        'email.email' => 'Enter a valid email',
        'contact.required' => 'Contact number is required',
        'contact.max' => 'Contact number should not exceed 10 digits',
        'healthProblem.required_if' => 'Please provide health problem details',
        'appointmentLetterNo.required' => 'Appointment letter number is required',
    ];

    // -------------------------
    // Live Validation on Update
    // -------------------------
    public function updated($propertyName)
    {
        $rules = $this->rulesForCurrentStep();
        if (array_key_exists($propertyName, $rules)) {
            $this->validateOnly($propertyName, $rules);
        }
    }

    // -------------------------
    // Step Navigation
    // -------------------------
    public function nextStep()
    {
        $this->validate($this->rulesForCurrentStep());
        if ($this->step < $this->maxStep) {
            $this->step++;
            $this->resetValidation();
        }
    }

    public function previousStep()
    {
        if ($this->step > 1) {
            $this->step--;
            $this->resetValidation();
        }
    }

    public function mount()
    {
        $this->titleOptions = Title::active()->get();
        $this->genderOptions = GenderList::active()->get();
        $this->religionOptions = Religion::active()->get();
        $this->ethnicityOptions = Ethnicity::active()->get();
        $this->civilStatusOptions = CivilStatus::active()->get();
        $this->bloodGroupOptions = BloodGroup::all();
        $this->healthConditionOptions = [true => 'Yes', false => 'No'];
        $this->districtOption = DistrictsList::active()->orderBy('district_name')->get();
        $this->servicesOption = Service::active()->get();
        $this->ranksOption = collect();
        $this->currentRanksOption = collect();
        $this->positionOption = Position::where('service_id','SER005')->get();
        $this->currentPositionOption = Position::where('service_id','SER005')->get();
        $this->institutionCategoryOption = InstitutionCategory::active()->get();
        $this->institutionOption = collect();
        $this->currentInstitutionOption = collect();
        $this->zonalEducationOfficeOption = ZonalEducationOffice::active()->get();
        $this->healthCondition = true;

        $this->officeLevelOption = OfficeLevel::all();
    }

    public function updatedDistrict($value)
    {
        $this->divisionalSecretaryofficeOption = DivisionalSecretariatOffice::where('district_id', $value)->orderBy('dso_name')->get();
        $this->divisionalDecretaryOffice = '';
        $this->gnDivision = '';
        $this->gnDivisionOption = collect();
    }

    public function updatedDivisionalDecretaryOffice($value)
    {
        $this->gnDivisionOption = GnDivision::where('dso_id', $value)->orderBy('gn_division_name')->get();
        $this->gnDivision = '';
    }

    public function updatedService($value)
    {
        $this->ranksOption = ServiceRank::where('service_id', $value)->get();
        $this->serviceRank = '';
    }

    public function updatedCurrentService($value)
    {
        $this->currentRanksOption = ServiceRank::where('service_id', $value)->get();
        $this->currentServiceRank = '';
    }

    public function updatedZonalEducationOffice($value)
    {
        if ($value && $this->institutionCategory) {
            $this->institutionOption = Institution::where('zeo_wp_id', $value)
                ->where('institution_category_id', $this->institutionCategory)
                ->get();
            $this->institution = '';
        } else {
            $this->institutionOption = collect();
        }
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
     * When 'currentOfficeLevel' changes,
     * update workplaces accordingly.
     */
    public function updatedCurrentOfficeLevel($value)
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

    public function updatedCurrentZonalEducationOffice($value)
    {
        if ($value && $this->currentInstitutionCategory) {
            $this->currentInstitutionOption = Institution::where('zeo_wp_id', $value)
                ->where('institution_category_id', $this->currentInstitutionCategory)
                ->get();
            $this->currentInstitution = '';
        } else {
            $this->currentInstitutionOption = collect();
        }
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

    public function updatedCurrentInstitutionCategory($value)
    {
        if ($value && $this->currentZonalEducationOffice) {
            $this->currentInstitutionOption = Institution::where('institution_category_id', $value)
                ->where('zeo_wp_id', $this->currentZonalEducationOffice)
                ->get();
            $this->currentInstitution = '';
        } else {
            $this->currentInstitutionOption = collect();
        }
    }

    public function updatedHealthCondition()
    {
        if ($this->healthCondition == true) {
            $this->healthProblem = null;
        }
    }

    // -------------------------
    // Dynamic Dropdown Behaviors
    // -------------------------
    public function updatedTeacherRegType($value)
    {
        if ($value === 'new') {
            $this->currentRanksOption = $this->ranksOption ;
            $this->cuttentPositionOption = $this->positionOption;
            $this->currentInstitutionOption = $this->institutionOption;

            $this->currentAppointmentDate = $this->firstAppointmentDate;
            $this->currentAppointmentLetterNo = $this->appointmentLetterNo;
            $this->currentService = $this->service;
            $this->currentServiceRank = $this->serviceRank;
            $this->currentZonalEducationOffice = $this->zonalEducationOffice;
            $this->currentInstitutionCategory = $this->institutionCategory;
            $this->currentInstitution = $this->institution;
        } else {
            $this->reset([
                'currentAppointmentDate',
                'currentAppointmentLetterNo',
                'currentService',
                'currentServiceRank',
                'currentZonalEducationOffice',
                'currentInstitutionCategory',
                'currentInstitution',
            ]);
            $this->currentRanksOption = collect();
            $this->currentPositionOption = Position::where('service_id','SER005')->get();
            $this->currentInstitutionOption = collect();
        }
    }

    // -------------------------
    // Save Logic
    // -------------------------
    public function save()
    {
        $this->validate($this->rulesForCurrentStep());

        DB::beginTransaction();

        try {
            // Save People
            $people = People::updateOrCreate(
                ['nic_hash' => hash('sha256', strtoupper($this->nic))],
                [
                    'nic' => strtoupper($this->nic),
                    'title_id' => $this->title,
                    'full_name' => ucwords(strtolower($this->fullName)),
                    'name_with_initials' => People::generateInitials($this->fullName),
                    'gender_id' => $this->gender,
                    'date_of_birth' => $this->birthday,
                    'religion_id' => $this->religion,
                    'ethnicity_id' => $this->ethnicity,
                    'civil_status_id' => $this->civilStatus,
                    'health_condition' => ucfirst(trim($this->healthCondition)),
                    'health_problem' => $this->healthProblem,
                    'blood_group_id' => $this->bloodGroup,
                    'email' => strtolower(trim($this->email)),
                    'phone' => $this->contact,
                    'district_id' => $this->district,
                    'gn_division_id' => $this->gnDivision,
                    'address_line1' => ucwords(strtolower($this->addressLine1)),
                    'address_line2' => ucwords(strtolower($this->addressLine2)),
                    'address_line3' => ucwords(strtolower($this->addressLine3)),
                    'postal_code' => $this->postalCode,
                    'profile_picture' => 'default.png',
                ]
            );

            $retirementDate = Carbon::parse($people->date_of_birth)->addYears(55);

            $appointment = EmployerAppointment::create([
                'appointment_id' => EmployerAppointment::generateAppointmentId($this->firstAppointmentDate),
                'employee_id' => $people->people_id,
                'first_appointment_date' => $this->firstAppointmentDate,
                'retirement_date' => $retirementDate,
                'service_id' => $this->service,
                'rank_id' => $this->serviceRank,
                'position_id' => $this->position,
                'office_level_id' => $this->officeLevel,
                'workplace_id' => $this->institution,
                'appointment_letter_no' => $this->appointmentLetterNo,
                'appointment_letter' => 'letter.pdf',
                'w_op_no' => null,
            ]);

            EmployerCurrentAppointment::create([
                'appointment_id' => $appointment->appointment_id,
                'employee_id' => $people->people_id,
                'appoint_date' => $this->firstAppointmentDate,
                'service_id' => $this->service,
                'rank_id' => $this->serviceRank,
                'office_level_id' => $this->currentOfficeLevel,
                'position_id' => $this->currentPosition,
                'workplace_id' => $this->institution,
            ]);

            $user = User::updateOrCreate(
                ['nic_hash' => $people->nic_hash],
                [
                    'nic' => $people->nic,
                    'nic_hash' => $people->nic_hash,
                    'people_id' => $people->people_id,
                    'name' => $people->name_with_initials,
                    'email' => $people->email,
                    'contact' => $people->phone,
                    'password' => Hash::make('password@123'),
                ]
            );

            $user->assignRole('principal');

            DB::commit();

            session()->flash('success', 'SLEAS Officer profile created successfully!');
            $this->resetForm();
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->reset([
            'nic', 'title', 'fullName', 'gender', 'birthday', 'religion',
            'ethnicity', 'civilStatus', 'bloodGroup', 'healthCondition', 'healthProblem',
            'contact', 'email', 'district', 'divisionalDecretaryOffice', 'gnDivision',
            'addressLine1', 'addressLine2', 'addressLine3', 'postalCode', 'latitude', 'longitude',
            'firstAppointmentDate', 'appointmentLetterNo', 'service',
            'serviceRank', 'position',
            'zonalEducationOffice',
            'institutionCategory', 'institution',
            'teacherRegType', 'currentAppointmentDate', 'currentAppointmentLetterNo',
            'currentService', 'currentServiceRank', 'currentPosition', 'currentZonalEducationOffice', 'currentInstitutionCategory',
            'currentInstitution',
        ]);
    }

    public function render()
    {
        return view('livewire.sleas.sleas-create');
    }
}
