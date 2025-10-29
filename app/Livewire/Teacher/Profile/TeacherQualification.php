<?php

namespace App\Livewire\Teacher\Profile;

use App\Models\People;
use Livewire\Component;
use App\Models\EducationQualification;
use App\Models\PeopleEducationQualification;

class TeacherQualification extends Component
{
    public $id;
    public $showModal = false; // control modal visibility

    public $teacher; // Pass teacher object to component
    public $educationQualificationList = [];
    public $gradeOption;

    public $qualification, $institution, $effectiveDate, $grade, $description;

    // -------------------------
    // Validation Rules
    // -------------------------
    protected function rules()
    {
        return [
            'qualification' => 'required|string',
            'institution' => 'required|string|max:255',
            'effectiveDate' => 'required|date',
            'grade' => 'required|string',
            'description' => 'required|string|max:255',
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
        // Load qualifications from the database
        $this->educationQualificationList = EducationQualification::where('active_status', '1')->get();

        // Static grade options
        $this->gradeOption = [
            '1' => '1st Class',
            '2' => '2nd Upper Class',
            '3' => '2nd Lower Class',
            '4' => 'General Pass',
            '4' => 'None',
        ];
    }

    public function save()
    {
        $this->validate([
            'qualification' => 'required',
            'institution' => 'required|string|max:255',
            'effectiveDate' => 'required|date',
            'grade' => 'required',
            'description' => 'nullable|string|max:500',
        ]);

        PeopleEducationQualification::create([
            'people_id' => $this->teacher->people_id,
            'qualifications_id' => $this->qualification,
            'institution' => $this->institution,
            'effective_date' => $this->effectiveDate,
            'grade' => $this->grade,
            'description' => $this->description,
        ]);

        // Reset form fields
        $this->reset(['qualification', 'institution', 'effectiveDate', 'grade', 'description']);

        // Close modal
        $this->showModal = false;

        session()->flash('success', 'Qualification updated successfully!');
    }

    public function delete($id)
    {
        // Optional: confirm record exists
        $record = PeopleEducationQualification::find($id);

        if ($record) {
            $record->delete();
            session()->flash('success', 'Qualification deleted successfully.');
        } else {
            session()->flash('error', 'Record not found.');
        }
    }

    public function render()
    {
        $qualificationList = PeopleEducationQualification::where('active_status', '1')->where('people_id', $this->teacher->people_id)->get();
        return view('livewire.teacher.profile.teacher-qualification', compact('qualificationList'));
    }
}
