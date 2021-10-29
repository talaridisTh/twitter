<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {

    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function follow(User $user, User $selectedUser): bool
    {

        return $user->id != $selectedUser->id;
    }

    public function avatar(User $user, User $selectedUser): bool
    {

        return $user->id == $selectedUser->id;
    }

}