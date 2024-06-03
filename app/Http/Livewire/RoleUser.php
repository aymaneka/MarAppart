<?php

namespace App\Http\Livewire;
use  App\Models\User;

use Livewire\Component;

class RoleUser extends Component
{

    public $roleUser;


    public function render()
    {

        $allusers = User::all();

        return view('livewire.role-user', ['users'=> $allusers]);

    }
  
    public function changeRole($userId)
    {
        // find the user by their ID
        $user = User::find($userId);

        // update the user's role
        $user->syncRoles([$this->roleUser]);

        // show a success message to the user
        session()->flash('success', 'User role updated successfully.');
    }

    
    public function deleteUser($userId)
    {
        // find the user by their ID
        $user = User::find($userId);

        // delete the user
        $user->delete();

        // show a success message to the user
        session()->flash('success', 'User deleted successfully.');
    }

}
