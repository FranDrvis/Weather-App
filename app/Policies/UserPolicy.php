<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function __construct()
    {
        //
    }

    public function viewUserList(User $user)
    {
        //dd($user->group->name); // Debugging statement
        return strtolower($user->group->name) === 'admin';
       // return true;
    }
}
