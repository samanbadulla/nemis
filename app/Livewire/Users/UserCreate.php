<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Validate;
use App\Rules\UniqueHashedNicUser;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserCreate extends Component
{
    public $name = '';
    public $email = '';
    public $nic = '';
    public $contact = '';
    public $roles = [];
    public $password = '';
    public string $password_confirmation = '';

    public $allRole;
    

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'nic' => ['required', 'string', 'regex:/^(\d{9}[vVxX]|\d{12})$/', new UniqueHashedNicUser()],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'contact' => ['required', 'regex:/^[0-9]{10}$/', 'unique:users'],
            'roles' => 'required',
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ];
    }

    // -------------------------
    // Live Validation on Field Update
    // -------------------------
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(){
        $this->allRole = Role::all();
    }

    public function render()
    {
        return view('livewire.users.user-create');
    }

    public function createUser()
    {
        $validated = $this->validate();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        $user->syncRoles($this->roles);

        return redirect()->route('users.index')->with('message', 'User created successfully.');
    }
}
