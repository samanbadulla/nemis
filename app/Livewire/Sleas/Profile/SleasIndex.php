<?php

namespace App\Livewire\Sleas\Profile;

use Livewire\Component;

use Exception;
use Carbon\Carbon;
use App\Models\Title;
use App\Models\People;
use App\Models\Service;
use App\Models\Teacher;

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

class SleasIndex extends Component
{
    public $id;
    public $sleas;
    public $showModalPersonalInfo = false; // control modal visibility
    public $showModalHealthInfo = false; // control modal visibility

    // -------------------------
    // Personal Details
    // -------------------------
    public $nic, $title, $fullName, $gender, $birthday, $religion;
    public $ethnicity, $civilStatus;
    public $bloodGroup, $healthCondition, $healthProblem;

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
        $this->sleas = People::find($id);

        $this->nic = $this->sleas->nic;
        $this->title = $this->sleas->title_id;
        $this->fullName = $this->sleas->full_name;
        $this->gender = $this->sleas->gender_id;
        $this->birthday = Carbon::parse($this->sleas->date_of_birth)->format('Y-m-d');
        $this->religion = $this->sleas->religion_id;
        $this->ethnicity = $this->sleas->ethnicity_id;
        $this->civilStatus = $this->sleas->civil_status_id;

        $this->bloodGroup = $this->sleas->blood_group_id;
        $this->healthCondition = $this->sleas->health_condition;
        $this->healthProblem = $this->sleas->health_problem;

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
            $sleas = People::findOrFail($this->id);

            // Update directly
            $sleas->update([
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

            $this->sleas = People::find($this->id);
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
            $sleas = People::findOrFail($this->id);

            // Update directly
            $sleas->update([
                'blood_group_id' => $this->bloodGroup,
                'health_condition' => $this->healthCondition,
                'health_problem' => $this->healthProblem,
            ]);

            DB::commit(); // Commit only if all operations succeeded

            $this->sleas = People::find($this->id);
            session()->flash('success', 'Health information updated successfully.');
            // Close modal
            $this->showModalHealthInfo = false;
        } catch (Exception $e) {
            DB::rollBack(); // Rollback on any failure
            session()->flash('error', 'An error occurred while updating health information: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.sleas.profile.sleas-index');
    }
}
