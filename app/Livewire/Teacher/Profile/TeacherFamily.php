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
use App\Rules\UniqueHashedNic;
use Illuminate\Support\Facades\DB;
use App\Rules\UniquePhoneAcrossTables;

class TeacherFamily extends Component
{
    public $id;
    public $teacher;

    public $showModalSpouseReg = false; // control modal visibility

    // -------------------------
    // Personal Details
    // -------------------------
    public $nic, $title, $fullName, $gender, $birthday, $religion;
    public $ethnicity, $email, $contact, $marriedDate, $marriedCfNo;

    // -------------------------
    // Dropdown Options
    // -------------------------
    public $titleOptions = [], $religionOptions = [], $genderOptions = [], $ethnicityOptions = [], $civilStatusOptions = [];

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
            //'civilStatus' => 'required|string',
            'contact' => ['required', 'string', 'min:10', 'max:10', new UniquePhoneAcrossTables(), 'regex:/^0\d{9}$/'],
            'email' => 'required|email|unique:people,email',
            'marriedDate' => 'required|date',
            'marriedCfNo' => 'required|string|max:10',
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

        $this->titleOptions = Title::all();
        $this->genderOptions = GenderList::all();
        $this->religionOptions = Religion::all();
        $this->ethnicityOptions = Ethnicity::all();
        $this->civilStatusOptions = CivilStatus::all();
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
                'family_id'     => (string) Str::uuid(),
                'member_a_id'   => $this->teacher->people_id,
                'member_b_id'   => $spous->people_id,
                'married_date'  => $this->marriedDate,
                'married_cf_no' => $this->marriedCfNo,
            ]);

            session()->flash('success', 'Teacher created successfully!');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack(); // Rollback on any failure
            session()->flash('error', 'An error occurred while updating personal information: ' . $e->getMessage());
        }
    }

    public function render()
    {
        // Find the family where the person is either husband or wife
        $familyList = Family::where('member_a_id', $this->teacher->people_id)
            ->orWhere('member_b_id', $this->teacher->people_id)
            ->get();
        //dd($family);

        return view('livewire.teacher.profile.teacher-family', compact('familyList'));
    }
}
