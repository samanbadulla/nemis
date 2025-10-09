<?php

namespace App\Livewire\Principal\Profile;

use App\Models\People;
use Livewire\Component;

class PrincipalIndex extends Component
{
    public $id;
    public $principal;

    public function mount($id)
    {
        $this->principal = People::find($id);
    }

    public function render()
    {
        return view('livewire.principal.profile.principal-index');
    }
}
