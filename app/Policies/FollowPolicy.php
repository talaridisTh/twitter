<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FollowPolicy {

    use HandlesAuthorization;

    public function __construct()
    {

    }

    public function update(User $user, User $selectedUser): bool
    {

        return $user->id != $selectedUser->id;
    }

}