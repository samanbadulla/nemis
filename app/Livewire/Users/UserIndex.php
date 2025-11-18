<?php

namespace App\Livewire\Users;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Models\Workplaces;
use App\Models\OfficeLevel;
use Livewire\WithPagination;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserIndex extends Component
{
    use WithPagination;

    public $search = ''; // new property for search
    protected $updatesQueryString = ['search']; // optional: keep search in URL

    public function render()
    {
        $loggedUser = Auth::user();
        $users = User::query();

        try {
            if ($loggedUser->hasRole('super admin')) {

                // Super admin sees all
                $users = $users->with(['roles', 'currentAppointment']);
            } else {

                // Logged user's workplace
                $loggedAppointment = $loggedUser->currentAppointment;

                if ($loggedAppointment) {

                    $loggedWorkplace = Workplaces::where(
                        'workplace_id',
                        $loggedAppointment->workplace_id
                    )->first();

                    if ($loggedWorkplace) {

                        $loggedLevel = OfficeLevel::where(
                            'office_level_id',
                            $loggedWorkplace->office_level_id
                        )->first();

                        $loggedRank = $loggedLevel->office_level_rank;

                        // Get all lower office levels
                        $lowerLevels = OfficeLevel::where('office_level_rank', '>', $loggedRank)
                            ->pluck('office_level_id');

                        // Get workplaces that belong to lower levels
                        $allowedWorkplaces = Workplaces::whereIn('office_level_id', $lowerLevels)
                            ->pluck('workplace_id');

                        // Filter users by those workplaces
                        $users = $users->with(['roles', 'currentAppointment'])
                            ->whereHas('currentAppointment', function ($query) use ($allowedWorkplaces) {
                                $query->whereIn('workplace_id', $allowedWorkplaces);
                            });
                    } else {
                        // No workplace -> only yourself
                        $users = $users->where('id', $loggedUser->id);
                    }
                } else {
                    // No appointment -> only yourself
                    $users = $users->where('id', $loggedUser->id);
                }
            }

            // Search Filter
            if ($this->search) {
                $hash_search = hash('sha256', strtoupper($this->search));
                $search = $this->search;

                $users = $users->where(function ($query) use ($hash_search, $search) {
                    $query->where('nic_hash', 'like', "%{$hash_search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('contact', 'like', "%{$search}%");
                });
            }

            $users = $users->paginate(20);
        } catch (Exception $e) {
            Log::error('Error in user render method: ' . $e->getMessage());
            $users = User::where('id', 0)->paginate(10);
        }

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
