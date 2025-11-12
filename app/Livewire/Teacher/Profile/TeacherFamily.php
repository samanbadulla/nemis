<?php

namespace App\Livewire\Teacher\Profile;

use Exception;
use App\Models\Title;
use App\Models\Family;
use App\Models\People;
use Livewire\Component;
use App\Models\Religion;
use App\Models\Ethnicity;
use App\Models\GenderList;
use App\Models\CivilStatus;
use Illuminate\Support\Str;
use App\Models\FamilyMember;
use App\Rules\UniqueHashedNic;
use Illuminate\Support\Facades\DB;
use App\Rules\UniquePhoneAcrossTables;

class TeacherFamily extends Component
{
    public $id;
    public $teacher;

    public $showModalSpouseReg = false; // control modal visibility
    public $showModalChaildReg = false;

    // -------------------------
    // Personal Details
    // -------------------------
    public $nic, $title, $fullName, $gender, $birthday, $religion;
    public $ethnicity, $email, $contact, $marriedDate, $marriedCfNo;

    // -------------------------
    // Personal Details
    // -------------------------
    public $family_id, $childName, $childDob, $childGender, $birthCertificateNo, $chailHealthCondition;

    // -------------------------
    // Dropdown Options
    // -------------------------
    public $titleOptions = [], $religionOptions = [], $genderOptions = [], $ethnicityOptions = [], $civilStatusOptions = [];
    public $healthConditionOptions = [];

    // -------------------------
    // Validation Rules
    // -------------------------
    protected function rules()
    {
        return [
            //spouse details
            'nic' => ['required', 'string', 'min:10', 'max:12', new UniqueHashedNic()],
            'title' => 'required|string',
            'fullName' => 'required|string|max:255',
            'gender' => 'required|string',
            'birthday' => 'required|date',
            'religion' => 'required|string',
            'ethnicity' => 'required|string',
            //'civilStatus' => 'required|string',
            'contact' => ['required', 'string', 'min:10', 'max:10', new UniquePhoneAcrossTables(), 'regex:/^0\d{9}$/'],
            'email' => 'required|email|unique:people,email',
            'marriedDate' => 'required|date',
            'marriedCfNo' => 'required|string|max:10',

            //chaild details
            //'familyId' => 'required|string',
            'childName' => 'required|string|max:255',
            'childDob' => 'required|date',
            'childGender' => 'required|string',
            'birthCertificateNo' => 'required|string|max:10',
            'chailHealthCondition' => 'required|boolean',

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
        $this->id = $id;
        $this->teacher = People::find($id);

        $this->titleOptions = Title::all();
        $this->genderOptions = GenderList::all();
        $this->religionOptions = Religion::all();
        $this->ethnicityOptions = Ethnicity::all();
        $this->civilStatusOptions = CivilStatus::all();
        $this->healthConditionOptions = [true => 'Yes', false => 'No'];
        $this->chailHealthCondition = true;
    }

    public function openChildModal($family_id)
    {
        $this->family_id = $family_id;
        $this->showModalChaildReg = true;
        //dd($family_id);
    }

    public function spouseReg()
    {
        $validated = $this->validate([
            'title' => 'required|string',
            'nic' => ['required', 'string', 'regex:/^(\d{9}[vVxX]|\d{12})$/', new UniqueHashedNic($this->teacher->people_id)],
            'fullName' => 'required|string|max:255',
            'gender' => 'required|string',
            'birthday' => 'required|date',
            'religion' => 'required|string',
            'ethnicity' => 'required|string',
            //'civilStatus' => 'required|string',
            'contact' => ['required', 'string', 'min:10', 'max:10', new UniquePhoneAcrossTables(), 'regex:/^0\d{9}$/'],
            'email' => 'required|email|unique:people,email',
            'marriedDate' => 'required|date',
            'marriedCfNo' => 'required|string|max:10',
        ]);

        // if (Family::isMemberInActiveFamily($person->people_id)) {
        // }

        DB::beginTransaction(); // Start transaction
        try {
            // Generate initials
            $initials = People::generateInitials($this->fullName);

            $spous = People::updateOrCreate(
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
                    'civil_status_id' => 'C02',
                    'email' => strtolower(trim($this->email)),
                    'phone' => $this->contact,
                    'address_line1' => ucwords(strtolower($this->teacher->address_line1)),
                    'address_line2' => ucwords(strtolower($this->teacher->address_line2)),
                    'address_line3' => ucwords(strtolower($this->teacher->address_line3 ?? null)),
                    'postal_code' => $this->teacher->postal_code ?? null,
                    'profile_picture' => 'default.png',
                ]
            );
            Family::create([
                //'family_id'     => (string) Str::uuid(),
                'member_a_id'   => $this->teacher->people_id,
                'member_b_id'   => $spous->people_id,
                'married_date'  => $this->marriedDate,
                'married_cf_no' => $this->marriedCfNo,
            ]);
            DB::commit();
            session()->flash('success', 'Spouse created successfully!');
            $this->showModalSpouseReg = false;
            $this->resetFormA();
        } catch (Exception $e) {
            DB::rollBack(); // Rollback on any failure
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function chaildReg()
    {
        $validated = $this->validate([
            //'familyId' => 'required|string',
            'childName' => 'required|string|max:255',
            'childDob' => 'required|date',
            'childGender' => 'required|string',
            'birthCertificateNo' => 'required|string|max:10',
            'chailHealthCondition' => 'required|boolean',
        ]);

        DB::beginTransaction(); // Start transaction
        try {
            FamilyMember::create([
                'family_id' => $this->family_id,
                'child_name' => $this->childName,
                'date_of_birth' => $this->childDob,
                'gender_id' => $this->childGender,
                'birth_fc_no' => $this->birthCertificateNo,
                'health_condition' => $this->chailHealthCondition,
            ]);
            DB::commit();
            session()->flash('success', 'Child created successfully!');
            $this->resetFormB();
            $this->showModalChaildReg = false;
        } catch (Exception $e) {
            DB::rollBack(); // Rollback on any failure
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    private function resetFormA()
    {
        $this->reset([
            'title',
            'nic',
            'fullName',
            'gender',
            'birthday',
            'religion',
            'ethnicity',
            'contact',
            'email',
            'marriedDate',
            'marriedCfNo',
        ]);
        // Reload dropdown options
        $this->mount($this->id);
    }

    private function resetFormB()
    {
        $this->reset([
            'childName',
            'childDob',
            'childGender',
            'birthCertificateNo',
            'chailHealthCondition',
        ]);
        // Reload dropdown options
        $this->mount($this->id);
    }

    public function deleteSpouse($rowId)
    {
        $spouse = Family::find($rowId);

        if ($spouse) {
            $spouse->delete();
            session()->flash('success', 'Spouse deleted successfully!');
        } else {
            session()->flash('error', 'Spouse not found!');
        }
    }

    public function deleteChilde($rowId)
    {
        $childe = FamilyMember::find($rowId);

        if ($childe) {
            $childe->delete();
            session()->flash('success', 'Child deleted successfully!');
        } else {
            session()->flash('error', 'Child not found!');
        }
    }


    public function render()
    {
        // Find the family where the person is either husband or wife
        $familyList = Family::where('member_a_id', $this->teacher->people_id)
            ->orWhere('member_b_id', $this->teacher->people_id)
            ->get();

        $familyIdList = Family::where('member_a_id', $this->teacher->people_id)
            ->orWhere('member_b_id', $this->teacher->people_id)
            ->pluck('family_id');

        $familyMemberList = FamilyMember::whereIn('family_id', $familyIdList)->get();
        //dd($family);

        return view('livewire.teacher.profile.teacher-family', compact('familyList', 'familyMemberList'));
    }
}
