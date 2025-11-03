<?php

namespace App\Livewire\Teacher;

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Title;
use App\Models\People;

use App\Models\Service;
use App\Models\Teacher;
use Livewire\Component;
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
use App\Rules\UniqueHashedNic;
use App\Models\ApointedSubject;
use App\Models\TeacherCategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\EmployerAppointment;
use App\Models\InstitutionCategory;
use App\Models\MediumOfInstruction;
use App\Models\ZonalEducationOffice;
use Illuminate\Support\Facades\Hash;

use App\Rules\UniquePhoneAcrossTables;
use App\Models\EmployerCurrentAppointment;
use App\Models\DivisionalSecretariatOffice;

class TeacherCreate extends Component
{
    public $step = 1;
    public $maxStep = 4;

    // -------------------------
    // Personal Details
    // -------------------------
    public $nic, $title, $fullName, $gender, $birthday, $religion;
    public $ethnicity, $civilStatus, $bloodGroup, $healthCondition, $healthProblem;
    public $district, $divisionalDecretaryOffice, $gnDivision;

    // -------------------------
    // Contact Details
    // -------------------------
    public $contact, $email;
    public $addressLine1, $addressLine2, $addressLine3, $postalCode, $latitude, $longitude;
    public $tAddressLine1, $tAddressLine2, $tAddressLine3, $tPostalCode;

    // -------------------------
    // Appointment Details
    // -------------------------
    public $teacherCategory, $firstAppointmentDate, $appointmentLetterNo;
    public $service, $serviceRank, $teacherType, $appointmentSubject, $appointmentMedium;
    public $mainTeachingSubject, $secondaryTeachingSubject;
    public $zonalEducationOffice, $institutionCategory, $institution;

    // -------------------------
    // Current Appointment
    // -------------------------
    public $teacherRegType = 'existing', $currentAppointmentDate, $currentAppointmentLetterNo, $currentService, $currentServiceRank;
    public $currentZonalEducationOffice, $currentInstitutionCategory, $currentInstitution, $currentTeachingSubject;

    // -------------------------
    // Dropdown Options
    // -------------------------
    public $titleOptions = [], $religionOptions = [], $genderOptions = [], $ethnicityOptions = [], $civilStatusOptions = [];
    public $bloodGroupOptions = [], $healthConditionOptions = [];
    public $districtOption = [], $divisionalSecretaryofficeOption = [], $gnDivisionOption = [];
    public $servicesOption = [], $ranksOption = [], $currentRanksOption = [], $institutionCategoryOption = [], $institutionOption = [], $currentInstitutionOption = [];
    public $teacherCategoriesOption = [], $appointmentSubjectOption = [], $subjectOption = [], $appointmentMediumOptions = [];
    public $teacherTypeOptions = [], $zonalEducationOfficeOption = [];

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
                    'birthday' => 'required|date|before:today',
                    'religion' => 'required|string',
                    'ethnicity' => 'required|string',
                    'civilStatus' => 'required|string',
                    'bloodGroup' => 'required|string',
                    'healthCondition' => 'required|boolean',
                    'healthProblem' => 'nullable|required_if:healthCondition,false|string|max:1000',
                    'district' => 'required|string',
                    'divisionalDecretaryOffice' => 'required|string',
                    'gnDivision' => 'required|string',
                ];
            case 2:
                return [
                    'contact' => ['required', 'string', 'min:10', 'max:10', new UniquePhoneAcrossTables()],
                    'email' => 'required|email|unique:people,email',
                    'addressLine1' => 'required|string|max:255',
                    'addressLine2' => 'required|string|max:255',
                    'addressLine3' => 'nullable|string|max:255',
                    'postalCode' => 'required|string|max:10',
                    'latitude' => 'nullable|numeric|between:-90,90',
                    'longitude' => 'nullable|numeric|between:-180,180',
                    'tAddressLine1' => 'nullable|string|max:255',
                    'tAddressLine2' => 'nullable|string|max:255',
                    'tAddressLine3' => 'nullable|string|max:255',
                    'tPostalCode' => 'nullable|string|max:10',
                ];
            case 3:
                return [
                    'teacherCategory' => 'required|string',
                    'firstAppointmentDate' => 'required|date|before_or_equal:today',
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
                ];
            case 4:
                $rules = [
                    'teacherRegType' => 'required|string|in:new,existing',
                    'currentAppointmentDate' => 'required|date|before_or_equal:today',
                    'currentAppointmentLetterNo' => 'required|string|max:20',
                    'currentService' => 'required|string',
                    'currentServiceRank' => 'required|string',
                    'currentZonalEducationOffice' => 'required|string',
                    'currentInstitutionCategory' => 'required|string',
                    'currentInstitution' => 'required|string',
                    'currentTeachingSubject' => 'required|string',
                ];
                
                return $rules;
            default:
                return [];
        }
    }

    protected $messages = [
        'nic.required' => 'NIC is required',
        'fullName.required' => 'Full Name is required',
        'email.required' => 'Email is required',
        'email.email' => 'Enter a valid email',
        'email.unique' => 'This email is already registered',
        'contact.required' => 'Contact number is required',
        'contact.min' => 'Contact number should be 10 digits',
        'contact.max' => 'Contact number should be 10 digits',
        'healthProblem.required_if' => 'Please provide health problem details when health condition is "No"',
        'appointmentLetterNo.required' => 'Appointment letter number is required',
        'birthday.before' => 'Birthday must be a past date',
        'firstAppointmentDate.before_or_equal' => 'First appointment date cannot be in the future',
        'currentAppointmentDate.before_or_equal' => 'Current appointment date cannot be in the future',
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
        $this->institutionCategoryOption = InstitutionCategory::active()->get();
        $this->institutionOption = collect();
        $this->currentInstitutionOption = collect();
        $this->teacherCategoriesOption = TeacherCategory::active()->get();
        $this->subjectOption = SubjectList::active()->get();
        $this->appointmentSubjectOption = ApointedSubject::active()->get();
        $this->appointmentMediumOptions = MediumOfInstruction::active()->get();
        $this->teacherTypeOptions = TeacherType::active()->get();
        $this->zonalEducationOfficeOption = ZonalEducationOffice::active()->get();
        $this->healthCondition = true;
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
            // Copy values from first appointment to current appointment
            $this->currentAppointmentDate = $this->firstAppointmentDate;
            $this->currentAppointmentLetterNo = $this->appointmentLetterNo;
            $this->currentService = $this->service;
            $this->currentServiceRank = $this->serviceRank;
            $this->currentZonalEducationOffice = $this->zonalEducationOffice;
            $this->currentInstitutionCategory = $this->institutionCategory;
            $this->currentInstitution = $this->institution;
            $this->currentTeachingSubject = $this->mainTeachingSubject;
            
            // Update dropdown options
            $this->currentRanksOption = $this->ranksOption;
            $this->currentInstitutionOption = $this->institutionOption;
        } else {
            // Reset current appointment fields for existing teacher
            $this->reset([
                'currentAppointmentDate',
                'currentAppointmentLetterNo',
                'currentService',
                'currentServiceRank',
                'currentZonalEducationOffice',
                'currentInstitutionCategory',
                'currentInstitution',
                'currentTeachingSubject'
            ]);
            $this->currentRanksOption = collect();
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
            // Convert health condition to boolean properly
            $healthCondition = filter_var($this->healthCondition, FILTER_VALIDATE_BOOLEAN);
            
            // Generate initials
            $initials = People::generateInitials($this->fullName);

            // Save People
            $people = People::updateOrCreate(
                ['nic_hash' => hash('sha256', strtoupper($this->nic))],
                [
                    'nic' => strtoupper($this->nic),
                    'title_id' => $this->title,
                    'full_name' => ucwords(strtolower($this->fullName)),
                    'name_with_initials' => $initials,
                    'gender_id' => $this->gender,
                    'date_of_birth' => $this->birthday,
                    'religion_id' => $this->religion,
                    'ethnicity_id' => $this->ethnicity,
                    'civil_status_id' => $this->civilStatus,
                    'health_condition' => $healthCondition,
                    'health_problem' => $healthCondition ? null : $this->healthProblem,
                    'blood_group_id' => $this->bloodGroup,
                    'district_id' => $this->district,
                    //'dso_id' => $this->divisionalDecretaryOffice, // Fixed: Added missing DSO field
                    'gn_division_id' => $this->gnDivision,
                    'email' => strtolower(trim($this->email)),
                    'phone' => $this->contact,
                    'address_line1' => ucwords(strtolower($this->addressLine1)),
                    'address_line2' => ucwords(strtolower($this->addressLine2)),
                    'address_line3' => ucwords(strtolower($this->addressLine3 ?? null)),
                    'postal_code' => $this->postalCode,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    't_address_line1' => ucwords(strtolower($this->tAddressLine1 ?? null)),
                    't_address_line2' => ucwords(strtolower($this->tAddressLine2 ?? null)),
                    't_address_line3' => ucwords(strtolower($this->tAddressLine3 ?? null)),
                    't_postal_code' => $this->tPostalCode,
                    'profile_picture' => 'default.png',
                ]
            );

            // Calculate retirement date (55 years from birth)
            $retirementDate = Carbon::parse($people->date_of_birth)->addYears(55);

            // Generate appointment ID
            $appointmentId = EmployerAppointment::generateAppointmentId($this->firstAppointmentDate);

            // Create Employer Appointment
            $appointment = EmployerAppointment::create([
                'appointment_id' => $appointmentId,
                'employee_id' => $people->people_id,
                'first_appointment_date' => $this->firstAppointmentDate,
                'retirement_date' => $retirementDate,
                'service_id' => $this->service,
                'rank_id' => $this->serviceRank,
                'position_id' => 'POS001',
                'office_level_id' => 'OLID006',
                'workplace_id' => $this->institution,
                'appointment_letter_no' => $this->appointmentLetterNo,
                'appointment_letter' => 'default_letter.pdf',
                'w_op_no' => null,
            ]);

            // Create Teacher record
            Teacher::create([
                'appointment_id' => $appointment->appointment_id,
                'employee_id' => $people->people_id,
                'teacher_category' => $this->teacherCategory,
                'teacher_type' => $this->teacherType,
                'appointment_medium' => $this->appointmentMedium,
                'appointment_subject' => $this->appointmentSubject,
                'main_subject' => $this->mainTeachingSubject,
                'secondary_subject' => $this->secondaryTeachingSubject,
                'current_teaching_subject' => $this->mainTeachingSubject,
            ]);

            // Determine current appointment values based on registration type
            $currentWorkplaceId = $this->teacherRegType === 'new' ? $this->institution : $this->currentInstitution;
            $currentServiceId = $this->teacherRegType === 'new' ? $this->service : $this->currentService;
            $currentRankId = $this->teacherRegType === 'new' ? $this->serviceRank : $this->currentServiceRank;
            $currentAppointDate = $this->teacherRegType === 'new' ? $this->firstAppointmentDate : $this->currentAppointmentDate;

            // Create Current Appointment
            EmployerCurrentAppointment::create([
                'appointment_id' => $appointment->appointment_id,
                'employee_id' => $people->people_id,
                'appoint_date' => $currentAppointDate,
                'service_id' => $currentServiceId,
                'rank_id' => $currentRankId,
                'office_level_id' => 'OLID006',
                'position_id' => 'POS001',
                'workplace_id' => $currentWorkplaceId,
            ]);

            // Create or update User account
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
                    'email_verified_at' => now(),
                ]
            );

            // Assign teacher role
            $user->assignRole('teacher');

            DB::commit();

            session()->flash('success', 'Teacher created successfully! Default password: password@123');
            $this->resetForm();
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            session()->flash('error', 'Validation error: Please check your input data.');
            
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            session()->flash('error', 'Database error: Unable to save teacher data.');
            
        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Teacher creation error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            session()->flash('error', 'System error: ' . $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->reset([
            'nic', 'title', 'fullName', 'gender', 'birthday', 'religion',
            'ethnicity', 'civilStatus', 'bloodGroup', 'healthCondition', 'healthProblem',
            'contact', 'email', 'district', 'divisionalDecretaryOffice', 'gnDivision',
            'addressLine1', 'addressLine2', 'addressLine3', 'postalCode', 'latitude', 'longitude',
            'teacherCategory', 'firstAppointmentDate', 'appointmentLetterNo', 'service',
            'serviceRank', 'teacherType', 'appointmentSubject', 'appointmentMedium',
            'mainTeachingSubject', 'secondaryTeachingSubject', 'zonalEducationOffice',
            'institutionCategory', 'institution',
            'teacherRegType', 'currentAppointmentDate', 'currentAppointmentLetterNo',
            'currentService', 'currentServiceRank', 'currentZonalEducationOffice', 'currentInstitutionCategory',
            'currentInstitution', 'currentTeachingSubject',
        ]);
        
        // Reset to step 1
        $this->step = 1;
        $this->teacherRegType = 'existing';
        $this->healthCondition = true;
        
        // Reload dropdown options
        $this->mount();
    }

    public function render()
    {
        return view('livewire.teacher.teacher-create');
    }
}