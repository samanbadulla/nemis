<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    #[Validate('required|string|max:255')]
    public $name = '';

    #[Validate('required|string|lowercase|email|max:255|unique:users,email')]
    public $email = '';

    #[Validate('required|string|min:10|max:12|unique:users,nic')]
    public $nic = '';

    #[Validate('required|string|max:10|unique:users,contact')]
    public $contact = '';

    #[Validate('required')]
    public $roles = [];

    public $password = '';

    public string $password_confirmation = '';

    public $allRole;
    

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:users,email',
            'nic' => 'required|string|max:12|unique:users,nic',
            'roles' => 'required',
            'contact' => 'required|string|max:10|unique:users,contact',
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ];
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
