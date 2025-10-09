<?php

namespace App\Livewire\Users;

use App\Models\User;

use Livewire\Component;

class UserIndex extends Component
{
    public function render()
    {
        $users = User::with('roles')->paginate(10); // 10 items per page
        return view('livewire.users.user-index', compact('users'));
    }
}
