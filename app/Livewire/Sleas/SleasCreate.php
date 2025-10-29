<?php

namespace App\Livewire\Sleas;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Title;
use App\Models\People;
use App\Models\Service;
use App\Models\Teacher;
use App\Models\Religion;
use App\Models\Ethnicity;
use App\Models\BloodGroup;
use App\Models\GenderList;
use App\Models\GnDivision;
use App\Models\CivilStatus;
use App\Models\Institution;
use App\Models\ServiceRank;
use App\Models\SubjectList;
use App\Models\TeacherType;
use App\Models\DistrictsList;
use App\Models\TeacherCategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\EmployerAppointment;
use App\Models\InstitutionCategory;
use App\Models\MediumOfInstruction;
use App\Models\ZonalEducationOffice;
use Illuminate\Support\Facades\Hash;
use App\Models\EmployerCurrentAppointment;
use App\Models\DivisionalSecretariatOffice;

use App\Rules\UniqueHashedNic;
use App\Rules\UniquePhoneAcrossTables;

class SleasCreate extends Component
{
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
    public $teacherCategory, $firstAppointmentDate, $appointmentLetterNo;
    public $service, $serviceRank, $teacherType, $appointmentSubject, $appointmentMedium;
    public $mainTeachingSubject, $secondaryTeachingSubject;
    public $zonalEducationOffice, $institutionCategory, $institution;

    // -------------------------
    // Dropdown Options
    // -------------------------
    public $titleOptions = [], $religionOptions = [], $genderOptions = [], $ethnicityOptions = [], $civilStatusOptions = [];
    public $bloodGroupOptions = [], $healthConditionOptions = [];
    public $districtOption = [], $divisionalSecretaryofficeOption = [], $gnDivisionOption = [];
    public $servicesOption = [], $ranksOption = [], $institutionCategoryOption = [], $institutionOption = [];
    public $teacherCategoriesOption = [], $appointmentSubjectOption = [], $appointmentMediumOptions = [];
    public $teacherTypeOptions = [], $zonalEducationOfficeOption = [];

    // -------------------------
    // Validation Rules
    // -------------------------
    protected function rules()
    {
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
            'healthProblem' => 'required_if:healthCondition,false|string|max:1000',
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

            'firstAppointmentDate' => 'required|date',
            'appointmentLetterNo' => 'required|string|max:20',
            'service' => 'required|string',
            'serviceRank' => 'required|string',

            'appointmentSubject' => 'required|string',
            'appointmentMedium' => 'required|string',

            'zonalEducationOffice' => 'required|string',
            'institutionCategory' => 'required|string',
            'institution' => 'required|string',
        ];
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
    // Live Validation on Field Update
    // -------------------------
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // -------------------------
    // Mount Method for Dropdowns
    // -------------------------
    public function mount()
    {
        $this->titleOptions = Title::all();
        $this->genderOptions = GenderList::all();
        $this->religionOptions = Religion::all();
        $this->ethnicityOptions = Ethnicity::all();
        $this->civilStatusOptions = CivilStatus::all();
        $this->bloodGroupOptions = BloodGroup::all();
        $this->healthConditionOptions = [true => 'Yes', false => 'No'];
        $this->districtOption = DistrictsList::orderBy('district_name')->get();
        $this->servicesOption = Service::all();
        $this->ranksOption = collect();
        $this->institutionCategoryOption = InstitutionCategory::all();
        $this->institutionOption = collect();
        $this->teacherCategoriesOption = TeacherCategory::all();
        $this->appointmentSubjectOption = SubjectList::all();
        $this->appointmentMediumOptions = MediumOfInstruction::all();
        $this->teacherTypeOptions = TeacherType::all();
        $this->zonalEducationOfficeOption = ZonalEducationOffice::all();

        $this->healthCondition = 1; // Default to healthy
    }

    // -------------------------
    // Dynamic Dropdown Updates
    // -------------------------
    public function updatedDistrict($value)
    {
        $this->divisionalSecretaryofficeOption = DivisionalSecretariatOffice::where('district_id', $value)
            ->orderBy('dso_name')->get();
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

    public function updatedInstitutionCategory($value)
    {
        if ($value && $this->zonalEducationOffice) {
            $this->institutionOption = Institution::where('institution_category_id', $value)
                ->where('zeo_wp_id', $this->zonalEducationOffice)
                ->get();
            $this->institution = '';
        } else {
            $this->institutionOption = collect();
        }
    }

    public function updatedHealthCondition()
    {
        if ($this->healthCondition == true) {
            $this->healthProblem = null;
        }
    }

    // -------------------------
    // Save Method
    // -------------------------
    public function save()
    {
        $this->validate([
            'title' => 'required|string',
            'nic' => ['required', 'string', 'regex:/^(\d{9}[vVxX]|\d{12})$/', new UniqueHashedNic()],
            //'nic' => ['required', 'string', 'min:10', 'max:12', new UniqueHashedNic()],
            'fullName' => 'required|string|max:255',
            'gender' => 'required|string',
            'birthday' => 'required|date',
            'religion' => 'required|string',
            'ethnicity' => 'required|string',
            'civilStatus' => 'required|string',
            'bloodGroup' => 'required|string',
            'healthCondition' => 'required|boolean',
            'healthProblem' => 'nullable|string|max:1000',
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
            'teacherCategory' => 'required|string',
            'firstAppointmentDate' => 'required|date',
            'appointmentLetterNo' => 'required|string|max:20',
            'service' => 'required|string',
            'serviceRank' => 'required|string',
            'teacherType' => 'required|string',
            'appointmentSubject' => 'required|string',
            'appointmentMedium' => 'required|string',
            'mainTeachingSubject' => 'required|string',
            'secondaryTeachingSubject' => 'required|string',
            'zonalEducationOffice' => 'required|string',
            'institutionCategory' => 'required|string',
            'institution' => 'required|string',
        ]);

        DB::beginTransaction(); // Start transaction

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
                'position_id' => 'POS001', // Teacher Position
                'office_level_id' => 'OLID006', // Institution Level
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
                'office_level_id' => 'OLID006',
                'position_id' => 'POS001',
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

            $user->assignRole('sleas');

            DB::commit(); // Commit only if all operations succeeded

            session()->flash('success', 'SLEAS Officer Profile created successfully!');
            $this->resetForm();
        } catch (\Throwable $e) {
            DB::rollBack(); // Rollback on any failure
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }



    private function resetForm()
    {
        $this->reset([
            'nic',
            'title',
            'fullName',
            'gender',
            'birthday',
            'religion',
            'ethnicity',
            'civilStatus',
            'bloodGroup',
            'healthCondition',
            'healthProblem',
            'contact',
            'email',
            'district',
            'divisionalDecretaryOffice',
            'gnDivision',
            'addressLine1',
            'addressLine2',
            'addressLine3',
            'postalCode',
            'latitude',
            'longitude',
            'teacherCategory',
            'firstAppointmentDate',
            'appointmentLetterNo',
            'service',
            'serviceRank',
            'teacherType',
            'appointmentSubject',
            'appointmentMedium',
            'mainTeachingSubject',
            'secondaryTeachingSubject',
            'zonalEducationOffice',
            'institutionCategory',
            'institution'
        ]);
    }

    public function render()
    {
        return view('livewire.sleas.sleas-create');
    }
}
