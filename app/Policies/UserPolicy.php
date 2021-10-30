<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {

    use HandlesAuthorization;

    /**
     * @param User $user
     * @param User $selectedUser
     * @return bool
     */
    public function follow(User $user, User $selectedUser): bool
    {

        return $user->id != $selectedUser->id;
    }

    /**
     * @param User $user
     * @param User $selectedUser
     * @return bool
     */
    public function avatar(User $user, User $selectedUser): bool
    {

        return $user->id == $selectedUser->id;
    }

}