<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class RoleUser extends Component
{
    public $roleUser = [];

    public function mount()
    {
        // Initialize the $roleUser array with the current roles of the users
        $this->roleUser = User::all()->pluck('roles.0.name', 'id')->toArray();
    }

    public function render()
    {
        $allusers = User::all();

        return view('livewire.role-user', ['users' => $allusers]);
    }

    public function changeRole($userId)
    {
        // Find the user by their ID
        $user = User::find($userId);

        // Update the user's role
        $user->syncRoles([$this->roleUser[$userId]]);

        // Show a success message to the user
        session()->flash('success', 'User role updated successfully.');

        // Refresh the $roleUser array to reflect the updated roles
        $this->roleUser = User::all()->pluck('roles.0.name', 'id')->toArray();
    }

    public function deleteUser($userId)
    {
        // Find the user by their ID
        $user = User::find($userId);

        if ($user) {
            // Delete related reservations
            $user->reservations()->delete();

            // Delete the user
            $user->delete();

            // Show a success message to the user
            session()->flash('success', 'User deleted successfully.');

            // Refresh the $roleUser array to reflect the changes
            $this->roleUser = User::all()->pluck('roles.0.name', 'id')->toArray();
        }
    }
}
