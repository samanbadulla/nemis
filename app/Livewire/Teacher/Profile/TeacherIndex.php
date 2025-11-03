<?php

namespace App\Livewire\Teacher\Profile;

use Exception;
use Carbon\Carbon;
use App\Models\Title;
use App\Models\People;
use App\Models\Service;
use App\Models\Teacher;

use Livewire\Component;
use App\Models\Religion;
use App\Models\Ethnicity;
use App\Models\BloodGroup;
use App\Models\GenderList;
use App\Models\CivilStatus;
use App\Models\SubjectList;
use App\Models\TeacherType;
use Illuminate\Http\Request;
use App\Models\DistrictsList;
use App\Rules\UniqueHashedNic;
use App\Models\TeacherCategory;
use App\Services\EmployerService;
use Illuminate\Support\Facades\DB;
use App\Models\InstitutionCategory;
use App\Models\MediumOfInstruction;
use App\Models\ZonalEducationOffice;
use App\Rules\UniquePhoneAcrossTables;

class TeacherIndex extends Component
{
    public $id;
    public $teacher;
    public $showModalPersonalInfo = false; // control modal visibility
    public $showModalHealthInfo = false; // control modal visibility
    public $showModalContactInfo = false; // control modal visibility

    // -------------------------
    // Personal Details
    // -------------------------
    public $nic, $title, $fullName, $gender, $birthday, $religion;
    public $ethnicity, $civilStatus;
    public $bloodGroup, $healthCondition, $healthProblem;

    // -------------------------
    // Contact Details
    // -------------------------
    public $contact, $email;
    public $addressLine1, $addressLine2, $addressLine3, $postalCode, $latitude, $longitude;
    public $tAddressLine1, $tAddressLine2, $tAddressLine3, $tPostalCode;

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

            'contact' => [
                'required',
                'string',
                'min:10',
                'max:10',
                new UniquePhoneAcrossTables(
                    $this->teacher->people_id,   // ignore in people
                    $this->teacher->user->id ?? null // ignore in users
                ),
            ],
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
    }

    // -------------------------
    // Live Validation on Field Update
    // -------------------------
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($id)
    {
        $this->teacher = People::find($id);

        $this->nic = $this->teacher->nic;
        $this->title = $this->teacher->title_id;
        $this->fullName = $this->teacher->full_name;
        $this->gender = $this->teacher->gender_id;
        $this->birthday = Carbon::parse($this->teacher->date_of_birth)->format('Y-m-d');
        $this->religion = $this->teacher->religion_id;
        $this->ethnicity = $this->teacher->ethnicity_id;
        $this->civilStatus = $this->teacher->civil_status_id;

        $this->bloodGroup = $this->teacher->blood_group_id;
        $this->healthCondition = $this->teacher->health_condition;
        $this->healthProblem = $this->teacher->health_problem;

        $this->contact = $this->teacher->phone;
        $this->email = $this->teacher->email;
        $this->addressLine1 = $this->teacher->address_line1;
        $this->addressLine2 = $this->teacher->address_line2;
        $this->addressLine3 = $this->teacher->address_line3;
        $this->postalCode = $this->teacher->postal_code;
        $this->latitude = $this->teacher->latitude;
        $this->longitude = $this->teacher->longitude;
        $this->tAddressLine1 = $this->teacher->t_address_line1;
        $this->tAddressLine2 = $this->teacher->t_address_line2;
        $this->tAddressLine3 = $this->teacher->t_address_line3;
        $this->tPostalCode = $this->teacher->t_postal_code;

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
    }

    public function editPersonalInfo()
    {
        // Direct validation
        $validated = $this->validate([
            'title' => 'required|string',
            'nic' => ['required', 'string', 'regex:/^(\d{9}[vVxX]|\d{12})$/', new UniqueHashedNic($this->teacher->people_id)],
            'fullName' => 'required|string|max:255',
            'gender' => 'required|string',
            'birthday' => 'required|date',
            'religion' => 'required|string',
            'ethnicity' => 'required|string',
            'civilStatus' => 'required|string',
        ]);

        DB::beginTransaction(); // Start transaction
        try {
            // Fetch the record
            $teacher = People::findOrFail($this->id);

            // Update directly
            $teacher->update([
                'title_id' => $this->title,
                'nic' => $this->nic,
                'full_name' => $this->fullName,
                'name_with_initials' => People::generateInitials($this->fullName),
                'gender_id' => $this->gender,
                'date_of_birth' => $this->birthday,
                'religion_id' => $this->religion,
                'ethnicity_id' => $this->ethnicity,
                'civil_status_id' => $this->civilStatus,
            ]);

            DB::commit(); // Commit only if all operations succeeded

            $this->teacher = People::find($this->id);
            session()->flash('success', 'Personal information updated successfully.');
            // Close modal
            $this->showModalPersonalInfo = false;
        } catch (Exception $e) {
            DB::rollBack(); // Rollback on any failure
            session()->flash('error', 'An error occurred while updating personal information: ' . $e->getMessage());
        }
    }

    public function updatedHealthCondition()
    {
        if ($this->healthCondition == true) {
            $this->healthProblem = null;
        }
    }

    public function editHealthInfo()
    {
        // Direct validation
        $validated = $this->validate([
            'bloodGroup' => 'required|string',
            'healthCondition' => 'required|boolean',
            'healthProblem' => 'nullable|string|max:1000',
        ]);


        DB::beginTransaction(); // Start transaction
        try {
            // Fetch the record
            $teacher = People::findOrFail($this->id);

            // Update directly
            $teacher->update([
                'blood_group_id' => $this->bloodGroup,
                'health_condition' => $this->healthCondition,
                'health_problem' => $this->healthProblem,
            ]);

            DB::commit(); // Commit only if all operations succeeded

            $this->teacher = People::find($this->id);
            session()->flash('success', 'Health information updated successfully.');
            // Close modal
            $this->showModalHealthInfo = false;
        } catch (Exception $e) {
            DB::rollBack(); // Rollback on any failure
            session()->flash('error', 'An error occurred while updating health information: ' . $e->getMessage());
        }
    }

    public function editContactInfo()
    {
        // Direct validation
        $validated = $this->validate([
            'contact' => [
                'required',
                'string',
                'min:10',
                'max:10',
                new UniquePhoneAcrossTables(
                    $this->teacher->people_id,   // ignore in people
                    $this->teacher->user->id ?? null // ignore in users
                ),
            ],
            'email' => 'required|email|unique:people,email,' . $this->teacher->people_id . ',people_id',
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
        ]);

        DB::beginTransaction(); // Start transaction
        try {
            // Fetch the record
            $teacher = People::findOrFail($this->id);

            // Update directly
            $teacher->update([
                'phone' => $this->contact,
                'email' => $this->email,
                'address_line1' => $this->addressLine1,
                'address_line2' => $this->addressLine2,
                'address_line3' => $this->addressLine3,
                'postal_code' => $this->postalCode,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                't_address_line1' => $this->tAddressLine1,
                't_address_line2' => $this->tAddressLine2,
                't_address_line3' => $this->tAddressLine3,
                't_postal_code' => $this->tPostalCode,
            ]);

            DB::commit(); // Commit only if all operations succeeded

            $this->teacher = People::find($this->id);
            session()->flash('success', 'Contact information updated successfully.');
            // Close modal
            $this->showModalContactInfo = false;
        } catch (Exception $e) {
            DB::rollBack(); // Rollback on any failure
            session()->flash('error', 'An error occurred while updating contact information: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.teacher.profile.teacher-index');
    }
}
