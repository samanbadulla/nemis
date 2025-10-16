<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::with('roles')->paginate(10); // Paginate 10 users
        return view('livewire.users.user-index', compact('users'));
    }

    public function deleteUser($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        $this->dispatch('status-updated', [
            'message' => 'User deleted successfully!',
        ]);
    }

    public function toggleStatus($userId)
    {
        $user = User::find($userId);

        if ($user) {
            // Toggle between 1 and 0
            $user->active_status = $user->active_status == '1' ? '0' : '1';
            $user->save();

            // Send notification to front-end
            $this->dispatch('status-updated', [
                'message' => $user->active_status == '1'
                    ? 'User account activated successfully!'
                    : 'User account deactivated successfully!',
            ]);
        }
    }

    public function resetPassword($userId)
    {
        $user = User::findOrFail($userId);

        // Generate a new random password (you can customize this)
        $newPassword = 'User@' . rand(1000, 9999);

        // Update the password in database
        $user->password = Hash::make($newPassword);
        $user->save();

        // Optionally send new password via email or event
        Mail::to($user->email)->send(new ResetPasswordMail($newPassword));

        $this->dispatch('password-reset', [
            'message' => "Password reset successfully! New password: {$newPassword}",
        ]);
    }
}
