<?php

namespace App\Livewire\Teacher\Profile;

use App\Models\Family;
use App\Models\People;
use Livewire\Component;

class TeacherFamily extends Component
{
    public $id;
    public $teacher;
    public $family;

    public function mount($id)
    {
        $this->teacher = People::find($id);

        // Find the family where the person is either husband or wife
        $this->family = Family::where('member_m_id', $this->teacher->people_id)
            ->orWhere('member_f_id', $this->teacher->people_id)
            ->with(['husband', 'wife', 'members'])
            ->first();

        $people = People::with(['familiesAsHusband.children', 'familiesAsWife.children'])
            ->findOrFail($id);

        // Example: get all children of families where person is husband
        $children = $people->familiesAsHusband->flatMap->children;
    }

    public function render()
    {
        return view('livewire.teacher.profile.teacher-family');
    }
}
